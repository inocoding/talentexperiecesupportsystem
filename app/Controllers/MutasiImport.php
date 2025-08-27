<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MutasiModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class MutasiImport extends BaseController
{
    // konfigurasi chunck
    private int $chunk = 300; //jumlah baris per hit

    public function upload(){
        // validasi file
        $file = $this->request->getFile('excel_file');
        if (!$file || !$file->isValid()) {
            return $this->response->setJSON(['status'=>'error','message'=>'file tidak valid']);
        }

        // pembatasan jenis file
        $ext = strtolower($file->getClientExtension());
        if (!in_array($ext, ['xlsx','xls','csv'])) {
            return $this->response->setJSON(['status'=>'error','message'=>'Format harus xlsx/xls/csv']);
        }

        // simpan ke writable/uploads
        $newName = $file->getRandomName();
        $path = WRITEPATH.'uploads/'.$newName;
        $file->move(WRITEPATH.'uploads/', $newName);

        // hitung total baris (tanpa baca semua cell)
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();

        // baris 1 = header -> data mulai dari baris 2
        $totalDataRows = max(0, $highestRow - 1);

        // set pointer di session
        session()->set([
            'imp_file'      => $path,
            'imp_pointer'   => 2,
            'imp_total'     => $totalDataRows,
            'imp_done'      => 0
        ]);

        return $this->response->setJSON(['status'=>'ok', 'total'=>$totalDataRows]);
    }

    public function processChunk(){
        $file       = session('imp_file');
        $pointer    = (int) session('imp_pointer');
        $total      = (int) session('imp_total');
        $done       = (int) session('imp_done');

        if (!$file || !is_file($file)) {
            return $this->response->setJSON(['status'=>'error','message'=>'Session import hilang/file tidak ditemukan']);
        }

        if ($pointer > ($total + 1)) {
            // selesai: bersihkan session + hapus file
            @unlink($file);
            session()->remove(['imp_file','imp_pointer','imp_total','imp_done']);
            return $this->response->setJSON([
                'status'=>'ok', 'done'=>true, 'progress'=>100
            ]);
        }

        // buka file dan proses chunk
        $spreadsheet    = IOFactory::load($file);
        $sheet          = $spreadsheet->getActiveSheet();

        $start = $pointer;
        $end = min($pointer + $this->chunk - 1, $total + 1); // +1 karena header di baris 1

        $rows = [];
        for ($row = $start; $row <= $end ; $row++) { 
            // mapping kolom: A..L (12 kolom)
            $nip    = trim((string) $sheet->getCell("A{$row}")->getValue());
            if ($nip === '') continue; //skip baris kosong

            // helper ambil string
            $val = fn($col) => trim((string) $sheet->getCell("{$col}{$row}")->getValue());

            // tanggal: bisa serial excel atau string
            $tglCell = $sheet->getCell("J{$row}")->getValue();
            if (is_numeric($tglCell)) {
                $tglAktivasi = ExcelDate::excelToDateTimeObject($tglCell)->format('Y-m-d');
            } elseif ($tglCell) {
                $tglAktivasi = date('Y-m-d', strtotime($tglCell));
            } else {
                $tglAktivasi = null;
            }

            // normalisasi enum
            $jenis = $val('K');
            $jenis = $this->mapJenis($jenis);

            $status = $val('L');
            $status = $this->mapStatus($status);

            $rows[] = [
                'nip'           => $nip,
                'unit_tujuan_1' => $val('B'),
                'unit_tujuan_2' => $val('C'),
                'unit_tujuan_3' => $val('D'),
                'unit_tujuan_4' => $val('E'),
                'unit_asal_1'   => $val('F'),
                'unit_asal_2'   => $val('G'),
                'unit_asal_3'   => $val('H'),
                'unit_asal_4'   => $val('I'),
                'tgl_aktivasi'  => $tglAktivasi,
                'jenis_mutasi'  => $jenis,
                'status'        => $status,
            ];
        }

        // insert batch
        if (!empty($rows)) {
            (new MutasiModel())->insertBatch($rows, 500);
        }

        // update pointer & progress
        $processed  = ($end - $start + 1);
        $pointer    = $end + 1;
        $done       += $processed;
        session()->set([
            'imp_pointer'   => $pointer,
            'imp_done'      => $done,
        ]);

        $progress = ($total > 0) ? round(min(100, ($done / $total) * 100)) : 100;

        // selesai?
        $isDone = ($pointer > ($total + 1));
        if ($isDone) {
            @unlink($file);
            session()->remove([
                'imp_file',
                'imp_pointer',
                'imp_total',
                'imp_done'
            ]);
        }

        return $this->response->setJSON([
            'status'    => 'ok',
            'done'      => $isDone,
            'progress'  => $progress
        ]);
    }

    private function mapJenis($v): string
    {
        $v = strtolower(trim((string)$v));
        if (in_array($v, ['1','promosi'])) return '1';
        if (in_array($v, ['2','rotasi']))  return '2';
        if (in_array($v, ['3','demosi']))  return '3';
        return '1'; // default aman
    }

    private function mapStatus($v): string
    {
        $v = strtolower(trim((string)$v));
        if (in_array($v, ['1','fit proper','fit proper tes'])) return '1';
        if (in_array($v, ['2','evaluasi']))                     return '2';
        if (in_array($v, ['3','cetak sk','cetak']))             return '3';
        if (in_array($v, ['4','aktivasi','aktif']))             return '4';
        return '4';
    }

}

