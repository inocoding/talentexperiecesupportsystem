<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSkMutasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sk' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_data_eval' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'nomor_sk' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tgl_sk' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'file_sk' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
            ],
            'catatan_sk' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_sk', true);
        $this->forge->createTable('tb_sk_mutasi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_sk_mutasi');
    }
}
