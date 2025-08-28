<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DapegModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class DapegImport extends BaseController
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

            // startdate: bisa serial excel atau string
            $start_date = $sheet->getCell("P{$row}")->getValue();
            if (is_numeric($start_date)) {
                $startdate = ExcelDate::excelToDateTimeObject($start_date)->format('Y-m-d');
            } elseif ($start_date) {
                $startdate = date('Y-m-d', strtotime($start_date));
            } else {
                $startdate = null;
            }
            
            // enddate: bisa serial excel atau string
            $end_date = $sheet->getCell("Q{$row}")->getValue();
            if (is_numeric($end_date)) {
                $enddate = ExcelDate::excelToDateTimeObject($end_date)->format('Y-m-d');
            } elseif ($end_date) {
                $enddate = date('Y-m-d', strtotime($end_date));
            } else {
                $enddate = null;
            }
            
            // birthdate: bisa serial excel atau string
            $birth_date = $sheet->getCell("V{$row}")->getValue();
            if (is_numeric($birth_date)) {
                $birthdate = ExcelDate::excelToDateTimeObject($birth_date)->format('Y-m-d');
            } elseif ($birth_date) {
                $birthdate = date('Y-m-d', strtotime($birth_date));
            } else {
                $birthdate = null;
            }
            
            // tglgradeterakhir: bisa serial excel atau string
            $tgl_grade_terakhir = $sheet->getCell("W{$row}")->getValue();
            if (is_numeric($tgl_grade_terakhir)) {
                $tglgradeterakhir = ExcelDate::excelToDateTimeObject($tgl_grade_terakhir)->format('Y-m-d');
            } elseif ($tgl_grade_terakhir) {
                $tglgradeterakhir = date('Y-m-d', strtotime($tgl_grade_terakhir));
            } else {
                $tglgradeterakhir = null;
            }

            // tglmasuk: bisa serial excel atau string
            $tgl_masuk = $sheet->getCell("X{$row}")->getValue();
            if (is_numeric($tgl_masuk)) {
                $tglmasuk = ExcelDate::excelToDateTimeObject($tgl_masuk)->format('Y-m-d');
            } elseif ($tgl_masuk) {
                $tglmasuk = date('Y-m-d', strtotime($tgl_masuk));
            } else {
                $tglmasuk = null;
            }

            // tglpegawaitetap: bisa serial excel atau string
            $tgl_pegawai_tetap = $sheet->getCell("Y{$row}")->getValue();
            if (is_numeric($tgl_pegawai_tetap)) {
                $tglpegawaitetap = ExcelDate::excelToDateTimeObject($tgl_pegawai_tetap)->format('Y-m-d');
            } elseif ($tgl_pegawai_tetap) {
                $tglpegawaitetap = date('Y-m-d', strtotime($tgl_pegawai_tetap));
            } else {
                $tglpegawaitetap = null;
            }

            // tglskorgassg: bisa serial excel atau string
            $tgl_sk_org_assg = $sheet->getCell("AH{$row}")->getValue();
            if (is_numeric($tgl_sk_org_assg)) {
                $tglskorgassg = ExcelDate::excelToDateTimeObject($tgl_sk_org_assg)->format('Y-m-d');
            } elseif ($tgl_sk_org_assg) {
                $tglskorgassg = date('Y-m-d', strtotime($tgl_sk_org_assg));
            } else {
                $tglskorgassg = null;
            }

            // tgldata: bisa serial excel atau string
            $tgl_data = $sheet->getCell("BK{$row}")->getValue();
            if (is_numeric($tgl_data)) {
                $tgldata = ExcelDate::excelToDateTimeObject($tgl_data)->format('Y-m-d');
            } elseif ($tgl_data) {
                $tgldata = date('Y-m-d', strtotime($tgl_data));
            } else {
                $tgldata = null;
            }

            $rows[] = [
                'nip'                   => $nip,
                'fullname'              => $val('B'),
                'org_satu'              => $val('C'),
                'org_dua'               => $val('D'),
                'org_tiga'              => $val('E'),
                'org_kp_satu'           => $val('F'),
                'org_kp_dua'            => $val('G'),
                'org_kp_tiga'           => $val('H'),
                'eegrp'                 => $val('I'),
                'esgrp'                 => $val('J'),
                'peg'                   => $val('K'),
                'jenjang_main_grp_id'   => $val('L'),
                'pog'                   => $val('M'),
                'grup_sppd'             => $val('N'),
                'kode_posisi'           => $val('O'),
                'start_date'            => $startdate,
                'end_date'              => $end_date,
                'nama_panjang_posisi'   => $val('R'),
                'pendidikan_terakhir'   => $val('S'),
                'jurusan_pendidikan'    => $val('T'),
                'birthplace'            => $val('U'),
                'birth_date'            => $birthdate,
                'tgl_grade_terakhir'    => $tglgradeterakhir,
                'tgl_masuk'             => $tglmasuk,
                'tgl_pegawai_tetap'     => $tglpegawaitetap,
                'gender'                => $val('Z'),
                'marst'                 => $val('AA'),
                'religius'              => $val('AB'),
                'org_unit'              => $val('AC'),
                'org_unit_tx'           => $val('AD'),
                'kode_posisi_atasan'    => $val('AE'),
                'job_code'              => $val('AF'),
                'no_sk_org_assg'        => $val('AG'),
                'tgl_sk_org_assg'       => $tglskorgassg,
                'home_city'             => $val('AI'),
                'tx_org_01'             => $val('AJ'),
                'tx_org_02'             => $val('AK'),
                'tx_org_03'             => $val('AL'),
                'tx_org_04'             => $val('AM'),
                'tx_org_05'             => $val('AN'),
                'tx_org_06'             => $val('AO'),
                'tx_org_07'             => $val('AP'),
                'tx_org_08'             => $val('AQ'),
                'tx_org_09'             => $val('AR'),
                'tx_org_10'             => $val('AS'),
                'tx_org_11'             => $val('AT'),
                'tx_org_12'             => $val('AU'),
                'tx_org_13'             => $val('AV'),
                'kd_org_01'             => $val('AW'),
                'kd_org_02'             => $val('AX'),
                'kd_org_03'             => $val('AY'),
                'kd_org_04'             => $val('AZ'),
                'kd_org_05'             => $val('BA'),
                'kd_org_06'             => $val('BB'),
                'kd_org_07'             => $val('BC'),
                'kd_org_08'             => $val('BD'),
                'kd_org_09'             => $val('BE'),
                'kd_org_10'             => $val('BF'),
                'kd_org_11'             => $val('BG'),
                'kd_org_12'             => $val('BH'),
                'kd_org_13'             => $val('BI'),
                'profesi'               => $val('BJ'),
                'tgl_data'              => $tgldata,
            ];
        }

        // insert batch
        if (!empty($rows)) {
            (new DapegModel())->insertBatch($rows, 500);
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

