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
        'role_anggaran',
        'role_adm_anggaran',
        'ket_aktif',
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
    protected $deletedField   = 'deleted_at'; 

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
                  ->where('m.deleted_at', null)
                  ->join('tb_dapeg dp', 'dp.nip = m.nip', 'left')
                  ->join('tb_org_htd_new htd', 'htd.kode_org_htd = m.htd_area', 'left')
                  ->groupBy('m.nip')
                  ->orderBy('m.nip', 'ASC');

        if (!empty($keyword)) {
                $map = [
                    'staf'  => 0,
                    'asman' => 1,
                    'msb'   => 2,
                    'vp'    => 3,
                    'evp'   => 4,
                    'non'   => 5,
                    'non htd' => 5
                ];

                $k = strtolower($keyword);

                $q->groupStart()
                  ->like('m.nip', $keyword)
                  ->orLike('m.nama_user', $keyword)
                  ->orLike('htd.nama_org_htd', $keyword);
                  if (isset($map[$k])) {
                        $q->orWhere('m.role_htd', $map[$k]);
                    }
                  $q->groupEnd();
        }

        return [
            'user'  => $q->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
