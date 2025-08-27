<?php

namespace App\Models;
use CodeIgniter\Model;

class IdtModel extends Model
{
    protected $table = 'tb_idt';
    protected $primaryKey = 'id_data';
	protected $returnType = 'object';
    protected $allowedFields = [
        'nip',
        'unit_asal_1',
        'unit_asal_2',
        'unit_asal_3',
		'tgl_mulai',
		'tgl_berakhir',
        'unit_tujuan_1',
        'unit_tujuan_2',
        'unit_tujuan_3',
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