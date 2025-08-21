<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbLampEval extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lamp' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'lamp_oleh' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'nomor_lampeval' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tgl_lampeval' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'jml_peg_lampeval' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'left_sign' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'right_sign' => [
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

        $this->forge->addKey('id_lamp', true);
        $this->forge->createTable('tb_lamp_eval');
    }

    public function down()
    {
        $this->forge->dropTable('tb_lamp_eval');
    }
}
