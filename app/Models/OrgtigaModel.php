<?php

namespace App\Models;

use CodeIgniter\Model;

class OrgtigaModel extends Model
{
    protected $table            = 'tb_org_tiga';
    protected $primaryKey       = 'id_org_tiga';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'kode_org_tiga',
        'nama_org_tiga',
        'parent_org_tiga',
    ];

    // Dates
    protected $useTimestamps = true;
}
