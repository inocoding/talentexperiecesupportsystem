<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbDasarMutasiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dm' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false,
                'comment'        => 'Primary key',
            ],
            'jenis_dm' => [
                'type'       => "ENUM('1','2','3','4','5')",
                'null'       => false,
                'comment'    => '1 = nota dinas, 2 = surat, 3 = evaluasi burnout, 4 = evaluasi manajemen, 5 = lainnya',
            ],
            'no_dm' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => 'Nomor dokumen mutasi',
            ],
            'perihal_dm' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => 'Perihal dokumen mutasi',
            ],
            'jml_usulan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'comment'    => 'Jumlah usulan mutasi',
            ],
            'tgl_dm' => [
                'type'    => 'DATE',
                'null'    => true,
                'comment' => 'Tanggal dokumen mutasi',
            ],
            'tgl_dispo_dm' => [
                'type'    => 'DATE',
                'null'    => true,
                'comment' => 'Tanggal disposisi dokumen',
            ],
            'asal_dm' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => 'Asal dokumen',
            ],
            'tujuan_dm' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => 'Tujuan dokumen',
            ],
            'catatan_dm' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => 'Catatan tambahan',
            ],
            'lampiran_dm' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => 'Lampiran dokumen',
            ],
        ]);

        $this->forge->addKey('id_dm', true); // Primary key
        $this->forge->createTable('tb_dasar_mutasi', true);
    }

    public function down()
    {
        $this->forge->dropTable('tb_dasar_mutasi', true);
    }
}
