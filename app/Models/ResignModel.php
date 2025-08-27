<?php

namespace App\Models;
use CodeIgniter\Model;

class ResignModel extends Model
{
    protected $table = 'tb_resign2'; // tabel resign
    protected $primaryKey = 'id_data';
    protected $returnType = 'object'; // supaya bisa view $value->nip
    protected $allowedFields = [
        'nip',
        'unit_asal_1',
        'unit_asal_2',
        'unit_asal_3',
        'tgl_pengajuan',
        'tgl_aktivasi',
        'status',
            ];

    public function getAllPaginated(int $perPage = 10, ?string $keyword = null):array
    {
        // aliaskan tabel agar aman dari nama kolom ganda
       $this->distinct()
            ->select('r.*, u.nama_user')
            ->from($this->table . ' r')
            ->join('user u', 'u.nip = r.nip', 'left')
            ->orderBy('r.id_data', 'DESC');

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