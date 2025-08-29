<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OJTModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class OJTImport extends BaseController
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
            $noTest = trim((string) $sheet->getCell("A{$row}")->getValue());
            if ($noTest === '') continue;

            $val = fn($col) => trim((string) $sheet->getCell("{$col}{$row}")->getValue());

             // tgl mulai
            $tgl_mulai_ojt = $sheet->getCell("I{$row}")->getValue();
            if (is_numeric($tgl_mulai_ojt)) {
                $tglMulaiOJT = ExcelDate::excelToDateTimeObject($tgl_mulai_ojt)->format('Y-m-d');
            } elseif ($tgl_mulai_ojt) {
                $tglMulaiOJT = date('Y-m-d', strtotime($tgl_mulai_ojt));
            } else {
                $tglMulaiOJT = null;
            }

            // tgl selesai
            $tgl_selesai_ojt = $sheet->getCell("J{$row}")->getValue();
            if (is_numeric($tgl_selesai_ojt)) {
                $tglSelesaiOJT = ExcelDate::excelToDateTimeObject($tgl_selesai_ojt)->format('Y-m-d');
            } elseif ($tgl_selesai_ojt) {
                $tglSelesaiOJT = date('Y-m-d', strtotime($tgl_selesai_ojt));
            } else {
                $tglSelesaiOJT = null;
            }

            // normalisasi enum
            $rows[] = [
                'no_test'           => $noTest,
                'nama'              => $val('B'),
                'jenjang'           => $val('C'),
                'proyeksi_jabatan'  => $val('D'),
                'unit_proyeksi_lv1' => $val('E'),
                'unit_proyeksi_lv2' => $val('F'),
                'unit_proyeksi_lv3' => $val('G'),
                'unit_proyeksi_lv4' => $val('H'),
                'tgl_mulai_ojt'     => $tglMulaiOJT,
                'tgl_selesai_ojt'   => $tglSelesaiOJT,
            ];
        }

        // insert batch
        if (!empty($rows)) {
            (new OJTModel())->insertBatch($rows, 500);
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

}

