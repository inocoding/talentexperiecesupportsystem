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
        $q = $this->select('*')
                  ->orderBy('parent_htd', 'ASC');

        if (!empty($keyword)) {
                $q->groupStart()
                  ->like('nama_org_satu', $keyword)
                  ->orLike('nama_parent_org_satu', $keyword)
                  ->groupEnd();
        }

        return [
            'rows'  => $q->paginate($num),
            'pager' => $this->pager,
        ];
    }
		
}