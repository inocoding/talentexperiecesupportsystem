<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tabelmutasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_data' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'unit_tujuan_1' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'unit_tujuan_2' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'unit_tujuan_3' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'unit_tujuan_4' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'unit_asal_1' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'unit_asal_2' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'unit_asal_3' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'unit_asal_4' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'tgl_aktivasi' => [
                'type' => 'DATE',
                'null' => true, // di screenshot kolom ini "Ya" (boleh NULL)
            ],
            'jenis_mutasi' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '2', '3'],
                'null'       => false,
                'comment'    => '1 = promosi, 2 = rotasi, 3 = demosi',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '2', '3', '4'],
                'null'       => false,
                'comment'    => '1 = fit proper tes, 2 = evaluasi, 3 = cetak sk, 4 = aktivasi',
            ],
        ]);

        $this->forge->addKey('id_data', true);   // primary key
        $this->forge->addKey('nip');             // index bantu pencarian

        $this->forge->createTable('mutasi_pegawai', false, [
            'ENGINE'  => 'InnoDB',
            'COMMENT' => 'Riwayat mutasi pegawai',
            'COLLATE' => 'utf8mb4_0900_ai_ci',
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('mutasi_pegawai', true);
    }
}
