<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelTugasKarya extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tk' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'unit_tujuan_1' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'unit_tujuan_2' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'unit_tujuan_3' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'unit_tujuan_4' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'unit_asal_1' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'unit_asal_2' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'unit_asal_3' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'unit_asal_4' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tgl_aktivasi' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tgl_berakhir' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_tk', true);
        $this->forge->createTable('tb_tugas_karya');
    }

    public function down()
    {
        $this->forge->dropTable('tk');
    }
}