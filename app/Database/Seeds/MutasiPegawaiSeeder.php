<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MutasiPegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nip'           => '19890101202201',
                'unit_tujuan_1' => 'Divisi A',
                'unit_tujuan_2' => 'Subdiv A1',
                'unit_tujuan_3' => 'Bagian A1-1',
                'unit_tujuan_4' => 'Sek A1-1-1',
                'unit_asal_1'   => 'Divisi Lama',
                'unit_asal_2'   => 'Subdiv Lama',
                'unit_asal_3'   => 'Bagian Lama',
                'unit_asal_4'   => 'Sek Lama',
                'tgl_aktivasi'  => '2025-08-26',
                'jenis_mutasi'  => '1', // 1 = promosi
                'status'        => '4', // 4 = aktivasi
            ],
            [
                'nip'           => '19900202202302',
                'unit_tujuan_1' => 'Divisi B',
                'unit_tujuan_2' => 'Subdiv B1',
                'unit_tujuan_3' => 'Bagian B1-2',
                'unit_tujuan_4' => 'Sek B1-2-3',
                'unit_asal_1'   => 'Divisi Lama B',
                'unit_asal_2'   => 'Subdiv Lama B',
                'unit_asal_3'   => 'Bagian Lama B',
                'unit_asal_4'   => 'Sek Lama B',
                'tgl_aktivasi'  => '2025-08-20',
                'jenis_mutasi'  => '2', // 2 = rotasi
                'status'        => '1', // 1 = fit proper tes
            ],
        ];

        // Insert batch
        $this->db->table('tb_mutasi')->insertBatch($data);
    }
}
