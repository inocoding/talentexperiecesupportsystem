<?php

namespace App\Models;

use CodeIgniter\Model;

class MppModel extends Model
{
    protected $table            = 'tb_mpp';
    protected $primaryKey       = 'id_mpp';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'nip',
        'unit_asal_lv1',
        'unit_asal_lv2',
        'unit_asal_lv3',
        'tgl_aktivasi',

    ];

    protected $useTimestamps = false;

    public function getAllPaginated($num, $keyword = null)
    {
        $fields = [
            'm.*',
            'ANY_VALUE(dp.nip)  AS nip_dp',
            'ANY_VALUE(dp.peg) AS peg',
            'ANY_VALUE(dp.fullname) AS fullname',
        ];
        // Bangun query lewat proxy Model, bukan $this->db->table()
        $q = $this->select($fields, false)
            ->from($this->table . ' m')
            ->join('tb_dapeg dp', 'dp.nip = m.nip', 'left')
            ->groupBy('m.id_mpp')
            ->orderBy('m.id_mpp', 'ASC');

        if (!empty($keyword)) {
            $q->groupStart()
                ->like('m.nip', $keyword)
                ->orLike('dp.fullname', $keyword)
                ->orLike('dp.peg', $keyword)
            ->groupEnd();
        }

        return [
            'rows'  => $q->paginate($num),  // sekarang $q masih merupakan Model proxy -> OK
            'pager' => $this->pager,
        ];
        
    }
}
