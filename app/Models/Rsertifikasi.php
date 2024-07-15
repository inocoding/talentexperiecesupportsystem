<?php

namespace App\Models;

use CodeIgniter\Model;

class Rsertifikasi extends Model
{
    protected $table            = 'tb_riwayat_sertifikasi';
    protected $primaryKey       = 'id_riwayat_sertifikasi';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'kode_nip',
        'kode_profesi_sertifikasi',
        'judul_sertifikasi',
        'level_kompetensi',
        'lsk',
        'no_sertifikat',
        'start_date',
        'end_date',
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

    public function get($id =  null)
    {
        $builder    = $this->db->table('tb_riwayat_sertifikasi');
        $builder->where('kode_nip', $id);
        $builder->join('user', 'user.nip = tb_riwayat_sertifikasi.kode_nip');
        $builder->orderBy('end_date', 'DESC');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getAll($id =  null)
    {
        $builder    = $this->db->table('tb_riwayat_sertifikasi');
        $builder->join('user', 'user.nip = tb_riwayat_sertifikasi.kode_nip');
        $builder->orderBy('end_date', 'DESC');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getAllPaginated($num, $keyword = null)
    {
        $builder    = $this->builder();
        $builder->join('user', 'user.nip = tb_riwayat_sertifikasi.kode_nip');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        if ($keyword != '') {
            $builder->like('kode_nip', $keyword);
            $builder->orLike('nama_user', $keyword);
            $builder->orLike('kode_profesi_sertifikasi', $keyword);
            $builder->orLike('judul_sertifikasi', $keyword);
            $builder->orLike('level_kompetensi', $keyword);
            $builder->orLike('lsk', $keyword);
            $builder->orLike('no_sertifikat', $keyword);
            $builder->orLike('start_date', $keyword);
            $builder->orLike('end_date', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
        }
        return [
            'rsert' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
