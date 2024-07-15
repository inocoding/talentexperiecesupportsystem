<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'nip';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'nip',
        'no_sap',
        'password',
        'nama_user',
        'foto_profile',
        'tgl_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'agama',
        'status_perkawinan',
        'grade',
        'tgl_grade_terakhir',
        'email_korpo',
        'email_non',
        'no_hp',
        'no_ktp',
        'npwp',
        'alamat',
        'kota_alamat',
        'tgl_masuk',
        'tgl_capeg',
        'tgl_peg_tetap',
        'sebutan_jabatan',
        'jenjab',
        'pog',
        'kode_org_unit',
        'nama_org_unit',
        'start_date_jabatan',
        'profesi_jabatan',
        'htd_area',
        'unit_induk',
        'unit_pelaksana',
        'sub_unit_pelaksana',
        'role_peg',
        'role_htd',
        'role_admin',
        'role_komite',
        'role_adm_acc',
        'role_adm_eclinic',
        'role_adm_hi',
        'role_adm_org',
        'role_adm_kinerja',
        'role_adm_diklat',
        'role_adm_sertifikasi',
        'ket_aktif',
        'tx_esgrp',
        'tx_jnsjab',
        'tx_grpjab',
        'kd_posisi',
        'jbtn',
        'tglm_posisi',
        'jn_pddkakh',
        'tx_nikah',
        'kd_posatsn',
        'tx_posatsn',
        'tx_org_01',
        'tx_org_02',
        'tx_org_03',
        'tx_org_04',
        'tx_org_05',
        'tx_org_06',
        'tx_org_07',
        'tx_org_08',
        'tx_org_09',
        'jabatan_lengkap',
        'hukdis',
        'tgl_selesai_hukdis',
        'pap',
        'regional',
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    // Dates
    protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function getAll()
    {
        $builder    = $this->db->table('user');
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getDetail($id =  null)
    {
        $builder    = $this->db->table('user');
        $builder->where('nip', $id);
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        $query      = $builder->get();
        return $query->getRow();
    }

    public function getAllPaginated($num, $keyword = null)
    {
        $role_htd = "4";
        $role_peg = "1";
        $unit_induk = userLogin()->unit_induk;

        $builder    = $this->builder();
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->where('role_peg', $role_peg);
        // $builder->where('unit_induk', $unit_induk);
        $builder->where('role_htd', $role_htd);
        if ($keyword != '') {
            $builder->where('role_htd', $role_htd);
            $builder->like('nip', $keyword);
            $builder->orLike('nama_user', $keyword);
            $builder->orLike('nama_org_htd', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('email_korpo', $keyword);
            $builder->orLike('email_non', $keyword);
            $builder->orLike('ket_aktif', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function getAllPaginatedHtd($num, $keyword = null)
    {
        $role_htd = "4";
        $role_peg = "1";
        // $htd_area = userLogin()->htd_area;

        $builder    = $this->builder();
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->where('role_peg', $role_peg);
        // $builder->where('htd_area', $htd_area);
        $builder->where('role_htd <', $role_htd);
        if ($keyword != '') {
            $builder->where('role_htd <', $role_htd);
            $builder->like('nip', $keyword);
            $builder->orLike('nama_user', $keyword);
            $builder->orLike('nama_org_htd', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('email_korpo', $keyword);
            $builder->orLike('email_non', $keyword);
            $builder->orLike('ket_aktif', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
