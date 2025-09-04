<?php

namespace App\Models;
use CodeIgniter\Model;

class ApsModel extends Model
{
    protected $table = 'tb_aps';
    protected $primaryKey = 'id_data';
    protected $returnType = 'object';
    protected $allowedFields = [
        'nip',
        'unit_asal_1',
        'unit_asal_2',
        'unit_asal_3',
        'unit_asal_4',
        'unit_tujuan_1',
        'unit_tujuan_2',
        'unit_tujuan_3',
        'unit_tujuan_4',
        'tgl_pengajuan',
        'tgl_aktivasi',
        'status',
        'alasan_aps',
            ];
    
    public function getAllPaginated($num, $keyword = null)
    {
        $fields = [
            'm.*',
            'ANY_VALUE(dp.nip)  AS nip_dp',
            'ANY_VALUE(dp.peg) AS peg',
            'ANY_VALUE(dp.fullname) AS fullname',
        ];

        $q = $this->select($fields, false)
                  ->from($this->table.' m')
                  ->join('tb_dapeg dp', 'dp.nip = m.nip', 'left')
                  ->groupBy('m.id_data')
                  ->orderBy('m.id_data', 'ASC');

        if (!empty($keyword)) {
                $q->groupStart()
                  ->like('nip', $keyword)
                  ->groupEnd();
        }

        return [
            'rows'  => $q->paginate($num),
            'pager' => $this->pager,
        ];
    }

    
}
