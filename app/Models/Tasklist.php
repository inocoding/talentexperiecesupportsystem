<?php

namespace App\Models;

use CodeIgniter\Model;

class Tasklist extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_list';
    protected $primaryKey       = 'id_list';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'list_nip',
        'deskripsi_list',
        'start_date_list',
        'end_date_list',
        'status_list',
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
        $status = "1";
        $builder    = $this->db->table('tb_list');
        $builder->where('list_nip', $id);
        $builder->where('status_list', $status);
        $builder->orderBy('start_date_list', 'ASC');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function get_finish($id =  null)
    {
        $status = "2";
        $builder    = $this->db->table('tb_list');
        $builder->where('list_nip', $id);
        $builder->where('status_list', $status);
        $builder->orderBy('start_date_list', 'ASC');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function addList($data)
    {
        $addList = $this->db->table($this->table)->insert($data);
        return $addList;
    }
}
