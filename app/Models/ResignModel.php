<?php

namespace App\Models;
use CodeIgniter\Model;

class ResignModel extends Model
{
    protected $table = 'tb_resign2';
    protected $primaryKey = 'id_data';
    protected $allowedFields = [
        'nip',
        'unit_asal_1',
        'unit_asal_2',
        'unit_asal_3',
        'tgl_pengajuan',
        'tgl_aktivasi',
        'status',
        ];
}
