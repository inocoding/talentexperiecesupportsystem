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
        try {
            $file    = (string) session('imp_file');
            $ext     = (string) session('imp_ext');
            $pointer = (int) session('imp_pointer');
            $total   = (int) session('imp_total');
            $done    = (int) session('imp_done');

            if (!$file || !is_file($file)) {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Session/file import tidak ditemukan',
                ]);
            }

            // Selesai?
            if ($pointer > ($total + 1)) {
                @unlink($file);
                session()->remove(['imp_file','imp_ext','imp_pointer','imp_total','imp_done']);

                return $this->response->setJSON([
                    'status'   => 'ok',
                    'done'     => true,
                    'progress' => 100,
                ]);
            }

            // Rentang baris untuk chunk ini
            $start = $pointer;
            $end   = min($pointer + $this->chunk - 1, $total + 1); // +1 karena baris 1 = header

            // Filter baris, kolom biarkan null supaya semua kolom dibaca
            $filter = new ChunkReadFilter();
            $filter->setRows($start, ($end - $start + 1)); // TANPA $this->cols

            // Siapkan reader
            $reader = ($ext === 'xls') ? new Xls() : new Xlsx();
            $reader->setReadDataOnly(true);
            $reader->setReadFilter($filter);

            $spreadsheet = $reader->load($file);
            $sheet       = $spreadsheet->getActiveSheet();

            // Helper: konversi Excel date ke 'Y-m-d'
            $toYmd = static function ($cellVal) {
                if ($cellVal === null || $cellVal === '') {
                    return null;
                }
                if (is_numeric($cellVal)) {
                    try {
                        return ExcelDate::excelToDateTimeObject($cellVal)->format('Y-m-d');
                    } catch (\Throwable $e) {
                        return date('Y-m-d', (int) $cellVal);
                    }
                }
                $ts = strtotime((string) $cellVal);
                return $ts ? date('Y-m-d', $ts) : null;
            };

            // Urutan field sesuai urutan kolom di Excel (A = nip, B = nama_lengkap, dst)
            $fieldOrder = [
                'nip',
                'nama_lengkap',
                'cocd',
                'company_code',
                'busa',
                'business_area',
                'psubarea',
                'personnel_subarea',
                'org_unit',
                'organizational_unit',
                'eegrp',
                'employee_group',
                'esgrp',
                'employee_subgroup',
                'peg',
                'level',
                'skala_gaji_dasar',
                'jenjang_main_grp_id',
                'jenjang_main_grp_text',
                'pog',
                'jenjang_sub_grp_text',
                'travel_priviledge_grup_sppd',
                'kode_posisi',
                'posisi',
                'start_date_posisi',
                'end_date_posisi',
                'nama_panjang_posisi',
                'pendidikan_terakhir',
                'jurusan_pendidikan',
                'birthplace',
                'birth_date',
                'tanggal_grade_terakhir',
                'tanggal_masuk',
                'tanggal_capeg',
                'tanggal_pegawai_tetap',
                'gen',
                'jenis_kelamin',
                'marst',
                'status_pernikahan',
                'rel',
                'agama',
                'parea',
                'payroll_area',
                'bank_payroll',
                'no_rekening_bank_payroll',
                'e_mail',
                'pa',
                'personnel_area',
                'cost_ctr',
                'cost_center',
                'kode_posisi_atasan',
                'posisi_atasan',
                'jobcode',
                'job',
                'job_name',
                'kode_jabatan',
                'kelompok_jabatan',
                'keterangan_jabatan',
                'nomor_sk_basic_pay',
                'tanggal_sk_for_basic_pay',
                'no_sk_penugasan',                 // dari "no._sk_penugasan"
                'tanggal_sk_penugasan',
                'nama_panjang_posisi_simkp',
                'golongan_darah',
                'tipe_alamat',
                'co_name',
                'nama_jalan_dan_nomor_rumah',
                'kota',
                'district',
                'kode_pos',
                'no_telepon',
                'second_address_line',             // dari "2nd_address_line"
                'street_2',
                'street_3',
                'region_state_province_count',     // dari "region_(state,_province,_count"
                'house_number',                    // dari "house#"
                'legacy_code',
                'married_for_tax_purposes',
                'marital_status_of_the_employee',
                'td',
                'jumlah_tanggungan',
                'res',
                'sanksi_disiplin',
                'nomor_sk_hukuman',
                'tanggal_sk_hukuman',
                'pasal_yang_dilanggar',
                'hukuman_yang_diberikan',
                'keterangan',
                'zzskrelated',
                'npwp',
                'jenis_dplk',
                'no_dplk',
                'no_it0007',
                'jadwal_kerja',
                'no_ktp',
                'kode_adt',
                'text_adt',
                'tgl_mulai_adt',
                'tgl_selesai_adt',
                'organisasi_1',
                'organisasi_2',
                'organisasi_3',
                'organisasi_4',
                'organisasi_5',
                'organisasi_6',
                'organisasi_7',
                'organisasi_8',
                'organisasi_9',
                'organisasi_10',
                'organisasi_11',
                'organisasi_12',
                'organisasi_13',
                'kode_organisasi_1',
                'kode_organisasi_2',
                'kode_organisasi_3',
                'kode_organisasi_4',
                'kode_organisasi_5',
                'kode_organisasi_6',
                'kode_organisasi_7',
                'kode_organisasi_8',
                'kode_organisasi_9',
                'kode_organisasi_10',
                'kode_organisasi_11',
                'kode_organisasi_12',
                'kode_organisasi_13',
                'tx_no',
                'tdk_dihit',
                'tgl_proses',
                'tgl_data',
                'thn_umur',
                'bln_umur',
                'profesi',
            ];

            // Field yang bertipe DATE
            $dateFields = [
                'birth_date',
                'end_date_posisi',
                'start_date_posisi',
                'tanggal_capeg',
                'tanggal_grade_terakhir',
                'tanggal_masuk',
                'tanggal_pegawai_tetap',
                'tanggal_sk_for_basic_pay',
                'tanggal_sk_hukuman',
                'tanggal_sk_penugasan',
                'tgl_data',
                'tgl_mulai_adt',
                'tgl_proses',
                'tgl_selesai_adt',
            ];

            // Field numeric (INT / DECIMAL / TINYINT)
            $numericFields = [
                'skala_gaji_dasar',
                'jumlah_tanggungan',
                'thn_umur',
                'bln_umur',
                'tdk_dihit',
            ];

            // Helper: konversi index (1,2,3,...) ke kolom Excel (A,B,...,Z,AA,...)
            $indexToCol = static function (int $index): string {
                $index--; // ubah jadi 0-based
                $letters = '';
                while ($index >= 0) {
                    $remainder = $index % 26;
                    $letters   = chr(65 + $remainder) . $letters;
                    $index     = intdiv($index, 26) - 1;
                }
                return $letters;
            };

            $rows = [];

            for ($row = $start; $row <= $end; $row++) {
                $rowData = [];

                foreach ($fieldOrder as $i => $field) {
                    $col     = $indexToCol($i + 1); // index array 0-based → kolom 1-based
                    $cellVal = $sheet->getCell($col . $row)->getValue();

                    if (in_array($field, $dateFields, true)) {
                        // Tanggal
                        $rowData[$field] = $toYmd($cellVal);
                    } elseif (in_array($field, $numericFields, true)) {
                        // Numerik
                        if ($cellVal === null || $cellVal === '') {
                            $rowData[$field] = null;
                        } else {
                            if ($field === 'tdk_dihit') {
                                // TINYINT khusus, misal 'X' → 1, angka → cast ke int
                                $v = strtoupper(trim((string) $cellVal));
                                if ($v === '') {
                                    $rowData[$field] = null;
                                } elseif (is_numeric($v)) {
                                    $rowData[$field] = (int) $v;
                                } elseif ($v === 'X' || $v === 'Y') {
                                    $rowData[$field] = 1;
                                } else {
                                    $rowData[$field] = null;
                                }
                            } elseif ($field === 'jumlah_tanggungan' ||
                                    $field === 'thn_umur' ||
                                    $field === 'bln_umur') {
                                $v = trim((string) $cellVal);
                                $rowData[$field] = is_numeric($v) ? (int) $v : null;
                            } elseif ($field === 'skala_gaji_dasar') {
                                if (is_numeric($cellVal)) {
                                    $rowData[$field] = (float) $cellVal;
                                } else {
                                    $num = preg_replace('/[^\d\-.,]/', '', (string) $cellVal);
                                    $num = str_replace(',', '.', $num);
                                    $rowData[$field] = ($num === '' ? null : (float) $num);
                                }
                            } else {
                                // fallback numeric umum
                                $v = trim((string) $cellVal);
                                $rowData[$field] = is_numeric($v) ? $v : null;
                            }
                        }
                    } else {
                        // String biasa
                        $rowData[$field] = trim((string) $cellVal);
                    }
                }

                // Skip baris kosong (tanpa NIP)
                if ($rowData['nip'] === '') {
                    continue;
                }

                $rows[] = $rowData;
            }

            // Bebaskan memori
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

            $progress = ($total > 0)
                ? round(min(100, ($done / $total) * 100))
                : 100;

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


    public function resetStaging()
    {
        try {
        // 1) Truncate tabel staging lewat model
        $dapegModel = new DapegModel();
        $dapegModel->builder()->truncate();   // <— ini yang penting

        // 2) Bersihkan sesi import supaya tidak nyangkut
        session()->remove(['imp_file','imp_ext','imp_pointer','imp_total','imp_done']);

        return $this->response->setJSON([
            'status'  => 'ok',
            'message' => 'Staging DAPEG berhasil di-reset (semua data upload lama dihapus).',
        ]);
    } catch (\Throwable $e) {
        log_message('error', 'DapegImport::resetStaging - '.$e->getMessage()."\n".$e->getTraceAsString());

        return $this->response
            ->setStatusCode(500)
            ->setJSON([
                'status'  => 'error',
                'message' => 'Reset gagal: '.$e->getMessage(),
            ]);
    }
    }

}
