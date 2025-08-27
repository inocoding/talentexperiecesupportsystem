<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelIdt extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_data' => [
                'type'           => 'INT',
                'constraint'     => 100,
             
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
               
            ],
            'unit_asal_1' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
               
            ],
            'unit_asal_2' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                
            ],
            'unit_asal_3' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                
            ],
            'tgl_awal' => [
                'type' => 'DATE',
               
            ],
			   'tgl_berakhir' => [
                'type' => 'DATE',
           
            ],
            'unit_tujuan_1' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
               
            ],
			 'unit_tujuan_2' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
             
            ],
			 'unit_tujuan_3' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
              
            ],
        ]);

      

        $this->forge->createTable('tb_idt');
    }

    public function down()
    {
        $this->forge->dropTable('tb_idt');
    }
}
