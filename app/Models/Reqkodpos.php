<?php

namespace App\Models;

use CodeIgniter\Model;

class Reqkodpos extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_reqkodpos';
    protected $primaryKey       = 'id_req';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'id_req',
        'req_oleh',
        'nomor_req',
        'judul_req',
        'tgl_req',
        'jml_peg_req',
        'left_sign_req',
        'right_sign_req',
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
        $builder    = $this->db->table('tb_reqkodpos');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getDetail($id =  null)
    {
        $builder    = $this->db->table('tb_reqkodpos');
        $builder->where('id_ba', $id);
        $query      = $builder->get();
        return $query->getRow();
    }

    // kotak masuk
    public function getAllPaginated($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $builder    = $this->builder();
        $builder->where('req_oleh', $useraktif);
        $builder->orderBy('id_req', 'DESC');

        if ($keyword != '') {
            $builder->like('nomor_req', $keyword);
            $builder->like('judul_req', $keyword);
            $builder->orLike('tgl_req', $keyword);
            $builder->orLike('jml_peg_req', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
