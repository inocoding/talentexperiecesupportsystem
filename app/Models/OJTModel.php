<?php

namespace App\Models;
use CodeIgniter\Model;

class OJTModel extends Model
{
    protected $table = 'tb_ojt';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'no_test',
        'nama',
        'jenjang',
        'proyeksi_jabatan',
        'unit_proyeksi_lv1',
        'unit_proyeksi_lv2',
        'unit_proyeksi_lv3',
        'unit_proyeksi_lv4',
        'tgl_mulai_ojt',
        'tgl_selesai_ojt',
            ];

    public function getAllPaginated($num, $keyword = null)
    {
        $q = $this;
        if (!empty($keyword)) {
            $q = $q->groupStart()
                    ->like('no_test', $keyword)
                    ->orLike('nama', $keyword)
                    ->orLike('jenjang', $keyword)
                    ->orLike('proyeksi_jabatan', $keyword)
                    ->orLike('unit_proyeksi_lv1', $keyword)
                    ->orLike('unit_proyeksi_lv2', $keyword)
                    ->orLike('unit_proyeksi_lv3', $keyword)
                    ->orLike('unit_proyeksi_lv4', $keyword)
                    ->orLike('tgl_mulai_ojt', $keyword)
                    ->orLike('tgl_selesai_ojt', $keyword)
                    ->groupEnd();
        }

        return [
            'user'  => $q->paginate($num),
            'pager' => $this->pager,
        ];
    }
}

