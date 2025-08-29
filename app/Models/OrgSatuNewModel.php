<?php

namespace App\Models;
use CodeIgniter\Model;

class OrgSatuNewModel extends Model
{
    protected $table = 'tb_org_satu_new';
    protected $primaryKey = 'id_org_satu';
	protected $returnType = 'object';
    protected $allowedFields = [
        'kode_org_satu',
        'nama_org_satu',
        'singkatan',
        'parent_htd',
		'nama_parent_org_satu',
		'created_at',
        'updated_at',
        'deleted_at',
        ];
		
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