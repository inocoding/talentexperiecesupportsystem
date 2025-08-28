<?php

namespace App\Models;
use CodeIgniter\Model;

class MutasiModel extends Model
{
    protected $table = 'tb_mutasi';
    protected $primaryKey = 'id_data';
    protected $allowedFields = [
        'nip',
        'unit_tujuan_1',
        'unit_tujuan_2',
        'unit_tujuan_3',
        'unit_tujuan_4',
        'unit_asal_1',
        'unit_asal_2',
        'unit_asal_3',
        'unit_asal_4',
        'tgl_aktivasi',
        'jenis_mutasi',
        'status',
            ];
}
