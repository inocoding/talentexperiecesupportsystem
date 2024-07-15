<?php

namespace App\Models;

use CodeIgniter\Model;

class OrghtdModel extends Model
{

    protected $table            = 'tb_org_htd';
    protected $primaryKey       = 'id_org_htd';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'kode_org_htd',
        'nama_org_htd',
    ];

    // Dates
    protected $useTimestamps = true;
}
