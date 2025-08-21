<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbOrgDiv extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_org_div' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_org_div' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'name_org_div' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'nick_name_org_div' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'parent_dit' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'parent_org_unit_satu' => [
                'type' => 'INT',
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

        $this->forge->addKey('id_org_div', true);
        $this->forge->createTable('tb_org_div');
    }

    public function down()
    {
        $this->forge->dropTable('tb_org_div');
    }
}
