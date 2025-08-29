<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturOrganisasi extends Model
{
    protected $table = 'tb_struktur_org';
    protected $primaryKey = 'id_struktur_org';
    protected $returnType       = 'object';
    protected $allowedFields = [
        'kode_posisi',
        'nama_fj',
        'jenjang',
        'org_unit',
        'company_code',
        'personel_area',
        'personel_sub_srea',
        'tx_org_satu',
        'tx_org_dua',
        'tx_org_tiga',
        'kode_org_satu',
        'kode_org_dua',
        'kode_org_tiga'
    ];

    //protected $useTimestamps = true;
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
        $builder    = $this->db->table('tb_struktur_org');
        //$builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        //$builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        //$builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        //$builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getDetail($id =  null)
    {
        $builder    = $this->db->table('tb_struktur_org');
        //$builder->where('nip', $id);
        //$builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        //$builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        //$builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        //$builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        $query      = $builder->get();
        return $query->getRow();
    }

    public function getAllPaginated($num, $keyword = null)
    {
        $q = $this;
        if (!empty($keyword)) {
            $q = $q->groupStart()
                ->like('kode_posisi', $keyword)
                ->orlike('nama_fj', $keyword)
                ->orlike('jenjang', $keyword)
                ->orlike('org_unit', $keyword)
                ->orlike('company_code', $keyword)
                ->orlike('personel_area', $keyword)
                ->orlike('personel_sub_srea', $keyword)
                ->orlike('tx_org_satu', $keyword)
                ->orlike('tx_org_dua', $keyword)
                ->orlike('tx_org_tiga', $keyword)
                ->orlike('kode_org_satu', $keyword)
                ->orlike('kode_org_dua', $keyword)
                ->orlike('kode_org_tiga', $keyword)
                ->groupEnd();
        }

        return [
            'user'  => $q->paginate($num),
            'pager' => $this->pager,
        ];
    }


    public function getAllPaginatedHtd($num, $keyword = null)
    {
        $role_htd = "4";
        $role_peg = "1";
        // $htd_area = userLogin()->htd_area;

        $builder    = $this->builder();
        // $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        //$builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->join('user', 'user.nip = tb_pensiun_dini.nip');
        //$builder->where('role_peg', $role_peg);
        // $builder->where('htd_area', $htd_area);
        //$builder->where('role_htd <', $role_htd);
        // if ($keyword != '') {
        //     //$builder->where('role_htd <', $role_htd);
        //     $builder->like('nip', $keyword);
        //     $builder->orLike('nama_user', $keyword);
        //     $builder->orLike('nama_org_htd', $keyword);
        //     $builder->orLike('nama_org_satu', $keyword);
        //     $builder->orLike('email_korpo', $keyword);
        //     $builder->orLike('email_non', $keyword);
        //     $builder->orLike('ket_aktif', $keyword);
        // }
        $q = $this;
        if (!empty($keyword)) {
            $q = $q->groupStart()
                ->like('nip', $keyword)
                ->orlike('unit_asal_lv1', $keyword)
                ->orlike('unit_asal_lv2', $keyword)
                ->orlike('unit_asal_lv3', $keyword)
                ->orlike('tgl_pengajuan', $keyword)
                ->orlike('tgl_aktivasi', $keyword)
                ->orlike('status', $keyword)
                ->groupEnd();
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
