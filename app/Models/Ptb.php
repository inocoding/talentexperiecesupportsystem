<?php

namespace App\Models;
use CodeIgniter\Model;

class Ptb extends Model
{
    protected $table = 'tb_ptb';
    protected $primaryKey = 'id_ptb';
    protected $returnType = 'object';
    protected $allowedFields = [
       
'nip', 
'nama', 
'sebutan_jabatan', 
'unit_asal_lv1', 
'unit_asal_lv2', 
'unit_asal_lv3', 
'angkatan', 
'jenjang_ptb', 
'program_pendidikan_formal', 
'bidang', 
'sub_bidang', 
'on_mission', 
'program_studi', 
'universitas', 
'tgl_mulai_studi', 
'tgl_selesai_studi', 
'status', 
'penempatan_pasca_studi', 
'unit_penempatan_lv1', 
'unit_penempatan_lv2', 
'unit_penempatan_lv3', 
'tanggal_aktivasi'
            ];
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
       // $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('user', 'user.nip = tb_ptb.nip');
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

