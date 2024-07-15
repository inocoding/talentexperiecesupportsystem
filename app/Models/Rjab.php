<?php

namespace App\Models;

use CodeIgniter\Model;

class Rjab extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_riwayat_jabatan';
    protected $primaryKey       = 'id_riwayat_jabatan';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_nip',
        'peg_riwayat',
        'nama_formasi_jabatan',
        'kode_riwayat_posisi',
        'nama_riwayat_profesi',
        'jenjang_jabatan',
        'pog_riwayat',
        'kode_riwayat_org_unit',
        'nama_riwayat_org_unit',
        'kode_riwayat_org_tiga',
        'kode_riwayat_org_dua',
        'kode_riwayat_org_satu',
        'kode_riwayat_org_htd',
        'kode_profesi_rjab',
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
        $builder    = $this->db->table('tb_riwayat_jabatan');
        $builder->where('kode_nip', $id);
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = tb_riwayat_jabatan.kode_riwayat_org_htd');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_riwayat_jabatan.kode_riwayat_org_satu');
        $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = tb_riwayat_jabatan.kode_riwayat_org_dua');
        $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = tb_riwayat_jabatan.kode_riwayat_org_tiga');
        $builder->orderBy('end_date', 'DESC');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getAllPaginated($num, $keyword = null)
    {
        $builder    = $this->builder();
        $builder->join('user', 'user.nip = tb_riwayat_jabatan.kode_nip');
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = tb_riwayat_jabatan.kode_riwayat_org_htd');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_riwayat_jabatan.kode_riwayat_org_satu');
        $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = tb_riwayat_jabatan.kode_riwayat_org_dua');
        $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = tb_riwayat_jabatan.kode_riwayat_org_tiga');
        if ($keyword != '') {
            $builder->like('kode_nip', $keyword);
            $builder->orLike('nama_user', $keyword);
            $builder->orLike('kode_formasi_jabatan', $keyword);
            $builder->orLike('nama_formasi_jabatan', $keyword);
            $builder->orLike('kode_riwayat_posisi', $keyword);
            $builder->orLike('nama_riwayat_profesi', $keyword);
            $builder->orLike('kode_profesi_rjab', $keyword);
            $builder->orLike('jenjang_jabatan', $keyword);
            $builder->orLike('kode_riwayat_org_unit', $keyword);
            $builder->orLike('nama_riwayat_org_unit', $keyword);
            $builder->orLike('nama_org_htd', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('nama_org_dua', $keyword);
            $builder->orLike('nama_org_tiga', $keyword);
        }
        return [
            'rjab' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
