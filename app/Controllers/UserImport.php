<?php

namespace App\Controllers;

use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UserImport extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        return view('user_import');
    }

    // Upload file & simpan sementara
    public function upload()
    {
        $file = $this->request->getFile('excel_file');
        if (!$file->isValid()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'File tidak valid']);
        }

        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newName);

        // Simpan progress di session
        $this->session->set([
            'import_file' => WRITEPATH . 'uploads/' . $newName,
            'import_row'  => 2, // mulai dari baris kedua
            'import_total'=> 0
        ]);

        // Hitung total baris
        $spreadsheet = IOFactory::load(WRITEPATH . 'uploads/' . $newName);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestDataRow();
        $this->session->set('import_total', $highestRow);

        return $this->response->setJSON(['status' => 'ok', 'total' => $highestRow]);
    }

    // Proses sebagian (1000 baris per panggilan)
    public function processChunk()
{
    try {
        // Cek semua data yang dikirim
        $post = $this->request->getPost();
        log_message('error', 'POST Data: ' . print_r($post, true));

        // Kalau ada file (opsional di chunk pertama)
        $file = $this->request->getFile('excel_file');
        if ($file) {
            log_message('error', 'File Diterima: ' . $file->getName());
        } else {
            log_message('error', 'Tidak ada file di request ini');
        }

        // Simulasi proses chunk
        $chunkData = $post['chunkData'] ?? null;
        if (!$chunkData) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Chunk data tidak ditemukan'
            ]);
        }

        // Di sini proses chunk disimpan atau di-insert ke DB
        // ...

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Chunk berhasil diproses'
        ]);

    } catch (\Throwable $e) {
        // Tangkap semua error biar nggak langsung 500
        log_message('error', 'Error processChunk: ' . $e->getMessage());
        log_message('error', $e->getTraceAsString());

        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ]);
    }
}
}

