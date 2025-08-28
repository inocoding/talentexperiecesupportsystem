<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbFtk extends Migration
{
    public function up()
    {
        // Kalau mau aman, cek tabel dulu
        if (! $this->db->tableExists('tb_ftk')) {
            // ... definisi field di sini ...
            $this->forge->createTable('tb_ftk', true); // <-- parameter true = IF NOT EXISTS
        }

        $this->forge->addField([
            'id_data_ftk' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tx_div' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tx_dit' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'id_unit' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'pagu_total' => [
                'type' => 'INT',
            ],
            'real_total' => [
                'type' => 'INT',
            ],
            'pagu_ma' => [
                'type' => 'INT',
            ],
            'real_ma' => [
                'type' => 'INT',
            ],
            'pagu_mm' => [
                'type' => 'INT',
            ],
            'real_mm' => [
                'type' => 'INT',
            ],
            'pagu_md' => [
                'type' => 'INT',
            ],
            'real_md' => [
                'type' => 'INT',
            ],
            'pagu_spva' => [
                'type' => 'INT',
            ],
            'real_spva' => [
                'type' => 'INT',
            ],
            'pagu_spvd' => [
                'type' => 'INT',
            ],
            'real_spvd' => [
                'type' => 'INT',
            ],
            'pagu_f' => [
                'type' => 'INT',
            ],
            'real_f' => [
                'type' => 'INT',
            ],
            'data_bulan' => [
                'type' => 'INT',
            ],
            'data_tahun' => [
                'type' => 'INT',
            ],
            'updater' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
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

        $this->forge->addKey('id_data_ftk', true);
        $this->forge->createTable('tb_ftk');
    }

    public function down()
    {
        $this->forge->dropTable('tb_ftk');
    }
}
