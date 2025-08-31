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
        'singkatan_tiga',
		'parent_org_tiga',
        ];
	

    //pagination
	public function getAllPaginated($num, $keyword = null)
    {
        // Bangun query lewat proxy Model, bukan $this->db->table()
        $q = $this->select(
                'm.*, ' .
                'ANY_VALUE(u.nama_org_dua) AS nama_org_dua, ' .
                'ANY_VALUE(u.singkatan_dua)     AS singkatan_dua,'.  // ambil kolom singkatan dari u
                'ANY_VALUE(s.nama_org_satu) AS nama_org_satu, ' .
                'ANY_VALUE(s.singkatan_satu)     AS singkatan_satu',  // ambil kolom singkatan dari s
                false // jangan di-escape agar ANY_VALUE() tidak dipetik
            )
            ->from($this->table . ' m')
            ->join('tb_org_dua_new u', 'u.kode_org_dua = m.parent_org_tiga', 'left')
            ->join('tb_org_satu_new s', 's.kode_org_satu = u.parent_org_dua', 'left')
            ->groupBy('m.id_org_tiga')
            ->orderBy('m.parent_org_tiga', 'ASC');

        if (!empty($keyword)) {
            $q->groupStart()
                ->like('m.nama_org_tiga', $keyword)
                ->orLike('u.nama_org_dua', $keyword)
                ->orLike('u.singkatan_dua', $keyword)
                ->orLike('s.singkatan_satu', $keyword)
            ->groupEnd();
        }

        return [
            'rows'  => $q->paginate($num),  // sekarang $q masih merupakan Model proxy -> OK
            'pager' => $this->pager,
        ];
    }
		
}