<?php

namespace App\Models;

use CodeIgniter\Model;

class MppModel extends Model
{
    protected $table            = 'tb_mpp';
    protected $primaryKey       = 'id_mpp';
    protected $allowedFields    = [
        'id_mpp',
        'nip',
        'unit_asal_lv1',
        'unit_asal_lv2',
        'unit_asal_lv3',
        'tgl_aktivasi',
        
    ];

}
