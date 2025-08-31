<?php

namespace App\Models;
use CodeIgniter\Model;

class OrgKpDuaModel extends Model
{
    protected $table = 'tb_org_kp_dua';
    protected $primaryKey = 'id_org_kp_dua';
	protected $returnType = 'object';
    protected $allowedFields = [
        'kode_org_kp_dua',
        'nama_org_kp_dua',
        'singkatan_kp_dua',
		'parent_org_kp_satu',
        ];
	

    //pagination
	public function getAllPaginated($num, $keyword = null)
    {
        $fields = [
            'm.*',
            'ANY_VALUE(u.nama_org_kp_satu)  AS nama_org_kp_satu',
            'ANY_VALUE(u.singkatan_kp_satu) AS singkatan_kp_satu',
        ];
        // Bangun query lewat proxy Model, bukan $this->db->table()
        $q = $this->select($fields, false)
            ->from($this->table . ' m')
            ->join('tb_org_kp_satu u', 'u.kode_org_kp_satu = m.parent_org_kp_satu', 'left')
            ->groupBy('m.id_org_kp_dua')
            ->orderBy('m.parent_org_kp_satu', 'ASC');

        if (!empty($keyword)) {
            $q->groupStart()
                ->like('m.nama_org_kp_satu', $keyword)
                ->orLike('u.nama_org_kp_satu', $keyword)
                ->orLike('u.singkatan_kp_satu', $keyword)
            ->groupEnd();
        }

        return [
            'rows'  => $q->paginate($num),  // sekarang $q masih merupakan Model proxy -> OK
            'pager' => $this->pager,
        ];
    }
		
}