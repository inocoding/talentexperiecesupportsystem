<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbEvalMutasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_eval' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'dientry_oleh' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'dikonsep_oleh' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'timestamp_entry' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'unit_pengaju' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'nip_eval' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'nama_eval' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'peg_eval' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'kode_org_unit_eval' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'kode_org_unit_tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'pendidikan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'masa_kerja' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'comment'    => 'dalam satuan bulan',
            ],
            'tgl_peg_ttp' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'masa_jabatan_terakhir' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'comment'    => 'dalam satuan bulan',
            ],
            'tgl_jabtrk' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'durasi_diunit_saat_ini' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'comment'    => 'dalam satuan bulan',
            ],
            'jenjab_eval' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
                'collation'  => 'utf8mb3_unicode_ci',
            ],
            'pog_saat_ini' => [
                'type'       => 'VARCHAR',
                'constraint' => 300,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'jabatan_saat_ini' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => false,
            ],
            'jabatan_lengkap_saat_ini' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'proyeksi_jabatan_baru' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'dahan_profesi_tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'dahan_profesi_skrg' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'pog_baru' => [
                'type'       => 'VARCHAR',
                'constraint' => 300,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'unit_tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'org_dua_tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 300,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'org_tiga_tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'org_satu_tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 300,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'unit_asal' => [
                'type'       => 'VARCHAR',
                'constraint' => 400,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'unit_asal_eval' => [
                'type'       => 'VARCHAR',
                'constraint' => 300,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'sub_unit_pelaksana_eval' => [
                'type'       => 'VARCHAR',
                'constraint' => 400,
                'collation'  => 'utf8mb3_unicode_ci',
                'null'       => true,
            ],
            'for_collab_htd_area'     => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>false],
            'jenis_mutasi'            => [
                'type'=>"ENUM('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15')",
                'null'=>false,
                'comment'=>"1 : lolos butuh 2 : aps 3 : bursa 4 : rotasi internal divisi 5 : berangkat ptb 6 : kembali ptb 7 : promosi 8 : demosi 9 : rotasi internal direktorat 10 : TUGAS KARYA 11 : KEMBALI TUGAS KARYA 12 : IDT 13 : KEMBALI IDT 14 : PERPANJANGAN TUGAS KARYA 15 : PERPANJANGAN IDT"
            ],
            'alasan_mutasi'           => ['type'=>'VARCHAR','constraint'=>500,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'status_pasangan'         => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'status_hukdis'           => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'status_pengurus_sp'      => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'kota_lahir'              => ['type'=>'VARCHAR','constraint'=>300,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'kota_rumah'              => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],

            'id_dasar_mutasi'         => ['type'=>'INT','null'=>false],
            'dasar_mutasi'            => ['type'=>'VARCHAR','constraint'=>300,'collation'=>'utf8mb3_unicode_ci','null'=>true,'comment'=>'nomor nd'],
            'tgl_dasar_mutasi'        => ['type'=>'DATE','null'=>true],
            'tgl_disposisi'           => ['type'=>'DATE','null'=>true],
            'status_evaluasi'         => [
                'type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true,
                'comment'=>'1 = evaluasi pic 2 = eval msb 3 = eval vp 4 = proses jvb & konfirmasi 5 = Proses jvb 6 = sign ba mutasi 7 = selesai 8 = menunggu balasan 9 = cetak sk 10 = request kode posisi'
            ],
            'realisasi_ftk_unit_asal' => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'real_ftk_nasional'       => ['type'=>'INT','null'=>true],
            'realisasi_ftk_unit_tujuan'=>['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'notif_peggop'            => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'notif_ftk'               => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_ftk'                => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'kategori_ftk_asal'       => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'kategori_ftk_tujuan'     => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_pepgop'             => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'notif_masa_kerja'        => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_masa_kerja'         => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'notif_masa_jab_trakhir'  => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_masa_jab_trakhir'   => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'notif_profesi'           => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_profesi'            => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_peta_risk'          => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_pap'                => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'nama_pap'                => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'unit_pap'                => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'unit_pelaksana_pap'      => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'sub_unit_pap'            => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'ket_pap'                 => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'notif_sp'                => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_sp'                 => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'unit_sp'                 => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'jab_sp'                  => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'org_sp'                  => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'notif_rekan'             => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_rekan'              => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_rekan_tujuan'       => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'notif_sppd'              => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'text_sppd'               => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'telusur_1'               => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'telusur_2'               => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'telusur_3'               => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'catatan_1'               => ['type'=>'VARCHAR','constraint'=>500,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'catatan_2'               => ['type'=>'VARCHAR','constraint'=>500,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'catatan_3'               => ['type'=>'VARCHAR','constraint'=>500,'collation'=>'utf8mb3_unicode_ci','null'=>true],

            'hasil_evaluasi_1'        => ['type'=>"ENUM('0','1')",'collation'=>'utf8mb3_unicode_ci','null'=>false,'comment'=>'evaluasi oleh pengentry 0 = tdk dpt lanjut 1 = dpt lanjut'],
            'submit1_oleh'            => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'tgl_submit_eval_1'       => ['type'=>'DATE','null'=>true],

            'hasil_evaluasi_2'        => ['type'=>"ENUM('0','1')",'collation'=>'utf8mb3_unicode_ci','null'=>true,'comment'=>'evaluasi oleh msb'],
            'submit2_oleh'            => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'tgl_submit_eval_2'       => ['type'=>'DATE','null'=>true],

            'hasil_evaluasi_3'        => ['type'=>"ENUM('0','1')",'collation'=>'utf8mb3_unicode_ci','null'=>true,'comment'=>'evaluasi oleh VP'],
            'submit3_oleh'            => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'tgl_submit_eval_3'       => ['type'=>'DATE','null'=>true],

            'hasil_evaluasi_akhir'    => ['type'=>"ENUM('0','1')",'collation'=>'utf8mb3_unicode_ci','null'=>false,'comment'=>'field unt menampung hasil evaluasi yg terakhir. misal terakhir di msb, berarti isinya adalah evaluasi msb'],
            'hasil_konfirmasi'        => ['type'=>'VARCHAR','constraint'=>200,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'id_nd_jwb'               => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'nd_jwbn_1_to_requestur'  => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'tgl_nd_jwbn_1_to_requestur'=>['type'=>'DATE','null'=>true],
            'nd_kfrm_to_for_collab'   => ['type'=>'VARCHAR','constraint'=>100,'collation'=>'utf8mb3_unicode_ci','null'=>true],
            'tgl_nd_kfrm_to_for_collab' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'id_nd_balasan' => [
                'type' => 'INT',
                'null' => true,
            ],
            'id_blsn_kfrm_from_for_coll' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tgl_nd_blsn_kfrm_from_for_c' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'nd_bls_if_not_go' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tgl_nd_bls_if_not_go' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'pemeriksa_1' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'comment'    => 'nip pemeriksa 1',
            ],
            'pemeriksa_2' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'comment'    => 'nip pemeriksa 2',
            ],
            'posisi_data_kotak_masuk' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'comment'    => 'posisi data di kotak masuk berdasarkan NIP',
            ],
            'cv_peg_eval' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tgl_upload_cv' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'jarak_antar_unit' => [
                'type' => 'INT',
                'null' => true,
            ],
            'id_sk_mutasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'real_spdm' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'pagu_spdm' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'persenspdm' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'ftkpuspasal' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'ftkpupsup' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            // Lanjutan semua kolom berdasarkan screenshot (pog_saat_ini, jabatan_saat_ini, jabatan_lengkap, proyeksi_jabatan_baru, status_hukdis, jenis_mutasi ENUM, alasan_mutasi, status_evaluasi ENUM, realisasi, notif, text, kategori, telusur, catatan, hasil_evaluasi ENUM, submit_oleh, tgl_submit, nd_jwb, pemeriksa, posisi_kotak_masuk, cv, jarak_antar_unit, pagu, persen, fk, updated_at, created_at, deleted_at, dll)
            // Untuk setiap kolom gunakan definisi sesuai: VARCHAR dengan collation utf8mb3_unicode_ci, INT untuk angka, DATE/DATETIME untuk tanggal, ENUM untuk status.

            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'deleted_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id_eval', true);
        $this->forge->createTable('tb_eval_mutasi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_eval_mutasi');
    }
}
