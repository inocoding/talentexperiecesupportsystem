<?php

namespace App\Models;

use CodeIgniter\Model;

class OrghtdModel extends Model
{

    protected $table            = 'tb_org_htd_new';
    protected $primaryKey       = 'id_org_htd';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'kode_org_htd',
        'nama_org_htd',
    ];

    // Dates
    protected $useTimestamps = true;

    public function getAllPaginated($num, $keyword = null)
    {
        $q = $this->select('*')
                  ->orderBy('kode_org_htd', 'ASC');

        if (!empty($keyword)) {
                $q->groupStart()
                  ->like('nama_org_htd', $keyword)
                  ->groupEnd();
        }

        return [
            'rows'  => $q->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
