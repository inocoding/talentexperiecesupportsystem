<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAPS extends Migration
{
    protected $table = 'tb_aps';

    public function up()
    {
        $this->forge->addField([
            'id_data' => [
                'type'           => 'INT',
                'constraint'     => 11,

            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],

            // Unit Asal
            'unit_asal_1' => ['type' => 'VARCHAR', 'constraint' => 25],
            'unit_asal_2' => ['type' => 'VARCHAR', 'constraint' => 25],
            'unit_asal_3' => ['type' => 'VARCHAR', 'constraint' => 25],
            'unit_asal_4' => ['type' => 'VARCHAR', 'constraint' => 25],

            // Unit Tujuan
            'unit_tujuan_1' => ['type' => 'VARCHAR', 'constraint' => 25],
            'unit_tujuan_2' => ['type' => 'VARCHAR', 'constraint' => 25],
            'unit_tujuan_3' => ['type' => 'VARCHAR', 'constraint' => 25],
            'unit_tujuan_4' => ['type' => 'VARCHAR', 'constraint' => 25],

            'tgl_pengajuan' => [
                'type' => 'DATE',
 
            ],
            'tgl_aktivasi' => [
                'type' => 'DATE',

            ],

            // 1= Mengajukan, 2= Evaluasi Unit Asal, 3= Evaluasi Unit Tujuan,
            // 4= Evaluasi HTD Korporat, 5= Proses Evaluasi MAB, 6= Diterima, 7= Ditolak
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['1','2','3','4','5','6','7'],
                'null'       => false,
                'comment'    => '1=Mengajukan,2=Evaluasi Unit Asal,3=Evaluasi Unit Tujuan,4=Evaluasi HTD Korporat,5=Proses Evaluasi MAB,6=Diterima,7=Ditolak',
            ],

            'alasan_aps' => [
                'type' => 'TEXT',
                'null' => false,
            ],

            // Timestamps optional (hapus jika tidak diperlukan)
            // 'created_at' => ['type' => 'DATETIME', 'null' => true],
            // 'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id_data', true);
        $this->forge->addKey('nip'); // index bantu pencarian

        // Set atribut tabel (engine/charset/collation)
        $attributes = [
            'ENGINE'           => 'InnoDB',
            'DEFAULT CHARSET'  => 'utf8mb4',
            'COLLATE'          => 'utf8mb4_0900_ai_ci',
        ];

        $this->forge->createTable($this->table, true, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable($this->table, true);
    }
}
