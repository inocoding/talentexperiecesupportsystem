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
        'singkatan_dua',
		'parent_org_dua',
        ];
	

    //pagination

    public function getAllPaginated($num, $keyword = null)
    {
        // Bangun query lewat proxy Model, bukan $this->db->table()
        $q = $this->select(
                'm.*, ' .
                'ANY_VALUE(u.nama_org_satu) AS nama_org_satu, ' .
                'ANY_VALUE(u.singkatan_satu)     AS singkatan_satu',  // ambil kolom singkatan dari u
                false // jangan di-escape agar ANY_VALUE() tidak dipetik
            )
            ->from($this->table . ' m')
            ->join('tb_org_satu_new u', 'u.kode_org_satu = m.parent_org_dua', 'left')
            ->groupBy('m.id_org_dua')
            ->orderBy('m.parent_org_dua', 'ASC');

        if (!empty($keyword)) {
            $q->groupStart()
                ->like('m.nama_org_dua', $keyword)
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