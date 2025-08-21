<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatetbBaMutasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ba' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false,
                'comment'        => 'Primary key',
            ],
            'ba_oleh' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'default'    => null,
                'comment'    => '',
            ],
            'nomor_ba' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'default'    => null,
                'comment'    => '',
            ],
            'judul_ba' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'default'    => null,
                'comment'    => '',
            ],
            'tgl_ba' => [
                'type'       => 'DATE',
                'null'       => true,
                'default'    => null,
            ],
            'jml_peg_ba' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => '',
            ],
            'left_sign_ba' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'default'    => null,
                'comment'    => '',
            ],
            'right_sign_ba' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'default'    => null,
                'comment'    => '',
            ],
            
        ]);

        $this->forge->addKey('id_ba', true); // Primary key
        $this->forge->createTable('tb_ba_mutasi', true);
    }

    public function down()
    {
        $this->forge->dropTable('tb_ba_mutasi', true);
    }
}
