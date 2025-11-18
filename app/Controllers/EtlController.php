<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\DapegEtlService;

class EtlController extends BaseController
{
    /**
     * Halaman form ETL: input tanggal snapshot + tombol "Proses DAPEG"
     */
    public function index()
    {
        return view('etl/etldapeg');
    }

    /**
     * Terima POST dari form dan jalankan ETL
     */
    public function run()
    {
        $snapshotDate = $this->request->getPost('snapshot_date');

        if (!$snapshotDate) {
            return redirect()->back()->with('error', 'Tanggal snapshot wajib diisi.');
        }

        $etl = new DapegEtlService();

        try {
            $ok = $etl->run($snapshotDate);

            if (!$ok) {
                return redirect()->back()->with('error', 'Proses ETL gagal. Transaksi di-rollback.');
            }

            return redirect()->back()->with('success', 'Proses DAPEG selesai untuk tanggal ' . $snapshotDate);
        } catch (\Throwable $e) {
            log_message('error', 'EtlController::run - '.$e->getMessage()."\n".$e->getTraceAsString());

            return redirect()->back()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }
}
