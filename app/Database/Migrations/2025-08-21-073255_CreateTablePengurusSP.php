<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPengurusSp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_datasp' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nip_pengsp' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'jabatan_sp' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'unit_sp' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'org_sp' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_datasp', true);
        $this->forge->createTable('tb_pengurus_sp');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pengurus_sp');
    }
}
