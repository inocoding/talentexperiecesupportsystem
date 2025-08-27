<?php

namespace App\Models;

use CodeIgniter\Model;

class PensiunDini extends Model
{
    protected $table = 'tb_pensiun_dini';
    protected $primaryKey = 'id_pensiun_dini';
    protected $allowedFields = [
        'nip',
        'unit_asal_lv1',
        'unit_asal_lv2',
        'unit_asal_lv3',
        'unit_asal_lv4',
        'tgl_pengajuan',
        'tgl_aktivasi',
        'status'
    ];
}
