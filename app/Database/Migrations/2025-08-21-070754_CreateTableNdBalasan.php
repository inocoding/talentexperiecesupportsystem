<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbNdBalasan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_balasan' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_balasan' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'perihal_balasan' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'tgl_balasan' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'asal_balasan' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'tujuan_balasan' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'catatan_balasan' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'lampiran_balasan' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
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

        $this->forge->addKey('id_balasan', true);
        $this->forge->createTable('tb_nd_balasan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_nd_balasan');
    }
}
