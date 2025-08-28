<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbNdJawaban extends Migration
{
    public function up()
    {
        // Kalau mau aman, cek tabel dulu
        if (! $this->db->tableExists('tb_nd_jawaban')) {
            // ... definisi field di sini ...
            $this->forge->createTable('tb_nd_jawaban', true); // <-- parameter true = IF NOT EXISTS
        }

        $this->forge->addField([
            'id_jwbn' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_jwbn' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'perihal_jwbn' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'tgl_jwbn' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'asal_jwbn' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'tujuan_jwbn' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'catatan_jwbn' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'lampiran_jwbn' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_jwbn', true);
        $this->forge->createTable('tb_nd_jawaban');
    }

    public function down()
    {
        $this->forge->dropTable('tb_nd_jawaban');
    }
}
