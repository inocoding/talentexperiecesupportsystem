<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
   
    protected $table            = 'user';
    protected $primaryKey       = 'nip';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'nip',
        'no_sap',
        'password',
        'nama_user',
        'foto_profile',
        'tgl_lahir',
        'htd_area',
        'unit_induk',
        'unit_pelaksana',
        'sub_unit_pelaksana',
        'role_organisasi',
        'role_htd',
        'role_user',
        'role_mutasi',
        'role_komite',
        'role_dapeg',
        'role_tugas_karya',
        'role_ptb',
        'role_pensiun_dini',
        'role_resign',
        'role_mpp',
        'role_ojt',
        'role_idt',
        'role_aps',
        'role_fnp_admin',
        'role_admin_komite',
        'role_fnp_penguji',
        'ket_aktif',
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $useTimestamps = true;

    public function getAllPaginatedHtd($num, $keyword = null)
    {
        $fields = [
            'm.*',
            'ANY_VALUE(dp.nip)  AS nip_dp',
            'ANY_VALUE(dp.peg) AS peg',
            'ANY_VALUE(dp.fullname) AS fullname',
            'ANY_VALUE(htd.nama_org_htd) AS nama_htd',
        ];

        $q = $this->select($fields, false)
                  ->from($this->table.' m')
                  ->join('tb_dapeg dp', 'dp.nip = m.nip', 'left')
                  ->join('tb_org_htd_new htd', 'htd.kode_org_htd = m.htd_area', 'left')
                  ->groupBy('m.nip')
                  ->orderBy('m.nip', 'ASC');

        if (!empty($keyword)) {
                $q->groupStart()
                  ->like('nip', $keyword)
                  ->orLike('fullname', $keyword)
                  ->groupEnd();
        }

        return [
            'user'  => $q->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
