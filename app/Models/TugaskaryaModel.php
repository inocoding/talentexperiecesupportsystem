<?php

namespace App\Models;
use CodeIgniter\Model;

class TugaskaryaModel extends Model
{
    protected $table = 'tb_tugas_karya';
    protected $primaryKey = 'id_tk';
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
     public function getAllPaginated(int $perPage = 10, ?string $keyword = null):array
    {
        // aliaskan tabel agar aman dari nama kolom ganda
       $this->distinct()
            ->select('r.*, u.nama_user')
            ->from($this->table . ' r')
            ->join('user u', 'u.nip = r.nip', 'left')
            ->orderBy('r.id_tk', 'DESC');

        if (!empty($keyword)) {
            $this->groupStart()
                 ->like('r.nip', $keyword)
                 ->orLike('u.nama_user', $keyword)
                 ->groupEnd();
        }

        return [
            'user'  => $this->paginate($perPage, 'default'),
            'pager' => $this->pager,
        ];
    }

    public function findWithUser($idData)
    {
        return $this->select('r.*, u.nama_user')
                    ->from($this->table . ' r')
                    ->join('user u', 'u.nip = r.nip', 'left')
                    ->where('r.id_data', $idData)
                    ->first();
    }
}
