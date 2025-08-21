<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPaguSpdm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_data_pagu_spdm' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ui_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'htd_area' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'rp_pagu' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'tahun_pagu' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_data_pagu_spdm', true);
        $this->forge->createTable('tb_pagu_spdm');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pagu_spdm');
    }
}
