<?php

namespace App\Models;

use CodeIgniter\Model;

class OrgsatuModel extends Model
{
    protected $table            = 'tb_org_satu';
    protected $primaryKey       = 'id_org_satu';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'kode_org_satu',
        'nama_org_satu',
        'parent_org_satu',
    ];

    // Dates
    protected $useTimestamps = true;
}
