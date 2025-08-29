<?php

namespace App\Models;

use CodeIgniter\Model;

class DapegModel extends Model
{
    protected $table            = 'tb_dapeg';
    protected $primaryKey       = 'id_peg';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;

    // Tidak perlu memasukkan primary key AUTO_INCREMENT ke allowedFields
    protected $allowedFields    = [
        'fullname', 'nip',
        'org_satu', 'org_dua', 'org_tiga',
        'org_kp_satu', 'org_kp_dua', 'org_kp_tiga',
        'eegrp', 'esgrp',
        'peg', 'jenjang_main_grp_id', 'pog',
        'grup_sppd', 'kode_posisi',
        'start_date', 'end_date',
        'nama_panjang_posisi',
        'pendidikan_terakhir', 'jurusan_pendidikan',
        'birthplace', 'birth_date',
        'tgl_grade_terakhir', 'tgl_masuk', 'tgl_pegawai_tetap',
        'gender', 'marst', 'religius',
        'org_unit', 'org_unit_tx', 'kode_posisi_atasan', 'job_code',
        'no_sk_org_assg', 'tgl_sk_org_assg', 'home_city',
        'tx_org_01','tx_org_02','tx_org_03','tx_org_04','tx_org_05','tx_org_06',
        'tx_org_07','tx_org_08','tx_org_09','tx_org_10','tx_org_11','tx_org_12','tx_org_13',
        'kd_org_01','kd_org_02','kd_org_03','kd_org_04','kd_org_05','kd_org_06',
        'kd_org_07','kd_org_08','kd_org_09','kd_org_10','kd_org_11','kd_org_12','kd_org_13',
        'profesi',
        'tgl_data',
    ];

    // Tidak memakai created_at / updated_at / deleted_at
    protected $useTimestamps = false;

    /* =========================
     *  Helper query opsional
     * ========================= */

    /**
     * Ambil data dengan pencarian & paginate sederhana.
     * $keyword akan mencocokkan fullname, kode_posisi, atau org_unit_tx.
     */
    public function getPaginated(int $perPage = 20, ?string $keyword = null)
    {
        $builder = $this->orderBy('id_peg', 'DESC');

        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                ->like('fullname', $keyword)
                ->orLike('kode_posisi', $keyword)
                ->orLike('org_unit_tx', $keyword)
                ->groupEnd();
        }

        return [
            'rows'  => $builder->paginate($perPage),
            'pager' => $this->pager,
        ];
    }
}
