<?php

namespace App\Models;
use CodeIgniter\Model;

class TugaskaryaModel extends Model
{
    protected $table = 'tb_tugas_karya';
    protected $primaryKey = 'id_data';
    protected $returnType = 'object';
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
        'tgl_berakhir',
        
            ];
               public function getAllPaginated($num, $keyword = null)
    {
        $q = $this;
        if (!empty($keyword)) {
            $q = $q->groupStart()
                    ->like('nip', $keyword)
                    ->groupEnd();
        }

        return [
            'user'  => $q->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
