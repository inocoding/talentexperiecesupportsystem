<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbOrgHtd extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_org_htd' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_org_htd' => [
                'type'     => 'INT',
                'null'     => false,
            ],
            'nama_org_htd' => [
                'type'       => 'VARCHAR',
                'constraint' => 125,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
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

        $this->forge->addKey('id_org_htd', true);
        $this->forge->createTable('tb_org_htd');
    }

    public function down()
    {
        $this->forge->dropTable('tb_org_htd');
    }
}
