<?php

namespace App\Models;
use CodeIgniter\Model;

class ApsModel extends Model
{
    protected $table = 'tb_aps';
    protected $primaryKey = 'id_data';
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
}
