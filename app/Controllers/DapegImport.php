<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DapegModel;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

/**
 * Filter baris/kolom untuk streaming XLSX.
 */
class ChunkReadFilter implements IReadFilter
{
    private int $startRow = 2;
    private int $endRow   = 2;
    /** @var string[]|null */
    private ?array $columns = null;

    /** @param string[]|null $columns */
    public function setRows(int $startRow, int $chunkSize, ?array $columns = null): void
    {
        $this->startRow = $startRow;
        $this->endRow   = $startRow + $chunkSize - 1;
        $this->columns  = $columns;
    }

    public function readCell($columnAddress, $row, $worksheetName = ''): bool
    {
        if ($row === 1) { // header (kalau butuh nama kolom)
            return true;
        }
        if ($row >= $this->startRow && $row <= $this->endRow) {
            if ($this->columns === null) {
                return true;
            }
            return in_array($columnAddress, $this->columns, true);
        }
        return false;
    }
}

class DapegImport extends BaseController
{
    /** jumlah baris per proses */
    private int $chunk = 100;

    /** Kolom yang benar-benar dipakai (hemat memori) */
    private array $cols = [
        'A','B','C','D','E','F','G','H','I','J','K','L',
        'M','N','O','P','Q','R','S','T','U','V','W','X','Y',
        'Z','AA','AB','AC','AD','AE','AF','AG','AH','AI',
        'AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV',
        'AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK'
    ];

    /**
     * 1) Upload & siapkan sesi import (tanpa load seluruh file)
     */
    public function upload()
    {
        $file = $this->request->getFile('excel_file');
        if (!$file || !$file->isValid()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'File tidak valid']);
        }

        $ext = strtolower($file->getClientExtension());
        if (!in_array($ext, ['xlsx','xls'], true)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gunakan file XLSX/XLS']);
        }

        // Simpan ke writable/uploads
        $newName = $file->getRandomName();
        $saveDir = WRITEPATH . 'uploads/';
        @is_dir($saveDir) || @mkdir($saveDir, 0775, true);
        $file->move($saveDir, $newName);
        $path = $saveDir . $newName;

        // Hitung total baris tanpa memuat seluruh spreadsheet
        $reader = ($ext === 'xls') ? new Xls() : new Xlsx();
        // trik hemat memori
        if ($reader instanceof Xlsx) {
            $info = $reader->listWorksheetInfo($path);
            $totalRows = $info[0]['totalRows'] ?? 0;
        } else {
            // Xls tidak punya listWorksheetInfo seefisien Xlsx,
            // tapi file XLS biasanya lebih kecil; fallback muat minimal lalu ambil highestRow.
            $tmp = new ChunkReadFilter();
            $tmp->setRows(1, 1, ['A']); // muat 1 baris 1 kolom
            $reader->setReadDataOnly(true);
            $reader->setReadFilter($tmp);
            $ss = $reader->load($path);
            $totalRows = $ss->getActiveSheet()->getHighestRow();
            $ss->disconnectWorksheets();
            unset($ss);
        }

        // baris 1 = header
        $totalDataRows = max(0, $totalRows - 1);

        // Simpan sesi pointer
        session()->set([
            'imp_file'    => $path,
            'imp_ext'     => $ext,
            'imp_pointer' => 2,                // mulai baris data
            'imp_total'   => $totalDataRows,   // jumlah baris data
            'imp_done'    => 0,
        ]);

        return $this->response->setJSON(['status' => 'ok', 'total' => $totalDataRows]);
    }

    /**
     * 2) Proses chunk berikutnya
     */
    public function processChunk()
    {
        try{
            $file    = (string) session('imp_file');
            $ext     = (string) session('imp_ext');
            $pointer = (int) session('imp_pointer');
            $total   = (int) session('imp_total');
            $done    = (int) session('imp_done');

            if (!$file || !is_file($file)) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Session/file import tidak ditemukan']);
            }

            // selesai?
            if ($pointer > ($total + 1)) {
                @unlink($file);
                session()->remove(['imp_file','imp_ext','imp_pointer','imp_total','imp_done']);
                return $this->response->setJSON(['status' => 'ok', 'done' => true, 'progress' => 100]);
            }

            // Tentukan rentang baris chunk ini
            $start = $pointer;
            $end   = min($pointer + $this->chunk - 1, $total + 1); // +1 karena header baris 1

            // Siapkan reader + filter baris/kolom
            $filter = new ChunkReadFilter();
            $filter->setRows($start, ($end - $start + 1), $this->cols);

            $reader = ($ext === 'xls') ? new Xls() : new Xlsx();
            $reader->setReadDataOnly(true);
            $reader->setReadFilter($filter);

            // Muat hanya range yang diperlukan
            $spreadsheet = $reader->load($file);
            $sheet       = $spreadsheet->getActiveSheet();

            // Helper konversi tanggal
            $toYmd = static function ($cellVal) {
                if ($cellVal === null || $cellVal === '') { return null; }
                if (is_numeric($cellVal)) {
                    try {
                        return ExcelDate::excelToDateTimeObject($cellVal)->format('Y-m-d');
                    } catch (\Throwable $e) {
                        // fallback: treat as unix timestamp seconds?
                        return date('Y-m-d', (int)$cellVal);
                    }
                }
                $ts = strtotime((string)$cellVal);
                return $ts ? date('Y-m-d', $ts) : null;
            };

            // Helper ambil string
            $val = static fn($sheet, $col, $row) => trim((string) $sheet->getCell("{$col}{$row}")->getValue());

            $rows = [];
            for ($row = $start; $row <= $end; $row++) {
                $nip = $val($sheet, 'A', $row);
                if ($nip === '') {
                    continue; // skip baris kosong
                }

                // Tanggal-tanggal
                $startdate        = $toYmd($sheet->getCell("P{$row}")->getValue());
                $enddate          = $toYmd($sheet->getCell("Q{$row}")->getValue());
                $birthdate        = $toYmd($sheet->getCell("V{$row}")->getValue());
                $tglgradeterakhir = $toYmd($sheet->getCell("W{$row}")->getValue());
                $tglmasuk         = $toYmd($sheet->getCell("X{$row}")->getValue());
                $tglpegawaitetap  = $toYmd($sheet->getCell("Y{$row}")->getValue());
                $tglskorgassg     = $toYmd($sheet->getCell("AH{$row}")->getValue());
                $tgldata          = $toYmd($sheet->getCell("BK{$row}")->getValue());

                $rows[] = [
                    'nip'                   => $nip,
                    'fullname'              => $val($sheet, 'B', $row),
                    'org_satu'              => $val($sheet, 'C', $row),
                    'org_dua'               => $val($sheet, 'D', $row),
                    'org_tiga'              => $val($sheet, 'E', $row),
                    'org_kp_satu'           => $val($sheet, 'F', $row),
                    'org_kp_dua'            => $val($sheet, 'G', $row),
                    'org_kp_tiga'           => $val($sheet, 'H', $row),
                    'eegrp'                 => $val($sheet, 'I', $row),
                    'esgrp'                 => $val($sheet, 'J', $row),
                    'peg'                   => $val($sheet, 'K', $row),
                    'jenjang_main_grp_id'   => $val($sheet, 'L', $row),
                    'pog'                   => $val($sheet, 'M', $row),
                    'grup_sppd'             => $val($sheet, 'N', $row),
                    'kode_posisi'           => $val($sheet, 'O', $row),
                    'start_date'            => $startdate,
                    'end_date'              => $enddate,
                    'nama_panjang_posisi'   => $val($sheet, 'R', $row),
                    'pendidikan_terakhir'   => $val($sheet, 'S', $row),
                    'jurusan_pendidikan'    => $val($sheet, 'T', $row),
                    'birthplace'            => $val($sheet, 'U', $row),
                    'birth_date'            => $birthdate,
                    'tgl_grade_terakhir'    => $tglgradeterakhir,
                    'tgl_masuk'             => $tglmasuk,
                    'tgl_pegawai_tetap'     => $tglpegawaitetap,
                    'gender'                => $val($sheet, 'Z',  $row),
                    'marst'                 => $val($sheet, 'AA', $row),
                    'religius'              => $val($sheet, 'AB', $row),
                    'org_unit'              => $val($sheet, 'AC', $row),
                    'org_unit_tx'           => $val($sheet, 'AD', $row),
                    'kode_posisi_atasan'    => $val($sheet, 'AE', $row),
                    'job_code'              => $val($sheet, 'AF', $row),
                    'no_sk_org_assg'        => $val($sheet, 'AG', $row),
                    'tgl_sk_org_assg'       => $tglskorgassg,
                    'home_city'             => $val($sheet, 'AI', $row),
                    'tx_org_01'             => $val($sheet, 'AJ', $row),
                    'tx_org_02'             => $val($sheet, 'AK', $row),
                    'tx_org_03'             => $val($sheet, 'AL', $row),
                    'tx_org_04'             => $val($sheet, 'AM', $row),
                    'tx_org_05'             => $val($sheet, 'AN', $row),
                    'tx_org_06'             => $val($sheet, 'AO', $row),
                    'tx_org_07'             => $val($sheet, 'AP', $row),
                    'tx_org_08'             => $val($sheet, 'AQ', $row),
                    'tx_org_09'             => $val($sheet, 'AR', $row),
                    'tx_org_10'             => $val($sheet, 'AS', $row),
                    'tx_org_11'             => $val($sheet, 'AT', $row),
                    'tx_org_12'             => $val($sheet, 'AU', $row),
                    'tx_org_13'             => $val($sheet, 'AV', $row),
                    'kd_org_01'             => $val($sheet, 'AW', $row),
                    'kd_org_02'             => $val($sheet, 'AX', $row),
                    'kd_org_03'             => $val($sheet, 'AY', $row),
                    'kd_org_04'             => $val($sheet, 'AZ', $row),
                    'kd_org_05'             => $val($sheet, 'BA', $row),
                    'kd_org_06'             => $val($sheet, 'BB', $row),
                    'kd_org_07'             => $val($sheet, 'BC', $row),
                    'kd_org_08'             => $val($sheet, 'BD', $row),
                    'kd_org_09'             => $val($sheet, 'BE', $row),
                    'kd_org_10'             => $val($sheet, 'BF', $row),
                    'kd_org_11'             => $val($sheet, 'BG', $row),
                    'kd_org_12'             => $val($sheet, 'BH', $row),
                    'kd_org_13'             => $val($sheet, 'BI', $row),
                    'profesi'               => $val($sheet, 'BJ', $row),
                    'tgl_data'              => $tgldata,
                ];
            }

            // Bebaskan memori spreadsheet segera
            $spreadsheet->disconnectWorksheets();
            unset($spreadsheet);

            if (!empty($rows)) {
                (new DapegModel())->insertBatch($rows, 500);
            }

            // Update pointer & progress
            $processed = ($end - $start + 1);
            $pointer   = $end + 1;
            $done     += $processed;

            session()->set([
                'imp_pointer' => $pointer,
                'imp_done'    => $done,
            ]);

            $progress = ($total > 0) ? round(min(100, ($done / $total) * 100)) : 100;

            // Selesai?
            $isDone = ($pointer > ($total + 1));
            if ($isDone) {
                @unlink($file);
                session()->remove(['imp_file','imp_ext','imp_pointer','imp_total','imp_done']);
            }

            return $this->response->setJSON([
                'status'   => 'ok',
                'done'     => $isDone,
                'progress' => $progress,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'DapegImport::processChunk - '.$e->getMessage()."\n".$e->getTraceAsString());
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Proses gagal: '.$e->getMessage(),
            ])->setStatusCode(500);
        }
    }
}
