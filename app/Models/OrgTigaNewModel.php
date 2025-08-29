<?php

namespace App\Models;
use CodeIgniter\Model;

class OrgTigaNewModel extends Model
{
    protected $table = 'tb_org_tiga_new';
    protected $primaryKey = 'id_org_tiga';
	protected $returnType = 'object';
    protected $allowedFields = [
        'kode_org_tiga',
        'nama_org_tiga',
        'singkatan',
		'parent_org_tiga',
        ];
	

    //pagination
	public function getAllPaginated($num, $keyword = null)
    {
        $builder = $this->builder();
        $builder->join('user','user.nip=tb_idt.nip');
    
        
		$q = $this;
        if (!empty($keyword)) {
            $q = $q->groupStart()
                    ->like('tb_idt.nip', $keyword)
                    ->groupEnd();
        }
        return [
            'user'  => $q->paginate($num),
            'pager' => $this->pager,
    ];

    }
		
}