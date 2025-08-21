<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPap extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pap' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_peg' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'id_pasangan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_pap', true);
        $this->forge->createTable('tb_pap');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pap');
    }
}
