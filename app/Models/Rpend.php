<?php

namespace App\Models;

use CodeIgniter\Model;

class Rpend extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_riwayat_pendidikan';
    protected $primaryKey       = 'id_riwayat_pendidikan';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_nip',
        'tingkat',
        'jurusan',
        'kode_profesi_jurusan',
        'nama_institusi',
        'kode_keterangan_pendidikan',
        'negara_institusi',
        'start_date',
        'end_date',
        'duration',
    ];

    // Dates
    protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function get($id =  null)
    {
        $builder    = $this->db->table('tb_riwayat_pendidikan');
        $builder->where('kode_nip', $id);
        $builder->orderBy('end_date', 'DESC');
        $query      = $builder->get();
        return $query->getResult();
    }
}
