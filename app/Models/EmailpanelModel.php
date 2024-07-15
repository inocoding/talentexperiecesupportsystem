<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailpanelModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'emailpanel';
    protected $primaryKey       = 'id_mail';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'email',
        'user',
        'password',
        'domain',
        'id_user',
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
        $id_user = userLogin()->nip;

        $builder    = $this->db->table('emailpanel');
        $builder->where('id_user', $id_user);
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
        $builder    = $this->builder();
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        if ($keyword != '') {
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
