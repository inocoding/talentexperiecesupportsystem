<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbOrgSatu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_org_satu' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_org_satu' => [
                'type'     => 'INT',
                'null'     => false,
            ],
            'nama_org_satu' => [
                'type'       => 'VARCHAR',
                'constraint' => 165,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'parent_org_satu' => [
                'type'     => 'INT',
                'null'     => false,
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

        $this->forge->addKey('id_org_satu', true);
        $this->forge->createTable('tb_org_satu');
    }

    public function down()
    {
        $this->forge->dropTable('tb_org_satu');
    }
}
