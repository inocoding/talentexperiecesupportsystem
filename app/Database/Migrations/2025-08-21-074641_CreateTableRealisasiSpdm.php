<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbRealisasiSpdm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_data_realisapdm' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_ui' => [
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
            'rp_realisasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'bulan_real' => [
                'type'       => "ENUM('1','2','3','4','5','6','7','8','9','10','11','12')",
                'null'       => true,
            ],
            'tahun_real' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_data_realisapdm', true);
        $this->forge->createTable('tb_realisasi_spdm');
    }

    public function down()
    {
        $this->forge->dropTable('tb_realisasi_spdm');
    }
}
