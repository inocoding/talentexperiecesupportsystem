<?php

namespace App\Models;

use CodeIgniter\Model;

class Evalmutasi extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_eval_mutasi';
    protected $primaryKey       = 'id_eval';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'id_eval',
        'pic_mutasi',
        'nip_eval',
        'nama_eval',
        'peg_eval',
        'pendidikan',
        'masa_kerja',
        'masa_jabatan_terakhir',
        'durasi_diunit_saat_ini',
        'jenjab_eval',
        'pog_saat_ini',
        'jabatan_saat_ini',
        'proyeksi_jabatan_baru',
        'pog_baru',
        'unit_tujuan',
        'unit_asal',
        'for_collab_htd_area',
        'jenis_mutasi',
        'alasan_mutasi',
        'status_pasangan',
        'status_hukdis',
        'status_pengurus_sp',
        'kota_lahir',
        'kota_rumah',
        'dasar_mutasi',
        'tgl_dasar_mutasi',
        'tgl_disposisi',
        'status_evaluasi',
        'realisasi_ftk_unit_asal',
        'realisasi_ftk_unit_tujuan',
        'catatan_1',
        'catatan_2',
        'catatan_3',
        'hasil_evaluasi_1',
        'tgl_submit_eval_1',
        'hasil_evaluasi_2',
        'tgl_submit_eval_2',
        'hasil_evaluasi_3',
        'tgl_submit_eval_3',
        'nd_jwbn_1_to_requestr',
        'tgl_nd_jwbn_1_to_requestr',
        'nd_kfrm_to_for_collab',
        'tgl_nd_kfrm_to_for_collab',
        'nd_blsn_kfrm_from_for_coll',
        'tgl_nd_blsn_kfrm_from_for_c',
        'nd_bls_if_not_go',
        'tgl_nd_bls_if_not_go',
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

    public function getAll()
    {
        $builder    = $this->db->table('tb_eval_mutasi');
        $query      = $builder->get();
        return $query->getResult();
    }

    public function getDetail($id =  null)
    {
        $builder    = $this->db->table('tb_eval_mutasi');
        $builder->where('id_eval', $id);
        $query      = $builder->get();
        return $query->getRow();
    }

    // kotak masuk
    public function getAllPaginated($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $builder    = $this->builder();
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
        $builder->where('dikonsep_oleh', NULL);
        $builder->where('posisi_data_kotak_masuk', $useraktif);
        if ($keyword != '') {
            $builder->like('nip_eval', $keyword);
            $builder->orLike('dasar_mutasi', $keyword);
            $builder->orLike('unit_pengaju', $keyword);
            $builder->orLike('jenis_mutasi', $keyword);
            $builder->orLike('nip_eval', $keyword);
            $builder->orLike('nama_eval', $keyword);
            $builder->orLike('unit_asal', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('nama_user', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function getAllPaginatedaps($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $builder    = $this->builder();
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
        $builder->join('user', 'user.nip = tb_eval_mutasi.dientry_oleh');
        $builder->where('dikonsep_oleh', NULL);
        $builder->where('posisi_data_kotak_masuk', $useraktif);
        $builder->where('jenis_mutasi', 2);
        if ($keyword != '') {
            $builder->like('nip_eval', $keyword);
            $builder->orLike('dasar_mutasi', $keyword);
            $builder->orLike('unit_pengaju', $keyword);
            $builder->orLike('jenis_mutasi', $keyword);
            $builder->orLike('nip_eval', $keyword);
            $builder->orLike('nama_eval', $keyword);
            $builder->orLike('unit_asal', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('nama_user', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function getAllPaginatednonaps($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $builder    = $this->builder();
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
        $builder->join('user', 'user.nip = tb_eval_mutasi.dientry_oleh');
        $builder->where('dikonsep_oleh', NULL);
        $builder->where('posisi_data_kotak_masuk', $useraktif);
        $builder->where('jenis_mutasi !=', 2);
        if ($keyword != '') {
            $builder->like('nip_eval', $keyword);
            $builder->orLike('dasar_mutasi', $keyword);
            $builder->orLike('unit_pengaju', $keyword);
            $builder->orLike('jenis_mutasi', $keyword);
            $builder->orLike('nip_eval', $keyword);
            $builder->orLike('nama_eval', $keyword);
            $builder->orLike('unit_asal', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('nama_user', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function getAllPaginatedlampeval($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $builder    = $this->builder();
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
        $builder->where('status_evaluasi', 7);
        if ($keyword != '') {
            $builder->like('nip_eval', $keyword);
            $builder->orLike('nama_eval', $keyword);
            $builder->orLike('unit_asal', $keyword);
            $builder->orLike('unit_tujuan', $keyword);
            $builder->orLike('status_evaluasi', $keyword);
            $builder->orLike('hasil_evaluasi_akhir', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function getAllPaginatedtelusuri($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $status = 7;
        $where = 'telusur_1 = "' . $useraktif . '" OR telusur_2 = "' . $useraktif . '" OR telusur_3 = "' . $useraktif . '"';
        $array = [
            'posisi_data_kotak_masuk !=' => $useraktif,
            'status_evaluasi !=' => $status,

        ];
        $builder    = $this->builder();
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
        $builder->join('user', 'user.nip = tb_eval_mutasi.posisi_data_kotak_masuk');
        $builder->where($where);
        $builder->where($array);
        $builder->where('dikonsep_oleh', NULL);

        if ($keyword != '') {
            $builder->like('nip_eval', $keyword);
            $builder->orLike('nama_eval', $keyword);
            $builder->orLike('unit_asal', $keyword);
            $builder->orLike('unit_tujuan', $keyword);
            $builder->orLike('status_evaluasi', $keyword);
            $builder->orLike('hasil_evaluasi_akhir', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function getAllPaginatedkonsep($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $null = null;
        $builder    = $this->builder();
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
        $builder->where('dikonsep_oleh', $useraktif);
        if ($keyword != '') {
            $builder->like('nip_eval', $keyword);
            $builder->orLike('nama_eval', $keyword);
            $builder->orLike('unit_asal', $keyword);
            $builder->orLike('unit_tujuan', $keyword);
            $builder->orLike('status_evaluasi', $keyword);
            $builder->orLike('hasil_evaluasi_akhir', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function getAllPaginatedselesai($num, $keyword = null)
    {
        $useraktif = userLogin()->nip;
        $status = 7; // selesai
        $where = 'pemeriksa_1 = "' . $useraktif . '" OR pemeriksa_2 = "' . $useraktif . '" OR dientry_oleh = "' . $useraktif . '"';
        $builder    = $this->builder();
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
        $builder->where($where);
        $builder->where('status_evaluasi', $status);
        if ($keyword != '') {
            $builder->like('nip_eval', $keyword);
            $builder->orLike('nama_eval', $keyword);
            $builder->orLike('unit_asal', $keyword);
            $builder->orLike('unit_tujuan', $keyword);
            $builder->orLike('status_evaluasi', $keyword);
            $builder->orLike('hasil_evaluasi_akhir', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function getAllPaginatedHtd($num, $keyword = null)
    {
        $role_htd = "4";
        $role_peg = "1";
        // $htd_area = userLogin()->htd_area;

        $builder    = $this->builder();
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->where('role_peg', $role_peg);
        // $builder->where('htd_area', $htd_area);
        $builder->where('role_htd <', $role_htd);
        if ($keyword != '') {
            $builder->where('role_htd <', $role_htd);
            $builder->like('nip', $keyword);
            $builder->orLike('nama_user', $keyword);
            $builder->orLike('nama_org_htd', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('email_korpo', $keyword);
            $builder->orLike('email_non', $keyword);
            $builder->orLike('ket_aktif', $keyword);
        }
        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
