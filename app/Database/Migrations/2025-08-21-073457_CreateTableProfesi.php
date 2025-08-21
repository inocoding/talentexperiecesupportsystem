<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbProfesi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_profesi' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_pohon_bisnis' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'pohon_bisnis' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'kode_pohon_profesi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'pohon_profesi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'kode_dahan_profesi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'dahan_profesi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'kode_profesi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'nama_profesi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_profesi', true);
        $this->forge->createTable('tb_profesi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_profesi');
    }
}
