<?php

namespace App\Models;

use CodeIgniter\Model;

class Bamutasi extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_ba_mutasi';
    protected $primaryKey       = 'id_ba';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'id_ba',
        'ba_oleh',
        'nomor_ba',
        'judul_ba',
        'tgl_ba',
        'jml_peg_ba',
        'left_sign_ba',
        'right_sign_ba',
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
        $builder    = $this->db->table('tb_ba_mutasi');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getDetail($id =  null)
    {
        $builder    = $this->db->table('tb_ba_mutasi');
        $builder->where('id_ba', $id);
        $query      = $builder->get();
        return $query->getRow();
    }

    // kotak masuk
    public function getAllPaginated($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $builder    = $this->builder();
        $builder->where('ba_oleh', $useraktif);
        $builder->orderBy('id_ba', 'DESC');

        if ($keyword != '') {
            $builder->like('nomor_ba', $keyword);
            $builder->like('judul_ba', $keyword);
            $builder->orLike('tgl_ba', $keyword);
            $builder->orLike('jml_peg_ba', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
