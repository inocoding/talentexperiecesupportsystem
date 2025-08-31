<?php

namespace App\Models;
use CodeIgniter\Model;

class OrgKpSatuModel extends Model
{
    protected $table = 'tb_org_kp_satu';
    protected $primaryKey = 'id_org_kp_satu';
	protected $returnType = 'object';
    protected $allowedFields = [
        'kode_org_kp_satu',
        'nama_org_kp_satu',
        'singkatan_kp_satu',
		'parent_org_satu',
        ];
	

    //pagination
	public function getAllPaginated($num, $keyword = null)
    {
        $fields = [
            'm.*',
            'ANY_VALUE(u.nama_org_satu)  AS nama_org_satu',
            'ANY_VALUE(u.singkatan_satu) AS singkatan_satu',
        ];
        // Bangun query lewat proxy Model, bukan $this->db->table()
        $q = $this->select($fields, false)
            ->from($this->table . ' m')
            ->join('tb_org_satu_new u', 'u.kode_org_satu = m.parent_org_satu', 'left')
            ->groupBy('m.id_org_kp_satu')
            ->orderBy('m.nama_org_kp_satu', 'ASC');

        if (!empty($keyword)) {
            $q->groupStart()
                ->like('m.nama_org_kp_satu', $keyword)
                ->orLike('u.nama_org_satu', $keyword)
                ->orLike('u.singkatan_satu', $keyword)
            ->groupEnd();
        }

        return [
            'rows'  => $q->paginate($num),  // sekarang $q masih merupakan Model proxy -> OK
            'pager' => $this->pager,
        ];
    }
		
}