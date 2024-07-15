<?php

namespace App\Models;

use CodeIgniter\Model;

class Lampiraneval extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_lamp_eval';
    protected $primaryKey       = 'id_lamp';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'id_lamp',
        'nomor_lampeval',
        'tgl_lampeval',
        'jml_peg_lampeval',
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
        $builder    = $this->db->table('tb_lamp_eval');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getDetail($id =  null)
    {
        $builder    = $this->db->table('tb_lamp_eval');
        $builder->where('id_lamp', $id);
        $query      = $builder->get();
        return $query->getRow();
    }

    // kotak masuk
    public function getAllPaginated($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $builder    = $this->builder();
        $builder->where('lamp_oleh', $useraktif);
        $builder->orderBy('id_lamp', 'DESC');

        if ($keyword != '') {
            $builder->like('nomor_lampeval', $keyword);
            $builder->orLike('tgl_lampeval', $keyword);
            $builder->orLike('jml_peg_lampeval', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
