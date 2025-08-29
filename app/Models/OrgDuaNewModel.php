<?php

namespace App\Models;
use CodeIgniter\Model;

class OrgDuaNewModel extends Model
{
    protected $table = 'tb_org_dua_new';
    protected $primaryKey = 'id_org_dua';
	protected $returnType = 'object';
    protected $allowedFields = [
        'kode_org_dua',
        'nama_org_dua',
        'singkatan',
		'parent_org_dua',
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