<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Ptb;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class ptbimport extends BaseController
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
            $tglMulaiStudi = $sheet->getCell("O{$row}")->getValue();
            if (is_numeric($tglMulaiStudi)) {
                $tgl_MulaiStudi = ExcelDate::excelToDateTimeObject($tglMulaiStudi)->format('Y-m-d');
            } elseif ($tglMulaiStudi) {
                $tgl_MulaiStudi = date('Y-m-d', strtotime($tglMulaiStudi));
            } else {
                $tgl_MulaiStudi= null;
            }

              $tglSelesaiStudi = $sheet->getCell("P{$row}")->getValue();
            if (is_numeric($tglSelesaiStudi)) {
                $tgl_SelesaiStudi = ExcelDate::excelToDateTimeObject($tglSelesaiStudi)->format('Y-m-d');
            } elseif ($tglSelesaiStudi) {
                $tgl_SelesaiStudi = date('Y-m-d', strtotime($tglSelesaiStudi));
            } else {
                $tgl_SelesaiStudi= null;
            }
            $tglAktivasi = $sheet->getCell("V{$row}")->getValue();
            if (is_numeric($tglAktivasi)) {
                $tgl_aktivasi = ExcelDate::excelToDateTimeObject($tglAktivasi)->format('Y-m-d');
            } elseif ($tglAktivasi) {
                 $tgl_aktivasi = date('Y-m-d', strtotime($tglAktivasi));
            } else {
                 $tgl_aktivasi= null;
            }


            // normalisasi enum
            $jenjang_ptb = $val('H');
            $jenjang_ptb = $this->mapJenjangptb($jenjang_ptb);

            $program_pendidikan_formal = $val('I');
            $program_pendidikan_formal = $this->mapProgram($program_pendidikan_formal);

            $bidang = $val('J');
            $bidang = $this->mapBidang($bidang);

            $sub_bidang = $val('K');
            $sub_bidang = $this->mapSubbidang($sub_bidang);

            $status = $val('Q');
            $status = $this->mapStatus($status);

            $rows[] = [


'nip'  => $nip,
'nama' => $val('B'),
'sebutan_jabatan'=> $val('C'),
'unit_asal_lv1' => $val('D'),
'unit_asal_lv2' => $val('E'), 
'unit_asal_lv3' => $val('F'),
'angkatan' => $val('G'),
'jenjang_ptb' => $jenjang_ptb,
'program_pendidikan_formal' => $program_pendidikan_formal,
'bidang' => $bidang,
'sub_bidang' => $sub_bidang,
'on_mission' => $val('L'),
'program_studi' => $val('M'),
'universitas' => $val('N'),
'tgl_mulai_studi' => $tgl_MulaiStudi,
'tgl_selesai_studi'=> $tgl_SelesaiStudi,
'status' => $status,
'penempatan_pasca_studi' => $val('R'),
'unit_penempatan_lv1' => $val('S'),
'unit_penempatan_lv2' => $val('T'),
'unit_penempatan_lv3'=> $val('U'), 
'tanggal_aktivasi' => $tgl_aktivasi,

            ];
        }

        // insert batch
        if (!empty($rows)) {
            (new Ptb())->insertBatch($rows, 500);
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

    private function mapJenjangptb($v): string
    {
        $v = strtolower(trim((string)$v));
        if (in_array($v, ['1','D3-Diploma'])) return '1';
        if (in_array($v, ['2','S1-Sarjana']))  return '2';
        if (in_array($v, ['3','S2-Master']))  return '3';
        if (in_array($v, ['4','S3-Doctoral']))  return '4';
        return '1'; // default aman
    }

    private function mapProgram($v): string
    {
        $v = strtolower(trim((string)$v));
        if (in_array($v, ['1','Meninggalkan Kedinasan'])) return '1';
        if (in_array($v, ['2','Tidak Meninggalkan Kedinasan'])) return '2';
        return '1';
    }

    private function mapBidang($v): string
    {
        $v = strtolower(trim((string)$v));
        if (in_array($v, ['1','Energy Transition'])) return '1';
        if (in_array($v, ['2','Value Creation & Enablers']))  return '2';
        if (in_array($v, ['3','Digital']))  return '3';
        if (in_array($v, ['4','Operational Exellence']))  return '4';
        if (in_array($v, ['5','Operational Exellence']))  return '5';
        return '1'; // default aman
    }

       private function mapSubbidang($v): string
    {
        $v = strtolower(trim((string)$v));
        if (in_array($v, ['1','Generation'])) return '1';
        if (in_array($v, ['2','Transmission']))  return '2';
        if (in_array($v, ['3','Distribution']))  return '3';
        if (in_array($v, ['4','Value Creation & Enablers']))  return '4';
        if (in_array($v, ['5','Digital']))  return '5';
        if (in_array($v, ['6','Future Leaders Program']))  return '6';
        return '1'; // default aman
    }

   private function mapStatus($v): string
    {
        $v = strtolower(trim((string)$v));
        if (in_array($v, ['1','Belum Berangkat'])) return '1';
        if (in_array($v, ['2','Proses Kuliah']))  return '2';
        if (in_array($v, ['3','Perpanjangan']))  return '3';
        if (in_array($v, ['4','Lulus']))  return '4';
        if (in_array($v, ['5','DO/Mengundurkan Diri']))  return '5';
        if (in_array($v, ['6','Tidak Lulus']))  return '6';
        if (in_array($v, ['7','Lain-Lain']))  return '7';
        return '1'; // default aman
    }

}

