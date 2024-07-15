<?php

namespace App\Models;

use CodeIgniter\Model;

class Dasarmutasi extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_dasar_mutasi';
    protected $primaryKey       = 'id_dm';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'id_dm',
        'jenis_dm',
        'no_dm',
        'perihal_dm',
        'tgl_dm',
        'tgl_dispo_dm',
        'asal_dm',
        'tujuan_dm',
        'catatan_dm',
        'lampiran_dm',
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
        $builder    = $this->db->table('tb_dasar_mutasi');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getDetail($id =  null)
    {
        $builder    = $this->db->table('tb_dasar_mutasi');
        $builder->where('id_dm', $id);
        $query      = $builder->get();
        return $query->getRow();
    }

    public function getAllPaginated($num, $keyword = null)
    {
        $builder    = $this->builder();
        $builder->orderBy('id_dm', 'DESC');
        if ($keyword != '') {
            $builder->like('no_dm', $keyword);
            $builder->orLike('perihal_dm', $keyword);
            $builder->orLike('tgl_dm', $keyword);
            $builder->orLike('tgl_dispo_dm', $keyword);
            $builder->orLike('asal_dm', $keyword);
            $builder->orLike('tujuan_dm', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    // public function getAllPaginatedHtd($num, $keyword = null)
    // {
    //     $role_htd = "4";
    //     $role_peg = "1";
    //     // $htd_area = userLogin()->htd_area;

    //     $builder    = $this->builder();
    //     $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
    //     $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
    //     $builder->where('role_peg', $role_peg);
    //     // $builder->where('htd_area', $htd_area);
    //     $builder->where('role_htd <', $role_htd);
    //     if ($keyword != '') {
    //         $builder->where('role_htd <', $role_htd);
    //         $builder->like('nip', $keyword);
    //         $builder->orLike('nama_user', $keyword);
    //         $builder->orLike('nama_org_htd', $keyword);
    //         $builder->orLike('nama_org_satu', $keyword);
    //         $builder->orLike('email_korpo', $keyword);
    //         $builder->orLike('email_non', $keyword);
    //         $builder->orLike('ket_aktif', $keyword);
    //     }
    //     return [
    //         'user' => $this->paginate($num),
    //         'pager' => $this->pager,
    //     ];
    // }
}
