<?php

namespace App\Models;

use CodeIgniter\Model;

class OrgduaModel extends Model
{
    protected $table            = 'tb_org_dua';
    protected $primaryKey       = 'id_org_dua';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'kode_org_dua',
        'nama_org_dua',
        'parent_org_dua',
    ];

    // Dates
    protected $useTimestamps = true;
}
