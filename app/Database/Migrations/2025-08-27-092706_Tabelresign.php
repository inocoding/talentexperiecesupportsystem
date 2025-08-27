<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tabelresign extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_data' => [
                'type'           => 'INT',
                'constraint'     => 100,
            ],
            'nip' => [
                'type'           => 'VARCHAR',
                'constraint'     => 25,
            ],
            'unit_asal_1' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
            ],
            'unit_asal_2' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
            ],
            'unit_asal_3' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
            ],
            'tgl_pengajuan' => [
                'type'       => 'DATE',
            ],
            'tgl_aktivasi' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
            ],
        ]);

        $this->forge->createTable('tb_resign2');
    }

    public function down()
    {
        $this->forge->dropTable('tb_resign2');
    }
}

