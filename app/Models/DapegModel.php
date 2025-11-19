<?php

namespace App\Models;

use CodeIgniter\Model;

class DapegModel extends Model
{
    protected $table            = 'tb_dapeg';
    protected $primaryKey       = 'id_peg';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;

    // Tidak perlu memasukkan primary key AUTO_INCREMENT ke allowedFields
    protected $allowedFields    = [
    'nip',
    'nama_lengkap',
    'cocd',
    'company_code',
    'busa',
    'business_area',
    'psubarea',
    'personnel_subarea',
    'org_unit',
    'organizational_unit',
    'eegrp',
    'employee_group',
    'esgrp',
    'employee_subgroup',
    'peg',
    'level',
    'skala_gaji_dasar',
    'jenjang_main_grp_id',
    'jenjang_main_grp_text',
    'pog',
    'jenjang_sub_grp_text',
    'travel_priviledge_grup_sppd',
    'kode_posisi',
    'posisi',
    'start_date_posisi',
    'end_date_posisi',
    'nama_panjang_posisi',
    'pendidikan_terakhir',
    'jurusan_pendidikan',
    'birthplace',
    'birth_date',
    'tanggal_grade_terakhir',
    'tanggal_masuk',
    'tanggal_capeg',
    'tanggal_pegawai_tetap',
    'gen',
    'jenis_kelamin',
    'marst',
    'status_pernikahan',
    'rel',
    'agama',
    'parea',
    'payroll_area',
    'bank_payroll',
    'no_rekening_bank_payroll',
    'e_mail',
    'pa',
    'personnel_area',
    'cost_ctr',
    'cost_center',
    'kode_posisi_atasan',
    'posisi_atasan',
    'jobcode',
    'job',
    'job_name',
    'kode_jabatan',
    'kelompok_jabatan',
    'keterangan_jabatan',
    'nomor_sk_basic_pay',
    'tanggal_sk_for_basic_pay',
    'no_sk_penugasan',
    'tanggal_sk_penugasan',
    'nama_panjang_posisi_simkp',
    'golongan_darah',
    'tipe_alamat',
    'co_name',
    'nama_jalan_dan_nomor_rumah',
    'kota',
    'district',
    'kode_pos',
    'no_telepon',
    'second_address_line',
    'street_2',
    'street_3',
    'region_state_province_count',
    'house_number',
    'legacy_code',
    'married_for_tax_purposes',
    'marital_status_of_the_employee',
    'td',
    'jumlah_tanggungan',
    'res',
    'sanksi_disiplin',
    'nomor_sk_hukuman',
    'tanggal_sk_hukuman',
    'pasal_yang_dilanggar',
    'hukuman_yang_diberikan',
    'keterangan',
    'zzskrelated',
    'npwp',
    'jenis_dplk',
    'no_dplk',
    'no_it0007',
    'jadwal_kerja',
    'no_ktp',
    'kode_adt',
    'text_adt',
    'tgl_mulai_adt',
    'tgl_selesai_adt',
    'organisasi_1',
    'organisasi_2',
    'organisasi_3',
    'organisasi_4',
    'organisasi_5',
    'organisasi_6',
    'organisasi_7',
    'organisasi_8',
    'organisasi_9',
    'organisasi_10',
    'organisasi_11',
    'organisasi_12',
    'organisasi_13',
    'kode_organisasi_1',
    'kode_organisasi_2',
    'kode_organisasi_3',
    'kode_organisasi_4',
    'kode_organisasi_5',
    'kode_organisasi_6',
    'kode_organisasi_7',
    'kode_organisasi_8',
    'kode_organisasi_9',
    'kode_organisasi_10',
    'kode_organisasi_11',
    'kode_organisasi_12',
    'kode_organisasi_13',
    'tx_no',
    'tdk_dihit',
    'tgl_proses',
    'tgl_data',
    'thn_umur',
    'bln_umur',
    'profesi',
    ];

    // Tidak memakai created_at / updated_at / deleted_at
    protected $useTimestamps = false;

    /* =========================
     *  Helper query opsional
     * ========================= */

    /**
     * Ambil data dengan pencarian & paginate sederhana.
     * $keyword akan mencocokkan fullname, kode_posisi, atau org_unit_tx.
     */
    public function getPaginated(int $perPage = 20, ?string $keyword = null, ?string $orgSatuUser = null, ?int $roleHtd = null)
    {
        $builder = $this->orderBy('id_peg', 'DESC');

        // batasi berdasarkan org_satu user (kecuali admin)
        if ($orgSatuUser && $roleHtd > 3) {
            $builder->where('org_satu', $orgSatuUser);
            // kalau user bisa punya banyak org: whereIn('org_satu', $orgList)
        }

        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                ->like('fullname', $keyword)
                ->orLike('nip', $keyword)
                ->orLike('org_satu', $keyword)
                ->orLike('nama_panjang_posisi', $keyword)
                ->groupEnd();
        }

        return [
            'rows'  => $builder->paginate($perPage),
            'pager' => $this->pager,
        ];
    }

    // public function getLatestOrgSatuByNip(string $nip): ?string
    // {
    //     // Jika MySQL 5.x: pakai subquery MAX(tgl_data)
    //     $row = $this->db->query("
    //         SELECT d.org_satu
    //         FROM tb_dapeg d
    //         JOIN (
    //         SELECT nip, MAX(tgl_data) AS max_tgl
    //         FROM tb_dapeg
    //         WHERE nip = :nip:
    //         ) last ON last.nip = d.nip AND last.max_tgl = d.tgl_data
    //         ORDER BY d.id_peg DESC
    //         LIMIT 1
    //     ", ['nip' => $nip])->getFirstRow();

    //     return $row->org_satu ?? null;
    // }

}
