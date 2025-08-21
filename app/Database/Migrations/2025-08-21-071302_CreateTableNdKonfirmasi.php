<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbNdKonfirmasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_konfirm' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_konfirm' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'perihal_konfirm' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'tgl_konfirm' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'asal_konfirm' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'tujuan_konfirm' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'catatan_konfirm' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'lampiran_konfirm' => [
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

        $this->forge->addKey('id_konfirm', true);
        $this->forge->createTable('tb_nd_konfirmasi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_nd_konfirmasi');
    }
}
