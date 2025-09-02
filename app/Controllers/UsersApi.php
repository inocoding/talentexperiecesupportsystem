<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users; // <-- model kamu

class UsersApi extends BaseController
{
    // LIST untuk DataTables (client-side)
    public function list()
    {
        $m = new Users();

        // Ambil kolom-kolom yang relevan + join utk nama organisasi
        $rows = $m->select('
                    user.nip,
                    user.nama_user,
                    user.email_non,
                    user.email_korpo,
                    user.role_htd,
                    user.ket_aktif,
                    user.htd_area,
                    user.unit_induk,
                    tb_org_htd.nama_org_htd,
                    tb_org_satu.nama_org_satu
                ')
                ->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area', 'left')
                ->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk', 'left')
                ->findAll();

        // Tambahkan detail_url agar mudah dirender jadi <a>
        foreach ($rows as $r) {
            $r->detail_url = site_url('masterdata/detaildapeg/' . $r->nip);
        }

        return $this->response->setJSON(['data' => $rows]);
    }

    // STORE / tambah
    public function store()
    {
        $m = new Users();

        // Ambil subset field yang dipakai di form (silakan tambah jika perlu)
        $data = $this->request->getPost([
            'nip',
            'nama_user',
            'htd_area',
            'unit_induk',
            'email_non',
            'email_korpo',
            'role_htd',
            'ket_aktif',
        ]);

        // Validasi minimal
        if (empty($data['nip']) || empty($data['nama_user'])) {
            return $this->response->setStatusCode(422)
                ->setJSON(['status'=>'error','message'=>'NIP dan Nama wajib diisi']);
        }

        // NIP unik karena PK
        if ($m->find($data['nip'])) {
            return $this->response->setStatusCode(409)
                ->setJSON(['status'=>'error','message'=>'NIP sudah terdaftar']);
        }

        // Simpan (PK = nip → tidak auto increment)
        $m->insert($data, false);

        // Ambil ulang data hasil insert (dengan join agar lengkap)
        $row = $m->select('
                    user.nip,
                    user.nama_user,
                    user.email_non,
                    user.email_korpo,
                    user.role_htd,
                    user.ket_aktif,
                    user.htd_area,
                    user.unit_induk,
                    tb_org_htd.nama_org_htd,
                    tb_org_satu.nama_org_satu
                ')
                ->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area', 'left')
                ->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk', 'left')
                ->where('user.nip', $data['nip'])
                ->first();

        $row->detail_url = site_url('masterdata/detaildapeg/' . $row->nip);

        return $this->response->setJSON(['status'=>'ok','data'=>$row]);
    }

    // UPDATE / edit
    public function update($nip)
    {
        $m = new Users();

        if (!$m->find($nip)) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status'=>'error','message'=>'Data tidak ditemukan']);
        }

        $data = $this->request->getPost([
            'nama_user',
            'htd_area',
            'unit_induk',
            'email_non',
            'email_korpo',
            'role_htd',
            'ket_aktif',
        ]);

        $m->update($nip, $data);

        $row = $m->select('
                    user.nip,
                    user.nama_user,
                    user.email_non,
                    user.email_korpo,
                    user.role_htd,
                    user.ket_aktif,
                    user.htd_area,
                    user.unit_induk,
                    tb_org_htd.nama_org_htd,
                    tb_org_satu.nama_org_satu
                ')
                ->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area', 'left')
                ->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk', 'left')
                ->where('user.nip', $nip)
                ->first();

        $row->detail_url = site_url('masterdata/detaildapeg/' . $row->nip);

        return $this->response->setJSON(['status'=>'ok','data'=>$row]);
    }

    // DELETE / bulk
    public function delete()
    {
        $nips = $this->request->getPost('nips'); // array of nip

        if (!is_array($nips) || empty($nips)) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status'=>'error','message'=>'Tidak ada NIP dikirim']);
        }

        $m = new Users();
        // Jika tidak pakai soft delete, ini akan hard-delete
        $m->whereIn('nip', $nips)->delete();

        return $this->response->setJSON(['status'=>'ok','deleted'=>count($nips)]);
    }
}
