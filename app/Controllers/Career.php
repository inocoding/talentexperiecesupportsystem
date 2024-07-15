<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\Users;
use App\Models\Rjab;
use App\Models\Tasklist;
use App\Models\Rpend;
use App\Models\Rsertifikasi;
use App\Models\OrghtdModel;
use App\Models\Evalmutasi;
use App\Models\Dasarmutasi;
use App\Models\Lampiraneval;
use App\Models\Bamutasi;
use App\Models\Reqkodpos;
use phpDocumentor\Reflection\Types\Null_;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use function PHPUnit\Framework\throwException;

class Career extends BaseController
{
    function __construct()
    {
        $this->users        = new Users();
        $this->rjab        = new Rjab();
        $this->task        = new Tasklist();
        $this->rpend        = new Rpend();
        $this->rsert        = new Rsertifikasi();
        $this->orghtd       = new OrghtdModel();
        $this->eval       = new Evalmutasi();
        $this->dm           = new Dasarmutasi();
        $this->lampiraneval           = new Lampiraneval();
        $this->bamutasi           = new Bamutasi();
        $this->reqkodpos           = new Reqkodpos();
    }

    public function index()
    {
        return view('career/finds');
    }

    public function fnp()
    {
        return view('career/fnp');
    }

    public function interview()
    {
        return view('career/interview');
    }

    public function evaluasimutasi()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->eval->getAllPaginatednonaps(5, $keyword);

        return view('career/evaluasimutasi', $data);
    }

    public function evaluasimutasiaps()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->eval->getAllPaginatedaps(5, $keyword);

        return view('career/evaluasimutasiaps', $data);
    }

    public function lampeval()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->lampiraneval->getAllPaginated(5, $keyword);

        return view('career/lampeval', $data);
    }

    public function bamutasi()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->bamutasi->getAllPaginated(5, $keyword);

        return view('career/bamutasi', $data);
    }

    public function reqkodpos()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->reqkodpos->getAllPaginated(5, $keyword);

        return view('career/reqkodpos', $data);
    }

    public function get_peg_lampeval()
    {
        if ($this->request->isAJAX()) {
            $id = userLogin()->nip;
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('posisi_data_kotak_masuk', $id);
            $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
            $query =  $builder->get();
            $user = $query->getResult();

            $data['data']   = $user;

            $msg  = view('career/form_peg_lampeval', $data);
            echo json_encode($msg);
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function get_peg_ba()
    {
        if ($this->request->isAJAX()) {
            $id = userLogin()->nip;
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('posisi_data_kotak_masuk', $id);
            $builder->where('status_evaluasi', 9);
            $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
            $query =  $builder->get();
            $user = $query->getResult();

            $data['data']   = $user;

            $msg  = view('career/form_peg_lampeval', $data);
            echo json_encode($msg);
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function get_peg_req()
    {
        if ($this->request->isAJAX()) {
            $id = userLogin()->nip;
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('posisi_data_kotak_masuk', $id);
            $builder->where('status_evaluasi', 9);
            $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_eval_mutasi.unit_tujuan');
            $query =  $builder->get();
            $user = $query->getResult();

            $data['data']   = $user;

            $msg  = view('career/form_peg_lampeval', $data);
            echo json_encode($msg);
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function createlampeval()
    {
        $data = [
            'nomor_lampeval' => $this->request->getVar('nomor_lampeval'),
            'tgl_lampeval' => $this->request->getVar('tgl_lampeval'),
            'lamp_oleh' => $this->request->getVar('lamp_oleh'),
            'jml_peg_lampeval' => $this->request->getVar('jml_peg_lampeval'),
            'left_sign' => $this->request->getVar('left_sign'),
            'right_sign' => $this->request->getVar('right_sign'),
        ];
        $this->db->table('tb_lamp_eval')->insert($data);
        if ($this->db->affectedRows() > 0) {
            $id_lampeval = $this->db->insertID();
            $id_eval_mutasi = $this->request->getVar('id_eval_mutasi');
            for ($i = 0; $i < sizeof($id_eval_mutasi); $i++) {
                $data = [
                    'id_lampeval'                     => $id_lampeval,
                    'id_eval_mutasi'                  => $id_eval_mutasi[$i],
                ];
                $this->db->table('tb_peg_lampeval')->insert($data);
            }
            return redirect()->to(site_url('career/lampeval'))->with('success', 'Lampiran Evaluasi Berhasil Disimpan');
        }
    }

    public function createba()
    {
        $data = [
            'nomor_ba' => $this->request->getVar('nomor_ba'),
            'tgl_ba' => $this->request->getVar('tgl_ba'),
            'ba_oleh' => $this->request->getVar('ba_oleh'),
            'jml_peg_ba' => $this->request->getVar('jml_peg_ba'),
            'judul_ba' => $this->request->getVar('judul_ba'),
            'left_sign_ba' => $this->request->getVar('left_sign_ba'),
            'right_sign_ba' => $this->request->getVar('right_sign_ba'),
        ];
        $this->db->table('tb_ba_mutasi')->insert($data);
        if ($this->db->affectedRows() > 0) {
            $id_beritaacara = $this->db->insertID();
            $id_eval_mutasi = $this->request->getVar('id_eval_mutasi');
            for ($i = 0; $i < sizeof($id_eval_mutasi); $i++) {
                $data = [
                    'id_beritaacara'                     => $id_beritaacara,
                    'id_eval_mutasi'                  => $id_eval_mutasi[$i],
                ];
                $this->db->table('tb_peg_ba')->insert($data);
            }
            return redirect()->to(site_url('career/bamutasi'))->with('success', 'Berita Acara Berhasil Disimpan');
        }
    }

    public function createreq()
    {
        $data = [
            'tgl_req' => $this->request->getVar('tgl_req'),
            'req_oleh' => $this->request->getVar('req_oleh'),
            'jml_peg_req' => $this->request->getVar('jml_peg_req'),
            'judul_req' => $this->request->getVar('judul_req'),
            'left_sign_req' => $this->request->getVar('left_sign_req'),
            'right_sign_req' => $this->request->getVar('right_sign_req'),
        ];
        $this->db->table('tb_reqkodpos')->insert($data);
        if ($this->db->affectedRows() > 0) {
            $id_req = $this->db->insertID();
            $id_eval_mutasi = $this->request->getVar('id_eval_mutasi');
            for ($i = 0; $i < sizeof($id_eval_mutasi); $i++) {
                $data = [
                    'id_reqq'                     => $id_req,
                    'id_eval_mutasi'                  => $id_eval_mutasi[$i],
                ];
                $this->db->table('tb_peg_req')->insert($data);
            }
            return redirect()->to(site_url('career/reqkodpos'))->with('success', 'Request Kode Posisi Berhasil Disimpan');
        }
    }

    public function dashboardevalmutasi()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->dm->getAllPaginated(10, $keyword);

        return view('career/dashboardevalmutasi', $data);
    }

    public function hitungsla($id, $asal = null)
    {
        $dataeval = $this->eval->where('id_eval', $id)->join('user', 'user.nip = tb_eval_mutasi.dientry_oleh')->join('tb_nd_jawaban', 'tb_eval_mutasi.id_nd_jwbn = tb_nd_jawaban.id_jwbn', 'left')->join('tb_nd_konfirmasi', 'tb_eval_mutasi.id_nd_konfirm = tb_nd_konfirmasi.id_konfirm', 'left')->join('tb_nd_balasan', 'tb_eval_mutasi.id_nd_balasan = tb_nd_balasan.id_balasan', 'left')->join('tb_dasar_mutasi', 'tb_eval_mutasi.id_dasar_mutasi = tb_dasar_mutasi.id_dm', 'left')->join('tb_sk_mutasi', 'tb_eval_mutasi.id_sk_mutasi = tb_sk_mutasi.id_sk', 'left')->first();
        $builder = $this->db->table('tb_org_satu');
        $org = $builder->get()->getResult();

        $builder2   = $this->db->table('tb_dasar_mutasi');
        $dm         = $builder2->get()->getResult();

        $builder3   = $this->db->table('tb_org_div');
        $divtj      = $builder3->get()->getResult();

        $builder4   = $this->db->table('tb_profesi');
        $profesi      = $builder4->get()->getResult();

        if (is_object($dataeval)) {
            if ($asal != null) {
                # code...
                $data['asal']      = $asal;
            }
            $data['dataeval']      = $dataeval;
            $data['org']   = $org;
            $data['dm']   = $dm;
            $data['divtj']   = $divtj;
            $data['profesi']   = $profesi;
            return view('career/hitungsla', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function editkonsep($id = null)
    {
        if ($id != null) {
            # code...
            $dataeval = $this->eval->where('id_eval', $id)->first();
            $builder = $this->db->table('tb_org_satu');
            $org = $builder->get()->getResult();

            $builder2   = $this->db->table('tb_dasar_mutasi');
            $dm         = $builder2->get()->getResult();

            $builder3   = $this->db->table('tb_org_div');
            $divtj      = $builder3->get()->getResult();

            $builder4   = $this->db->table('tb_profesi');
            $profesi      = $builder4->get()->getResult();

            if (is_object($dataeval)) {
                $data['dataeval']      = $dataeval;
                $data['org']   = $org;
                $data['dm']   = $dm;
                $data['divtj']   = $divtj;
                $data['profesi']   = $profesi;
                return view('career/editeval', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

            return view('career/evaluasimutasi', $data);
        }
    }

    public function selesaiview($id = null)
    {
        if ($id != null) {
            # code...
            $dataeval = $this->eval->where('id_eval', $id)->join('user', 'user.nip = tb_eval_mutasi.dientry_oleh')->join('tb_nd_jawaban', 'tb_eval_mutasi.id_nd_jwbn = tb_nd_jawaban.id_jwbn', 'left')->join('tb_nd_konfirmasi', 'tb_eval_mutasi.id_nd_konfirm = tb_nd_konfirmasi.id_konfirm', 'left')->join('tb_nd_balasan', 'tb_eval_mutasi.id_nd_balasan = tb_nd_balasan.id_balasan', 'left')->join('tb_dasar_mutasi', 'tb_eval_mutasi.id_dasar_mutasi = tb_dasar_mutasi.id_dm', 'left')->join('tb_sk_mutasi', 'tb_eval_mutasi.id_sk_mutasi = tb_sk_mutasi.id_sk', 'left')->first();
            $builder = $this->db->table('tb_org_satu');
            $org = $builder->get()->getResult();

            $builder2   = $this->db->table('tb_dasar_mutasi');
            $dm         = $builder2->get()->getResult();

            $builder3   = $this->db->table('tb_org_div');
            $divtj      = $builder3->get()->getResult();

            $builder4   = $this->db->table('tb_profesi');
            $profesi      = $builder4->get()->getResult();

            if (is_object($dataeval)) {
                $data['dataeval']      = $dataeval;
                $data['org']   = $org;
                $data['dm']   = $dm;
                $data['divtj']   = $divtj;
                $data['profesi']   = $profesi;
                return view('career/selesaiview', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function telusuriview($id = null)
    {
        if ($id != null) {
            # code...
            $dataeval = $this->eval->where('id_eval', $id)->join('user', 'user.nip = tb_eval_mutasi.dientry_oleh')->join('tb_nd_jawaban', 'tb_eval_mutasi.id_nd_jwbn = tb_nd_jawaban.id_jwbn', 'left')->join('tb_nd_konfirmasi', 'tb_eval_mutasi.id_nd_konfirm = tb_nd_konfirmasi.id_konfirm', 'left')->join('tb_nd_balasan', 'tb_eval_mutasi.id_nd_balasan = tb_nd_balasan.id_balasan', 'left')->join('tb_dasar_mutasi', 'tb_eval_mutasi.id_dasar_mutasi = tb_dasar_mutasi.id_dm', 'left')->join('tb_sk_mutasi', 'tb_eval_mutasi.id_sk_mutasi = tb_sk_mutasi.id_sk', 'left')->first();
            $builder = $this->db->table('tb_org_satu');
            $org = $builder->get()->getResult();

            $builder2   = $this->db->table('tb_dasar_mutasi');
            $dm         = $builder2->get()->getResult();

            $builder3   = $this->db->table('tb_org_div');
            $divtj      = $builder3->get()->getResult();

            $builder4   = $this->db->table('tb_profesi');
            $profesi      = $builder4->get()->getResult();

            if (is_object($dataeval)) {
                $data['dataeval']      = $dataeval;
                $data['org']   = $org;
                $data['dm']   = $dm;
                $data['divtj']   = $divtj;
                $data['profesi']   = $profesi;
                return view('career/telusuriview', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function editpemeriksa($id = null)
    {
        if ($id != null) {
            # code...
            $dataeval = $this->eval->where('id_eval', $id)->join('user', 'user.nip = tb_eval_mutasi.dientry_oleh')->join('tb_nd_jawaban', 'tb_eval_mutasi.id_nd_jwbn = tb_nd_jawaban.id_jwbn', 'left')->join('tb_nd_konfirmasi', 'tb_eval_mutasi.id_nd_konfirm = tb_nd_konfirmasi.id_konfirm', 'left')->join('tb_nd_balasan', 'tb_eval_mutasi.id_nd_balasan = tb_nd_balasan.id_balasan', 'left')->join('tb_dasar_mutasi', 'tb_eval_mutasi.id_dasar_mutasi = tb_dasar_mutasi.id_dm', 'left')->join('tb_sk_mutasi', 'tb_eval_mutasi.id_sk_mutasi = tb_sk_mutasi.id_sk', 'left')->first();
            $builder = $this->db->table('tb_org_satu');
            $org = $builder->get()->getResult();

            $builder2   = $this->db->table('tb_dasar_mutasi');
            $dm         = $builder2->get()->getResult();

            $builder3   = $this->db->table('tb_org_div');
            $divtj      = $builder3->get()->getResult();

            $builder4   = $this->db->table('tb_profesi');
            $profesi      = $builder4->get()->getResult();

            if (is_object($dataeval)) {
                $data['dataeval']      = $dataeval;
                $data['org']   = $org;
                $data['dm']   = $dm;
                $data['divtj']   = $divtj;
                $data['profesi']   = $profesi;
                return view('career/editeval', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

            return view('career/evaluasimutasi', $data);
        }
    }

    public function telusurieval()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->eval->getAllPaginatedtelusuri(5, $keyword);

        return view('career/telusurieval', $data);
    }

    public function konsepeval()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->eval->getAllPaginatedkonsep(5, $keyword);

        return view('career/konsepeval', $data);
    }

    public function selesaieval()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->eval->getAllPaginatedselesai(5, $keyword);

        return view('career/selesaieval', $data);
    }

    public function addeval()
    {
        // $db = \Config\Database::connect();
        // $builder    = $db->table('user');
        // $query =  $builder->get();
        // $user = $query->getResult();
        // $builder    = $this->db->table('user');
        // $user       = $builder->get()->getResult();
        $builder = $this->db->table('tb_org_satu');
        $org = $builder->get()->getResult();

        $builder2   = $this->db->table('tb_dasar_mutasi');
        $builder2->limit(25);
        $builder2->orderBy('id_dm', 'DESC');
        $dm         = $builder2->get()->getResult();

        $builder5   = $this->db->table('tb_singkatanjabatan');
        $builder5->limit();
        $builder5->orderBy('nama_sj', 'DESC');
        $sj         = $builder5->get()->getResult();

        $builder3   = $this->db->table('tb_org_div');
        $divtj      = $builder3->get()->getResult();

        $builder4   = $this->db->table('tb_profesi');
        $profesi      = $builder4->get()->getResult();


        $data['org']   = $org;
        $data['dm']   = $dm;
        $data['divtj']   = $divtj;
        $data['profesi']   = $profesi;
        $data['sj']   = $sj;

        return view('career/addeval', $data);
    }

    public function get_jenis_dm($id)
    {
        if ($this->request->isAJAX()) {
            $builder    = $this->db->table('tb_dasar_mutasi')->getWhere(['id_dm' =>  $id]);
            $query   = $builder->getResult();
            // $data['jenis_dm']   = $query;
            // $msg  = view('master/form_org_satu_add', $data);
            echo json_encode($query);
        }
    }

    public function get_unit_org_satu_lamp($id)
    {
        if ($this->request->isAJAX()) {
            $builder    = $this->db->table('tb_org_satu')->getWhere(['id_dm' =>  $id]);
            $query   = $builder->getResult();
            // $data['jenis_dm']   = $query;
            // $msg  = view('master/form_org_satu_add', $data);
            echo json_encode($query);
        }
    }

    public function update_status_1($id)
    {
        $data = [

            'hasil_konfirmasi'             => 2,
            'status_evaluasi'              => 9,
        ];

        $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('career/editpemeriksa/' . $id));
        }
    }

    public function update_status_2($id)
    {
        $data = [

            'hasil_konfirmasi'             => 2,
            'status_evaluasi'              => 9,
        ];

        $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('career/editpemeriksa/' . $id));
        }
    }

    public function update_status_3($id)
    {
        $data = [

            'hasil_konfirmasi'             => 1,
            'status_evaluasi'              => 7,
            'telusur_2'              => null,
            'telusur_3'              => null,
            'posisi_data_kotak_masuk'              => null,
        ];

        $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('career/selesaieval'));
        }
    }

    public function update_status_4($id)
    {
        $data = [

            'status_evaluasi'              => 7,
            'telusur_2'              => null,
            'telusur_3'              => null,
            'posisi_data_kotak_masuk'              => null,
        ];

        $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('career/selesaieval'));
        }
    }

    public function get_ftk($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_ftk');
            $builder->where('id_data_ftk', $id);
            $query =  $builder->get();
            $user = $query->getResult();
            echo json_encode($user);
        }
    }

    public function get_pap($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_pap');
            $builder->where('id_peg', $id);
            $query =  $builder->get();
            $user = $query->getResult();
            echo json_encode($user);
        }
    }

    public function get_sp($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_pengurus_sp');
            $builder->where('nip_pengsp', $id);
            $query =  $builder->get();
            $user = $query->getResult();

            echo json_encode($user);
        }
    }

    public function get_rekan($org, $jenjab, $nip)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('user');
            $builder->where('kode_org_unit', $org);
            $builder->where('jenjab', $jenjab);
            $builder->where('nip !=', $nip);
            $query =  $builder->get();
            $user = $query->getResult();

            $data['rekan'] = $user;

            $msg = view('career/data_rekan', $data);

            echo json_encode($msg);
        }
    }


    public function get_rekan_tujuan($org)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('user');
            $builder->where('kode_org_unit', $org);
            $query =  $builder->get();
            $user = $query->getResult();

            $data['rekan'] = $user;

            $msg = view('career/data_rekan', $data);

            echo json_encode($msg);
        }
    }

    public function get_rekan_count($org, $jenjab)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('user');
            $builder->where('kode_org_unit', $org);
            $builder->where('jenjab', $jenjab);
            $query =  $builder->countAllResults();

            echo json_encode($query);
        }
    }

    public function count_kotak_masuk()
    {
        if ($this->request->isAJAX()) {
            $id = userLogin()->nip;
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('posisi_data_kotak_masuk', $id);
            $builder->where('status_evaluasi !=', 7);
            $query =  $builder->countAllResults();

            echo json_encode($query);
        }
    }

    public function count_kotak_masuk_nonaps()
    {
        if ($this->request->isAJAX()) {
            $id = userLogin()->nip;
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('posisi_data_kotak_masuk', $id);
            $builder->where('jenis_mutasi !=', 2);
            $builder->where('status_evaluasi !=', 7);
            $query =  $builder->countAllResults();

            echo json_encode($query);
        }
    }

    public function count_kotak_masuk_aps()
    {
        if ($this->request->isAJAX()) {
            $id = userLogin()->nip;
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('posisi_data_kotak_masuk', $id);
            $builder->where('jenis_mutasi', 2);
            $builder->where('status_evaluasi !=', 7);
            $query =  $builder->countAllResults();

            echo json_encode($query);
        }
    }

    public function get_realisasi_spdm($a, $b, $c)
    {
        if ($this->request->isAJAX()) {
            $e = $b + 1;

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_realisasi_spdm');
            $builder->where('kode_ui', $a);
            $builder->where('bulan_real', $b);
            $builder->where('tahun_real', $c);
            $query =  $builder->get();
            $data =  $query->getResult();

            echo json_encode($data);
        }
    }

    public function get_persen_spdm($a, $b, $c)
    {
        if ($this->request->isAJAX()) {
            $e = $b + 1;

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_realisasi_spdm');
            $builder->where('kode_ui', $a);
            $builder->where('bulan_real', $b);
            $builder->where('tahun_real', $c);
            $query =  $builder->get();
            $real =  $query->getRow();

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_pagu_spdm');
            $builder->where('ui_kode', $a);
            $builder->where('tahun_pagu', $c);
            $query =  $builder->get();
            $pagu =  $query->getRow();

            $hasil_real = $real->rp_realisasi;
            $hasil_pagu = $pagu->rp_pagu;
            $persentase = $hasil_real / $hasil_pagu;

            echo json_encode($persentase);
        }
    }

    public function get_pagu_spdm($a, $b)
    {
        if ($this->request->isAJAX()) {
            $e = $b + 1;

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_pagu_spdm');
            $builder->where('ui_kode', $a);
            $builder->where('tahun_pagu', $b);
            $query =  $builder->get();
            $data =  $query->getResult();

            echo json_encode($data);
        }
    }

    public function get_dm_count()
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_dasar_mutasi');
            $query =  $builder->countAllResults();


            echo json_encode($query);
        }
    }

    public function countevalpic($id, $status)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('id_dasar_mutasi', $id);
            if ($status == 1) {
                $builder->where('hasil_evaluasi_1 !=', null);
            } else if ($status == 2) {
                $builder->where('hasil_evaluasi_2 !=', null);
                # code...
            } else if ($status == 3) {
                $builder->where('hasil_evaluasi_3 !=', null);
                # code...
            } else if ($status == 4) {
                $builder->where('hasil_evaluasi_3', "1");
                # code...
            } else if ($status == 5) {
                $builder->where('hasil_evaluasi_3', "0");
                # code...
            } else if ($status == 6) {
                $builder->where('id_nd_jwbn !=', null);
                # code...
            } else if ($status == 7) {
                $builder->where('id_nd_konfirm !=', null);
                # code...
            } else if ($status == 8) {
                $builder->where('hasil_konfirmasi', "2");
                # code...
            } else if ($status == 9) {
                $builder->where('id_sk_mutasi !=', null);
                # code...
            }

            $query =  $builder->countAllResults();


            echo json_encode($query);
        }
    }

    public function get_rekan_tujuan_count($org)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('user');
            $builder->where('kode_org_unit', $org);
            $query =  $builder->countAllResults();

            echo json_encode($query);
        }
    }

    public function get_org_dua_master($id, $userid = null)
    {

        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_org_dua');
            $builder->where('parent_org_dua', $id);
            $query =  $builder->get();
            $org_dua_master = $query->getResult();
            echo json_encode($org_dua_master);
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function get_org_dua($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_pap');
            $builder->where('id_peg', $id);
            $query =  $builder->get();
            $user = $query->getResult();
            echo json_encode($user);
        }
    }

    public function get_ftk_div($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_ftk');
            $builder->where('tx_div', $id);
            $query =  $builder->get();
            $user = $query->getResult();
            echo json_encode($user);
        }
    }

    public function get_ftk_unit($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_ftk');
            $builder->where('id_unit', $id);
            $query =  $builder->get();
            $user = $query->getResult();
            echo json_encode($user);
        }
    }

    public function get_jml_eval($id)
    {
        if ($this->request->isAJAX()) {

            $hasil = "1";

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('hasil_evaluasi_akhir', $hasil);
            $builder->where('unit_tujuan', $id);
            $user = $builder->countAllResults();
            echo json_encode($user);
        }
    }

    public function get_dapeg($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('user');
            $builder->where('nip', $id);
            $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
            $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
            $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
            $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
            $builder->join('tb_ftk', 'tb_ftk.id_unit = user.unit_induk');
            $query =  $builder->get();
            $user = $query->getResult();

            // $builder    = $this->db->table('user')->getWhere(['nip' =>  $id]);
            // $query   = $builder->getResult();
            echo json_encode($user);
        }
    }

    public function get_jwbn($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_nd_jawaban');
            $builder->like('no_jwbn', $id);
            $builder->orlike('perihal_jwbn', $id);
            $builder->orLike('tujuan_jwbn', $id);
            $query =  $builder->get();
            $user =  $query->getResult();

            $data['jwbn']   = $user;
            $msg  = view('career/form_data_jwbn', $data);
            echo json_encode($msg);
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function get_balasan($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_nd_balasan');
            $builder->like('no_balasan', $id);
            $builder->orlike('perihal_balasan', $id);
            $builder->orLike('tujuan_balasan', $id);
            $query =  $builder->get();
            $user =  $query->getResult();

            $data['balasan']   = $user;
            $msg  = view('career/form_data_balasan', $data);
            echo json_encode($msg);
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function get_konfirm($id)
    {
        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_nd_konfirmasi');
            $builder->like('no_konfirm', $id);
            $builder->orlike('perihal_konfirm', $id);
            $builder->orLike('tujuan_konfirm', $id);
            $query =  $builder->get();
            $user =  $query->getResult();

            $data['konfirm']   = $user;
            $msg  = view('career/form_data_konfirm', $data);
            echo json_encode($msg);
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function selesai($id)
    {
        $data = [

            'status_evaluasi'                     => 7,
            'posisi_data_kotak_masuk'                => NULL,
        ];

        $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('career/selesaieval'));
        }
    }

    public function updatejwbn($id)
    {
        $data = [

            'id_nd_jwbn'                     => $this->request->getVar('id_nd_jwbn'),
            'nd_jwbn_1_to_requestr'                => $this->request->getVar('nd_jwbn_1_to_requestr'),
            'tgl_nd_jwbn_1_to_requestr'                    => $this->request->getVar('tgl_nd_jwbn_1_to_requestr'),
        ];

        $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('career/editpemeriksa/' . $id));
        }
    }

    public function updatebalasan($id)
    {
        $data = [

            'id_nd_balasan'                     => $this->request->getVar('id_nd_balasan'),
            'nd_blsn_kfrm_from_for_coll'                => $this->request->getVar('nd_blsn_kfrm_from_for_collab'),
            'tgl_nd_blsn_kfrm_from_for_c'                    => $this->request->getVar('tgl_nd_blsn_kfrm_from_for_c'),

        ];

        $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('career/editpemeriksa/' . $id));
        }
    }

    public function updatekonfirm($id)
    {
        $data = [

            'id_nd_konfirm'                     => $this->request->getVar('id_nd_konfirm'),
            'nd_kfrm_to_for_collab'                => $this->request->getVar('nd_kfrm_to_for_collab'),
            'tgl_nd_kfrm_to_for_collab'                    => $this->request->getVar('tgl_nd_kfrm_to_for_collab'),
            'status_evaluasi' => 8,
        ];

        $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('career/editpemeriksa/' . $id));
        }
    }

    public function del_konsep($id = null)
    {
        // $this->users->where('user_id', $id)->delete();
        $this->eval->delete($id);
        return redirect()->to(site_url('career/konsepeval'))->with('success', 'Data Berhasil Dihapus');
    }

    public function del_lampeval($id = null)
    {
        // $this->users->where('user_id', $id)->delete();
        $this->lampiraneval->delete($id);
        return redirect()->to(site_url('career/lampeval'))->with('success', 'Data Berhasil Dihapus');
    }

    public function del_ba($id = null)
    {
        // $this->users->where('user_id', $id)->delete();
        $this->bamutasi->delete($id);
        return redirect()->to(site_url('career/bamutasi'))->with('success', 'Data Berhasil Dihapus');
    }

    public function del_req($id = null)
    {
        // $this->users->where('user_id', $id)->delete();
        $this->reqkodpos->delete($id);
        return redirect()->to(site_url('career/reqkodpos'))->with('success', 'Data Berhasil Dihapus');
    }

    public function del_dm($id = null)
    {
        // $this->users->where('user_id', $id)->delete();
        $this->dm->delete($id);
        return redirect()->to(site_url('career/dashboardevalmutasi'))->with('success', 'Data Berhasil Dihapus');
    }

    public function saveeval()
    {
        if (isset($_POST['draft'])) {
            # code...
            $dummy = NULL;
            $status = 1;
            $tglsubmit = date('Y-m-d');
            // ambil files
            $fileSertifikat = $this->request->getFile('cv_peg_eval');
            if ($fileSertifikat->getError() == 4) {
                $data = [
                    'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'dikonsep_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $dummy,
                    'catatan_3' => $dummy,
                    'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    'submit1_oleh' => $dummy,
                    'tgl_submit_eval_1' => $dummy,
                    'hasil_evaluasi_2' => $dummy,
                    'submit2_oleh' => $dummy,
                    'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_1'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $dummy,
                    'tgl_upload_cv' => $dummy,
                    'cv_peg_eval' => $dummy,
                ];

                $this->db->table('tb_eval_mutasi')->insert($data);
                if ($this->db->affectedRows() > 0) {

                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Eval Berhasil Disimpan');
                }
            } else {
                // pindahkan files ke folder sertifikat
                $fileSertifikat->move('template/files/cv');
                // ambil nama file
                $namaFile = $fileSertifikat->getName();


                $data = [
                    'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'dikonsep_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $dummy,
                    'catatan_3' => $dummy,
                    'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    'submit1_oleh' => $dummy,
                    'tgl_submit_eval_1' => $dummy,
                    'hasil_evaluasi_2' => $dummy,
                    'submit2_oleh' => $dummy,
                    'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_1'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $dummy,
                    'tgl_upload_cv' => $this->request->getVar('tgl_upload_cv'),
                    'cv_peg_eval' => $namaFile,
                ];

                $this->db->table('tb_eval_mutasi')->insert($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Evaluasi Berhasil Disimpan');
                }
            }
        } elseif (isset($_POST['kirim'])) {
            // cek apakah peg tsb sdg di eval oleh pic lain
            $id = $this->request->getVar('nip_eval');

            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('nip_eval', $id);
            $builder->where('status_evaluasi != ', 7);
            $query =  $builder->countAllResults();


            $dummy = NULL;
            $status = 2;
            $tglsubmit = date('Y-m-d');
            // ambil files
            $fileSertifikat = $this->request->getFile('cv_peg_eval');

            if ($query <= 0) {
                if ($fileSertifikat->getError() == 4) {
                    $data = [
                        'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                        'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                        'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                        'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                        'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                        'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                        'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                        'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                        'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                        'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                        'notif_rekan' => $this->request->getVar('notif_rekan'),
                        'text_rekan' => $this->request->getVar('text_rekan'),
                        'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                        'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                        'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                        'notif_sppd' => $this->request->getVar('notif_sppd'),
                        'text_sppd' => $this->request->getVar('text_sppd'),
                        'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                        'dikonsep_oleh' => $dummy,
                        'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                        'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                        'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                        'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                        'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                        'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                        'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                        'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                        'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                        'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                        'durasi_diunit_saat_ini' => $dummy,
                        'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                        'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                        'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                        'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                        'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                        'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                        'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                        'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                        'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                        'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                        'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                        'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                        'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                        'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                        'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                        'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                        'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                        'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                        'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                        'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                        'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                        'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                        'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                        'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                        'status_evaluasi' => $status,
                        'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                        'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                        'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                        'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                        'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                        'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                        'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                        'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                        'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                        'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                        'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                        'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                        'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                        'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                        'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                        'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                        'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                        'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                        'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                        'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                        'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                        'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                        'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                        'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                        'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                        'catatan_2' => $dummy,
                        'catatan_3' => $dummy,
                        'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                        'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                        'tgl_submit_eval_1' => $tglsubmit,
                        'hasil_evaluasi_2' => $dummy,
                        'submit2_oleh' => $dummy,
                        'tgl_submit_eval_2' => $dummy,
                        'hasil_evaluasi_3' => $dummy,
                        'submit3_oleh' => $dummy,
                        'tgl_submit_eval_3' => $dummy,
                        'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_1'),
                        'hasil_konfirmasi' => $dummy,
                        'nd_jwbn_1_to_requestr' => $dummy,
                        'tgl_nd_jwbn_1_to_requestr' => $dummy,
                        'nd_kfrm_to_for_collab' => $dummy,
                        'tgl_nd_kfrm_to_for_collab' => $dummy,
                        'nd_blsn_kfrm_from_for_coll' => $dummy,
                        'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                        'nd_bls_if_not_go' => $dummy,
                        'tgl_nd_bls_if_not_go' => $dummy,
                        'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                        'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                        'posisi_data_kotak_masuk' => $this->request->getVar('pemeriksa_1'),
                        'tgl_upload_cv' => $dummy,
                        'cv_peg_eval' => $dummy,
                        'telusur_1' => $this->request->getVar('pic_mutasi'),
                        'telusur_2' => $dummy,
                        'telusur_3' => $dummy,
                    ];

                    $this->db->table('tb_eval_mutasi')->insert($data);
                    if ($this->db->affectedRows() > 0) {
                        return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Eval Berhasil Dikirim');
                    }
                } else {
                    // pindahkan files ke folder sertifikat
                    $fileSertifikat->move('template/files/cv');
                    // ambil nama file
                    $namaFile = $fileSertifikat->getName();


                    $data = [
                        'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                        'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                        'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                        'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                        'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                        'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                        'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                        'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                        'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                        'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                        'notif_rekan' => $this->request->getVar('notif_rekan'),
                        'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                        'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                        'text_rekan' => $this->request->getVar('text_rekan'),
                        'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                        'notif_sppd' => $this->request->getVar('notif_sppd'),
                        'text_sppd' => $this->request->getVar('text_sppd'),
                        'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                        'dikonsep_oleh' => $dummy,
                        'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                        'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                        'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                        'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                        'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                        'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                        'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                        'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                        'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                        'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                        'durasi_diunit_saat_ini' => $dummy,
                        'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                        'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                        'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                        'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                        'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                        'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                        'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                        'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                        'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                        'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                        'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                        'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                        'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                        'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                        'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                        'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                        'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                        'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                        'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                        'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                        'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                        'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                        'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                        'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                        'status_evaluasi' => $status,
                        'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                        'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                        'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                        'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                        'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                        'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                        'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                        'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                        'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                        'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                        'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                        'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                        'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                        'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                        'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                        'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                        'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                        'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                        'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                        'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                        'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                        'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                        'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                        'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                        'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                        'catatan_2' => $dummy,
                        'catatan_3' => $dummy,
                        'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                        'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                        'tgl_submit_eval_1' => $tglsubmit,
                        'hasil_evaluasi_2' => $dummy,
                        'submit2_oleh' => $dummy,
                        'tgl_submit_eval_2' => $dummy,
                        'hasil_evaluasi_3' => $dummy,
                        'submit3_oleh' => $dummy,
                        'tgl_submit_eval_3' => $dummy,
                        'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_1'),
                        'hasil_konfirmasi' => $dummy,
                        'nd_jwbn_1_to_requestr' => $dummy,
                        'tgl_nd_jwbn_1_to_requestr' => $dummy,
                        'nd_kfrm_to_for_collab' => $dummy,
                        'tgl_nd_kfrm_to_for_collab' => $dummy,
                        'nd_blsn_kfrm_from_for_coll' => $dummy,
                        'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                        'nd_bls_if_not_go' => $dummy,
                        'tgl_nd_bls_if_not_go' => $dummy,
                        'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                        'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                        'posisi_data_kotak_masuk' => $this->request->getVar('pemeriksa_1'),
                        'tgl_upload_cv' => $this->request->getVar('tgl_upload_cv'),
                        'cv_peg_eval' => $namaFile,
                        'telusur_1' => $this->request->getVar('pic_mutasi'),
                        'telusur_2' => $dummy,
                        'telusur_3' => $dummy,
                    ];

                    $this->db->table('tb_eval_mutasi')->insert($data);
                    if ($this->db->affectedRows() > 0) {
                        return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Evaluasi Berhasil Dikirim');
                    }
                }
            } else {
                return redirect()->to(site_url('career/addeval'))->with('error', 'Pegawai sedang dievaluasi oleh PIC Lain');
            }
        }
    }

    public function saveevalkonsep($id)
    {
        if (isset($_POST['draft'])) {
            # code...
            $dummy = NULL;
            $status = 1;
            $tglsubmit = date('Y-m-d');
            // ambil files
            $fileSertifikat = $this->request->getFile('cv_peg_eval');
            if ($fileSertifikat->getError() == 4) {
                $data = [
                    'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'dikonsep_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $dummy,
                    'catatan_3' => $dummy,
                    'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    'submit1_oleh' => $dummy,
                    'tgl_submit_eval_1' => $dummy,
                    'hasil_evaluasi_2' => $dummy,
                    'submit2_oleh' => $dummy,
                    'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_1'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $dummy,
                    'tgl_upload_cv' => $dummy,
                    'cv_peg_eval' => $dummy,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/konsepeval'))->with('success', 'Data Eval Berhasil Disimpan');
                }
            } else {
                // pindahkan files ke folder sertifikat
                $fileSertifikat->move('template/files/cv');
                // ambil nama file
                $namaFile = $fileSertifikat->getName();


                $data = [
                    'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'dikonsep_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $dummy,
                    'catatan_3' => $dummy,
                    'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    'submit1_oleh' => $dummy,
                    'tgl_submit_eval_1' => $dummy,
                    'hasil_evaluasi_2' => $dummy,
                    'submit2_oleh' => $dummy,
                    'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_1'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $dummy,
                    'tgl_upload_cv' => $this->request->getVar('tgl_upload_cv'),
                    'cv_peg_eval' => $namaFile,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/konsepeval'))->with('success', 'Data Evaluasi Berhasil Disimpan');
                }
            }
        } elseif (isset($_POST['kirim'])) {
            # code...
            # code...
            $dummy = NULL;
            $status = 2;
            $tglsubmit = date('Y-m-d');
            // ambil files
            $fileSertifikat = $this->request->getFile('cv_peg_eval');
            if ($fileSertifikat->getError() == 4) {
                $data = [
                    'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'dikonsep_oleh' => $dummy,
                    'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $dummy,
                    'catatan_3' => $dummy,
                    'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                    'tgl_submit_eval_1' => $tglsubmit,
                    'hasil_evaluasi_2' => $dummy,
                    'submit2_oleh' => $dummy,
                    'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_1'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('pemeriksa_1'),
                    'tgl_upload_cv' => $dummy,
                    'cv_peg_eval' => $dummy,
                    'telusur_1' => $this->request->getVar('pic_mutasi'),
                    'telusur_2' => $dummy,
                    'telusur_3' => $dummy,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/konsepeval'))->with('success', 'Data Eval Berhasil Dikirim');
                }
            } else {
                // pindahkan files ke folder sertifikat
                $fileSertifikat->move('template/files/cv');
                // ambil nama file
                $namaFile = $fileSertifikat->getName();


                $data = [
                    'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'dikonsep_oleh' => $dummy,
                    'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $dummy,
                    'catatan_3' => $dummy,
                    'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                    'tgl_submit_eval_1' => $tglsubmit,
                    'hasil_evaluasi_2' => $dummy,
                    'submit2_oleh' => $dummy,
                    'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_1'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('pemeriksa_1'),
                    'tgl_upload_cv' => $this->request->getVar('tgl_upload_cv'),
                    'cv_peg_eval' => $namaFile,
                    'telusur_1' => $this->request->getVar('pic_mutasi'),
                    'telusur_2' => $dummy,
                    'telusur_3' => $dummy,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/konsepeval'))->with('success', 'Data Evaluasi Berhasil Dikirim');
                }
            }
        } elseif (isset($_POST['simpan'])) {
            if ($this->request->getFile('cv_peg_eval_cek') != null) {
                $dummycv = $this->request->getFile('cv_peg_eval_cek');
            } else {
                $dummycv = NULL;
            }
            $dummy = NULL;
            $status = 2;
            $tglsubmit = date('Y-m-d');
            // ambil files
            $fileSertifikat = $this->request->getFile('cv_peg_eval');
            if ($fileSertifikat->getError() == 4) {
                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $dummy,
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $dummy,
                    // 'tgl_submit_eval_1' => $dummy,
                    'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    'submit2_oleh' => $dummy,
                    'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_2'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('pic_mutasi'),
                    'tgl_upload_cv' => $dummy,
                    'cv_peg_eval' => $dummycv,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Eval Berhasil Disimpan');
                }
            } else {
                // pindahkan files ke folder sertifikat
                $fileSertifikat->move('template/files/cv');
                // ambil nama file
                $namaFile = $fileSertifikat->getName();


                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $dummy,
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $dummy,
                    // 'tgl_submit_eval_1' => $dummy,
                    'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    'submit2_oleh' => $dummy,
                    'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_2'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('pic_mutasi'),
                    'tgl_upload_cv' => $this->request->getVar('tgl_upload_cv'),
                    'cv_peg_eval' => $namaFile,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Evaluasi Berhasil Disimpan');
                }
            }
        } elseif (isset($_POST['kirimtop2'])) {
            if ($this->request->getFile('cv_peg_eval_cek') != null) {
                $dummycv = $this->request->getFile('cv_peg_eval_cek');
            } else {
                $dummycv = NULL;
            }
            $dummy = NULL;
            $status = 3;
            $tglsubmit = date('Y-m-d');
            // ambil files
            $fileSertifikat = $this->request->getFile('cv_peg_eval');
            if ($fileSertifikat->getError() == 4) {
                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $dummy,
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $dummy,
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_1' => $tglsubmit,
                    'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    'submit2_oleh' => $this->request->getVar('pic_mutasi'),
                    'tgl_submit_eval_2' => $tglsubmit,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_2'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('pemeriksa_2'),
                    'tgl_upload_cv' => $dummy,
                    'cv_peg_eval' => $dummycv,
                    // 'telusur_1' => $this->request->getVar('pic_mutasi'),
                    'telusur_2' => $this->request->getVar('pic_mutasi'),
                    'telusur_3' => $dummy,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Eval Berhasil Dikirim');
                }
            } else {
                // pindahkan files ke folder sertifikat
                $fileSertifikat->move('template/files/cv');
                // ambil nama file
                $namaFile = $fileSertifikat->getName();


                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $dummy,
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $dummy,
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_1' => $tglsubmit,
                    'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    'submit2_oleh' => $this->request->getVar('pic_mutasi'),
                    'tgl_submit_eval_2' => $tglsubmit,
                    'hasil_evaluasi_3' => $dummy,
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_2'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('pemeriksa_2'),
                    'tgl_upload_cv' => $this->request->getVar('tgl_upload_cv'),
                    'cv_peg_eval' => $namaFile,
                    // 'telusur_1' => $this->request->getVar('pic_mutasi'),
                    'telusur_2' => $this->request->getVar('pic_mutasi'),
                    'telusur_3' => $dummy,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Evaluasi Berhasil Dikirim');
                }
            }
        } elseif (isset($_POST['simpan2'])) {
            if ($this->request->getFile('cv_peg_eval_cek') != null) {
                $dummycv = $this->request->getFile('cv_peg_eval_cek');
            } else {
                $dummycv = NULL;
            }

            $dummy = NULL;
            $status = 3;
            $tglsubmit = date('Y-m-d');
            // ambil files
            $fileSertifikat = $this->request->getFile('cv_peg_eval');
            if ($fileSertifikat->getError() == 4) {
                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    // 'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $this->request->getVar('catatan_3'),
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $dummy,
                    // 'tgl_submit_eval_1' => $dummy,
                    // 'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    // 'submit2_oleh' => $dummy,
                    // 'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $this->request->getVar('hasil_evaluasi_3'),
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_3'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('pic_mutasi'),
                    'tgl_upload_cv' => $dummy,
                    'cv_peg_eval' => $dummycv,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Eval Berhasil Disimpan');
                }
            } else {
                // pindahkan files ke folder sertifikat
                $fileSertifikat->move('template/files/cv');
                // ambil nama file
                $namaFile = $fileSertifikat->getName();


                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    // 'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $this->request->getVar('catatan_3'),
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $dummy,
                    // 'tgl_submit_eval_1' => $dummy,
                    // 'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    // 'submit2_oleh' => $dummy,
                    // 'tgl_submit_eval_2' => $dummy,
                    'hasil_evaluasi_3' => $this->request->getVar('hasil_evaluasi_3'),
                    'submit3_oleh' => $dummy,
                    'tgl_submit_eval_3' => $dummy,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_3'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('pic_mutasi'),
                    'tgl_upload_cv' => $this->request->getVar('tgl_upload_cv'),
                    'cv_peg_eval' => $namaFile,
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Evaluasi Berhasil Disimpan');
                }
            }
        } elseif (isset($_POST['kirimtoentry4'])) {
            if ($this->request->getFile('cv_peg_eval_cek') != null) {
                $dummycv = $this->request->getFile('cv_peg_eval_cek');
            } else {
                $dummycv = NULL;
            }
            $dummy = NULL;
            $status = 4;
            $tglsubmit = date('Y-m-d');
            // ambil files
            $fileSertifikat = $this->request->getFile('cv_peg_eval');
            if ($fileSertifikat->getError() == 4) {
                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $dummy,
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    // 'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $this->request->getVar('catatan_3'),
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_1' => $tglsubmit,
                    // 'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    // 'submit2_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_2' => $tglsubmit,
                    'hasil_evaluasi_3' => $this->request->getVar('hasil_evaluasi_3'),
                    'submit3_oleh' => $this->request->getVar('pic_mutasi'),
                    'tgl_submit_eval_3' => $tglsubmit,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_3'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('dientry_oleh'),
                    'tgl_upload_cv' => $dummy,
                    'cv_peg_eval' => $dummycv,
                    'telusur_1' => $dummy,
                    // 'telusur_2' => $this->request->getVar('pic_mutasi'),
                    'telusur_3' => $this->request->getVar('pic_mutasi'),
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Berhasil Dikirim');
                }
            } else {
                // pindahkan files ke folder sertifikat
                $fileSertifikat->move('template/files/cv');
                // ambil nama file
                $namaFile = $fileSertifikat->getName();


                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $dummy,
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    // 'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $this->request->getVar('catatan_3'),
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_1' => $tglsubmit,
                    // 'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    // 'submit2_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_2' => $tglsubmit,
                    'hasil_evaluasi_3' => $this->request->getVar('hasil_evaluasi_3'),
                    'submit3_oleh' => $this->request->getVar('pic_mutasi'),
                    'tgl_submit_eval_3' => $tglsubmit,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_3'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('dientry_oleh'),
                    'tgl_upload_cv' => $this->request->getVar('tgl_upload_cv'),
                    'cv_peg_eval' => $namaFile,
                    'telusur_1' => $dummy,
                    // 'telusur_2' => $this->request->getVar('pic_mutasi'),
                    'telusur_3' => $this->request->getVar('pic_mutasi'),
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Evaluasi Berhasil Dikirim');
                }
            }
        } elseif (isset($_POST['kirimtoentry5'])) {
            if ($this->request->getFile('cv_peg_eval_cek') != null) {
                $dummycv = $this->request->getFile('cv_peg_eval_cek');
            } else {
                $dummycv = NULL;
            }
            $dummy = NULL;
            $status = 5;
            $tglsubmit = date('Y-m-d');
            // ambil files
            $fileSertifikat = $this->request->getFile('cv_peg_eval');
            if ($fileSertifikat->getError() == 4) {
                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $dummy,
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    // 'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $this->request->getVar('catatan_3'),
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_1' => $tglsubmit,
                    // 'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    // 'submit2_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_2' => $tglsubmit,
                    'hasil_evaluasi_3' => $this->request->getVar('hasil_evaluasi_3'),
                    'submit3_oleh' => $this->request->getVar('pic_mutasi'),
                    'tgl_submit_eval_3' => $tglsubmit,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_3'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('dientry_oleh'),
                    'tgl_upload_cv' => $dummy,
                    'cv_peg_eval' => $dummycv,
                    // 'telusur_1' => $this->request->getVar('pic_mutasi'),
                    // 'telusur_2' => $this->request->getVar('pic_mutasi'),
                    'telusur_3' => $this->request->getVar('pic_mutasi'),
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Berhasil Dikirim');
                }
            } else {
                // pindahkan files ke folder sertifikat
                $fileSertifikat->move('template/files/cv');
                // ambil nama file
                $namaFile = $fileSertifikat->getName();


                $data = [
                    // 'dientry_oleh' => $this->request->getVar('pic_mutasi'), //sudah
                    // 'dikonsep_oleh' => $dummy,
                    // 'timestapm_entry' => $this->request->getVar('timestapm_entry'), //sudah-293
                    'unit_pengaju' => $this->request->getVar('unit_pengaju'), // sudah
                    'ftkupsupasal' => $this->request->getVar('ftkupsupasal'), //sudah
                    'ftkupsup' => $this->request->getVar('ftkupsup'), //sudah
                    'jabatan_lengkap_saat_ini' => $this->request->getVar('jabatan_lengkap'),
                    'kode_unit_asal' => $this->request->getVar('kode_unit_asal'), //sudah
                    'real_spdm' => $this->request->getVar('real_spdm'), //sudah
                    'pagu_spdm' => $this->request->getVar('pagu_spdm'), //sudah
                    'persenspdm' => $this->request->getVar('persenspdm'), //sudah
                    'jarak_antar_unit' => $this->request->getVar('jarak_antar_unit'),
                    'kode_org_unit_tujuan' => $this->request->getVar('kode_org_unit_tujuan'),
                    'notif_rekan' => $this->request->getVar('notif_rekan'),
                    'text_rekan' => $this->request->getVar('text_rekan'),
                    'unit_pelaksana_eval' => $this->request->getVar('unit_pelaksana_eval'),
                    'sub_unit_pelaksana_eval' => $this->request->getVar('sub_unit_pelaksana_eval'),
                    'text_rekan_tujuan' => $this->request->getVar('text_rekan_tujuan'),
                    'notif_sppd' => $this->request->getVar('notif_sppd'),
                    'text_sppd' => $this->request->getVar('text_sppd'),
                    'kode_org_unit_eval' => $this->request->getVar('kode_org_unit_eval'),
                    'nip_eval' => $this->request->getVar('nip_eval'), //sudah-211
                    'nama_eval' => $this->request->getVar('nama_eval'), //sudah-215
                    'peg_eval' => $this->request->getVar('peg_eval'), //sudah-219
                    'pendidikan' => $this->request->getVar('pendidikan'), //sudah-262
                    'masa_kerja' => $this->request->getVar('masa_kerja'), //sudah-243
                    'tgl_peg_ttp' => $this->request->getVar('tgl_peg_ttp'), //sudah-244
                    'masa_jabatan_terakhir' => $this->request->getVar('masa_jabatan_terakhir'), //sudah-237
                    'tgl_jabtrk' => $this->request->getVar('tgl_jabtrk'), //sudah-238
                    'durasi_diunit_saat_ini' => $dummy,
                    'jenjab_eval' => $this->request->getVar('jenjab_eval'), //sudah-232
                    'pog_saat_ini' => $this->request->getVar('pog_saat_ini'), //sudah-227
                    'jabatan_saat_ini' => $this->request->getVar('jabatan_saat_ini'), //sudah-223
                    'proyeksi_jabatan_baru' => $this->request->getVar('proyeksi_jabatan_baru'), //sudah-192
                    'dahan_profesi_tujuan' => $this->request->getVar('dahan_profesi_tujuan'), //sudah-179
                    'dahan_profesi_skrg' => $this->request->getVar('dahan_profesi_skrg'), //sudah
                    'pog_baru' => $this->request->getVar('pog_baru'), //sudah-188
                    'unit_tujuan' => $this->request->getVar('unit_tujuan'), //sudah-149
                    'org_dua_tujuan' => $this->request->getVar('org_dua_tujuan'), //sudah-167
                    'org_tiga_tujuan' => $this->request->getVar('org_tiga_tujuan'), //sudah-173
                    'div_tujuan' => $this->request->getVar('div_tujuan'), //sudah-158
                    'unit_asal' => $this->request->getVar('unit_asal'), //sudah-248
                    'for_collab_htd_area' => $this->request->getVar('for_collab_htd_area'), //sudah
                    'jenis_mutasi' => $this->request->getVar('jenis_mutasi'), //sudah
                    'alasan_mutasi' => $this->request->getVar('alasan_mutasi'), //sudah
                    'status_pasangan' => $this->request->getVar('status_pasangan'), //sudah-266
                    'status_hukdis' => $this->request->getVar('status_hukdis'), //sudah-270
                    'status_pengurus_sp' => $this->request->getVar('status_pengurus_sp'), //sudah-274
                    'kota_lahir' => $this->request->getVar('kota_lahir'), //sudah-278
                    'kota_rumah' => $this->request->getVar('kota_rumah'), //sudah-282
                    'id_dasar_mutasi' => $this->request->getVar('id_dasar_mutasi'), // sudah
                    'dasar_mutasi' => $this->request->getVar('dasar_mutasi'), // sudah
                    'tgl_dasar_mutasi' => $this->request->getVar('tgl_dasar_mutasi'), //sudah
                    'tgl_disposisi' => $this->request->getVar('tgl_disposisi'), //sudah
                    'status_evaluasi' => $status,
                    'realisasi_ftk_unit_asal' => $this->request->getVar('realisasi_ftk_unit_asal'), //sudah-253
                    'real_ftk_nasional' => $this->request->getVar('real_ftk_nasional'), //sudah-258
                    'realisasi_ftk_unit_tujuan' => $this->request->getVar('realisasi_ftk_unit_tujuan'), //sudah-292
                    'notif_pegpog' => $this->request->getVar('notif_pegpog'), //sudah-323
                    'notif_ftk' => $this->request->getVar('notif_ftk'), //sudah-333
                    'kategori_ftk_asal' => $this->request->getVar('kategori_ftk_asal'), //sudah-337
                    'kategori_ftk_tujuan' => $this->request->getVar('kategori_ftk_tujuan'), //sudah-337
                    'notif_masa_kerja' => $this->request->getVar('notif_masa_kerja'), //sudah-343
                    'notif_masa_jab_trkhir' => $this->request->getVar('notif_masa_jab_trkhir'), //sudah-353
                    'notif_profesi' => $this->request->getVar('notif_profesi'), //sudah-379
                    'notif_pap' => $this->request->getVar('notif_pap'), //sudah-406
                    'text_pegpog' => $this->request->getVar('text_pegpog'), //sudah-327
                    'text_ftk' => $this->request->getVar('text_ftk'), //sudah-337
                    'text_masa_kerja' => $this->request->getVar('text_masa_kerja'), //sudah-347
                    'text_masa_jab_trkhir' => $this->request->getVar('text_masa_jab_trkhir'), //sudah-357
                    'text_profesi' => $this->request->getVar('text_profesi'), //sudah-383
                    'text_peta_risk' => $this->request->getVar('text_peta_risk'), //sudah-384
                    'text_pap' => $this->request->getVar('text_pap'), //sudah-410
                    'nama_pap' => $this->request->getVar('nama_pap'), //sudah-411
                    'nip_pap' => $this->request->getVar('nip_pap'), //sudah-412
                    'unit_pap' => $this->request->getVar('unit_pap'), //sudah-413
                    'unit_pelaksana_pap' => $this->request->getVar('unit_pelaksana_pap'), //sudah-414
                    'sub_unit_pap' => $this->request->getVar('sub_unit_pap'), //sudah-415
                    'ket_pap' => $this->request->getVar('ket_pap'), //sudah-416
                    // 'catatan_1' => $this->request->getVar('catatan_1'), //sudah-758
                    // 'catatan_2' => $this->request->getVar('catatan_2'),
                    'catatan_3' => $this->request->getVar('catatan_3'),
                    // 'hasil_evaluasi_1' => $this->request->getVar('hasil_evaluasi_1'), //sudah-748
                    // 'submit1_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_1' => $tglsubmit,
                    // 'hasil_evaluasi_2' => $this->request->getVar('hasil_evaluasi_2'),
                    // 'submit2_oleh' => $this->request->getVar('pic_mutasi'),
                    // 'tgl_submit_eval_2' => $tglsubmit,
                    'hasil_evaluasi_3' => $this->request->getVar('hasil_evaluasi_3'),
                    'submit3_oleh' => $this->request->getVar('pic_mutasi'),
                    'tgl_submit_eval_3' => $tglsubmit,
                    'hasil_evaluasi_akhir' => $this->request->getVar('hasil_evaluasi_3'),
                    'hasil_konfirmasi' => $dummy,
                    'nd_jwbn_1_to_requestr' => $dummy,
                    'tgl_nd_jwbn_1_to_requestr' => $dummy,
                    'nd_kfrm_to_for_collab' => $dummy,
                    'tgl_nd_kfrm_to_for_collab' => $dummy,
                    'nd_blsn_kfrm_from_for_coll' => $dummy,
                    'tgl_nd_blsn_kfrm_from_for_c' => $dummy,
                    'nd_bls_if_not_go' => $dummy,
                    'tgl_nd_bls_if_not_go' => $dummy,
                    // 'pemeriksa_1' => $this->request->getVar('pemeriksa_1'), //sudah-765
                    // 'pemeriksa_2' => $this->request->getVar('pemeriksa_2'), //sudah-772
                    'posisi_data_kotak_masuk' => $this->request->getVar('dientry_oleh'),
                    'tgl_upload_cv' => $this->request->getVar('tgl_upload_cv'),
                    'cv_peg_eval' => $namaFile,
                    // 'telusur_1' => $this->request->getVar('pic_mutasi'),
                    // 'telusur_2' => $this->request->getVar('pic_mutasi'),
                    'telusur_3' => $this->request->getVar('pic_mutasi'),
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/evaluasimutasi'))->with('success', 'Data Evaluasi Berhasil Dikirim');
                }
            }
        }
    }

    public function adddm($asal = null)
    {
        $dummy = NULL;
        // ambil files
        $fileSertifikat = $this->request->getFile('lampiran_dm');
        if ($fileSertifikat->getError() == 4) {
            $data = [
                'jenis_dm'                  => $this->request->getVar('jenis_dm'),
                'no_dm'                     => $this->request->getVar('no_dm'),
                'jml_usulan'                => $this->request->getVar('jml_usulan'),
                'perihal_dm'                => $this->request->getVar('perihal_dm'),
                'tgl_dm'                    => $this->request->getVar('tgl_dm'),
                'tgl_dispo_dm'              => $this->request->getVar('tgl_dispo_dm'),
                'asal_dm'                   => $this->request->getVar('asal_dm'),
                'tujuan_dm'                 => $this->request->getVar('tujuan_dm'),
                'catatan_dm'                => $this->request->getVar('catatan_dm'),
                'lampiran_dm'               => $dummy,
            ];

            $this->db->table('tb_dasar_mutasi')->insert($data);
            if ($this->db->affectedRows() > 0) {
                if ($asal != null) {
                    # code...
                    return redirect()->to(site_url('career/dashboardevalmutasi'))->with('success', 'Data Dasar Mutasi Berhasil Ditambahkan');
                } else {
                    # code...
                    return redirect()->to(site_url('career/addeval'))->with('success', 'Data Dasar Mutasi Berhasil Ditambahkan');
                }
            }
        } else {
            // pindahkan files ke folder sertifikat
            $fileSertifikat->move('template/files/dm');
            // ambil nama file
            $namaFile = $fileSertifikat->getName();


            $data = [
                'jenis_dm'                  => $this->request->getVar('jenis_dm'),
                'no_dm'                     => $this->request->getVar('no_dm'),
                'perihal_dm'                => $this->request->getVar('perihal_dm'),
                'tgl_dm'                    => $this->request->getVar('tgl_dm'),
                'tgl_dispo_dm'              => $this->request->getVar('tgl_dispo_dm'),
                'asal_dm'                   => $this->request->getVar('asal_dm'),
                'tujuan_dm'                 => $this->request->getVar('tujuan_dm'),
                'catatan_dm'                => $this->request->getVar('catatan_dm'),
                'lampiran_dm'               => $namaFile,
            ];

            $this->db->table('tb_dasar_mutasi')->insert($data);
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('career/addeval'))->with('success', 'Data Dasar Mutasi Berhasil Ditambahkan');
            }
        }
    }

    public function addjwbn($id)
    {
        $dummy = NULL;
        // ambil files
        $fileSertifikat = $this->request->getFile('lampiran_jwbn');
        if ($fileSertifikat->getError() == 4) {
            $data = [

                'no_jwbn'                     => $this->request->getVar('no_jwbn'),
                'perihal_jwbn'                => $this->request->getVar('perihal_jwbn'),
                'tgl_jwbn'                    => $this->request->getVar('tgl_jwbn'),

                'asal_jwbn'                   => $this->request->getVar('asal_jwbn'),
                'tujuan_jwbn'                 => $this->request->getVar('tujuan_jwbn'),
                'catatan_jwbn'                => $this->request->getVar('catatan_jwbn'),
                'lampiran_jwbn'               => $dummy,
            ];

            $this->db->table('tb_nd_jawaban')->insert($data);
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('career/editpemeriksa/' . $id))->with('success', 'Data Berhasil Ditambahkan');
            }
        } else {
            // pindahkan files ke folder sertifikat
            $fileSertifikat->move('template/files/dm');
            // ambil nama file
            $namaFile = $fileSertifikat->getName();


            $data = [
                'no_jwbn'                     => $this->request->getVar('no_jwbn'),
                'perihal_jwbn'                => $this->request->getVar('perihal_jwbn'),
                'tgl_jwbn'                    => $this->request->getVar('tgl_jwbn'),

                'asal_jwbn'                   => $this->request->getVar('asal_jwbn'),
                'tujuan_jwbn'                 => $this->request->getVar('tujuan_jwbn'),
                'catatan_jwbn'                => $this->request->getVar('catatan_jwbn'),
                'lampiran_jwbn'               => $namaFile,
            ];

            $this->db->table('tb_nd_jawaban')->insert($data);
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('career/editpemeriksa/' . $id))->with('success', 'Data Berhasil Ditambahkan');
            }
        }
    }

    public function addkonfirm($id)
    {
        $dummy = NULL;
        // ambil files
        $fileSertifikat = $this->request->getFile('lampiran_konfirm');
        if ($fileSertifikat->getError() == 4) {
            $data = [

                'no_konfirm'                     => $this->request->getVar('no_konfirm'),
                'perihal_konfirm'                => $this->request->getVar('perihal_konfirm'),
                'tgl_konfirm'                    => $this->request->getVar('tgl_konfirm'),

                'asal_konfirm'                   => $this->request->getVar('asal_konfirm'),
                'tujuan_konfirm'                 => $this->request->getVar('tujuan_konfirm'),
                'catatan_konfirm'                => $this->request->getVar('catatan_konfirm'),
                'lampiran_konfirm'               => $dummy,
            ];

            $this->db->table('tb_nd_konfirmasi')->insert($data);
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('career/editpemeriksa/' . $id))->with('success', 'Data Berhasil Ditambahkan');
            }
        } else {
            // pindahkan files ke folder sertifikat
            $fileSertifikat->move('template/files/dm');
            // ambil nama file
            $namaFile = $fileSertifikat->getName();


            $data = [
                'no_konfirm'                     => $this->request->getVar('no_konfirm'),
                'perihal_konfirm'                => $this->request->getVar('perihal_konfirm'),
                'tgl_konfirm'                    => $this->request->getVar('tgl_konfirm'),

                'asal_konfirm'                   => $this->request->getVar('asal_konfirm'),
                'tujuan_konfirm'                 => $this->request->getVar('tujuan_konfirm'),
                'catatan_konfirm'                => $this->request->getVar('catatan_konfirm'),
                'lampiran_konfirm'               => $namaFile,
            ];

            $this->db->table('tb_nd_konfirmasi')->insert($data);
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('career/editpemeriksa/' . $id))->with('success', 'Data Berhasil Ditambahkan');
            }
        }
    }

    public function addbalasan($id)
    {
        $dummy = NULL;
        // ambil files
        $fileSertifikat = $this->request->getFile('lampiran_balasan');
        if ($fileSertifikat->getError() == 4) {
            $data = [

                'no_balasan'                     => $this->request->getVar('no_balasan'),
                'perihal_balasan'                => $this->request->getVar('perihal_balasan'),
                'tgl_balasan'                    => $this->request->getVar('tgl_balasan'),
                'asal_balasan'                   => $this->request->getVar('asal_balasan'),
                'tujuan_balasan'                 => $this->request->getVar('tujuan_balasan'),
                'catatan_balasan'                => $this->request->getVar('catatan_balasan'),
                'lampiran_balasan'               => $dummy,
            ];

            $this->db->table('tb_nd_balasan')->insert($data);
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('career/editpemeriksa/' . $id))->with('success', 'Data Berhasil Ditambahkan');
            }
        } else {
            // pindahkan files ke folder sertifikat
            $fileSertifikat->move('template/files/dm');
            // ambil nama file
            $namaFile = $fileSertifikat->getName();


            $data = [
                'no_balasan'                     => $this->request->getVar('no_balasan'),
                'perihal_balasan'                => $this->request->getVar('perihal_balasan'),
                'tgl_balasan'                    => $this->request->getVar('tgl_balasan'),

                'asal_balasan'                   => $this->request->getVar('asal_balasan'),
                'tujuan_balasan'                 => $this->request->getVar('tujuan_balasan'),
                'catatan_balasan'                => $this->request->getVar('catatan_balasan'),
                'lampiran_balasan'               => $namaFile,
            ];

            $this->db->table('tb_nd_balasan')->insert($data);
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('career/editpemeriksa/' . $id))->with('success', 'Data Berhasil Ditambahkan');
            }
        }
    }

    public function addskmutasi($id)
    {
        $dummy = NULL;
        // ambil files
        $fileSertifikat = $this->request->getFile('file_sk');
        if ($fileSertifikat->getError() == 4) {
            $data = [

                'nomor_sk'                     => $this->request->getVar('nomor_sk'),
                'id_data_eval'                => $this->request->getVar('id_data_eval'),
                'tgl_sk'                    => $this->request->getVar('tgl_sk'),
                'catatan_sk'                   => $this->request->getVar('catatan_sk'),
                'file_sk'               => $dummy,
            ];

            $this->db->table('tb_sk_mutasi')->insert($data);
            if ($this->db->affectedRows() > 0) {
                $data = [
                    'id_sk_mutasi'                     => $this->db->insertID(),
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/editpemeriksa/' . $id))->with('success', 'Data Berhasil Ditambahkan');
                }
            }
        } else {
            // pindahkan files ke folder sertifikat
            $fileSertifikat->move('template/files/dm');
            // ambil nama file
            $namaFile = $fileSertifikat->getName();


            $data = [
                'nomor_sk'                     => $this->request->getVar('nomor_sk'),
                'id_data_eval'                => $this->request->getVar('id_data_eval'),
                'tgl_sk'                    => $this->request->getVar('tgl_sk'),
                'catatan_sk'                   => $this->request->getVar('catatan_sk'),
                'file_sk'               => $namaFile,
            ];

            $this->db->table('tb_sk_mutasi')->insert($data);
            if ($this->db->affectedRows() > 0) {
                $data = [
                    'id_sk_mutasi'                     => $this->db->insertID(),
                ];

                $this->db->table('tb_eval_mutasi')->where(['id_eval' => $id])->update($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('career/editpemeriksa/' . $id))->with('success', 'Data Berhasil Ditambahkan');
                }
            }
        }
    }

    public function export($id)
    {
        // $user = $this->users->getAll();
        // $role_htd = "4";
        // $role_peg = "1";
        // $unit_induk = userLogin()->unit_induk;

        $keyword = $this->request->getGet('keyword');
        $db = \Config\Database::connect();
        $builder    = $db->table('tb_peg_lampeval');
        $builder->where('id_lampeval', $id);
        // $builder->where('unit_induk', $unit_induk);
        // $builder->where('role_htd', $role_htd);
        $builder->join('tb_eval_mutasi', 'tb_eval_mutasi.id_eval = tb_peg_lampeval.id_eval_mutasi');
        // $builder->join('user', 'user.nip = tb_peg_lampeval.nip_lamp');
        // $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        // $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        // $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        $query =  $builder->get();
        $user = $query->getResult();

        $db2 = \Config\Database::connect();
        $builder2    = $db2->table('tb_lamp_eval');
        $builder2->where('id_lamp', $id);
        $query2 =  $builder2->get();
        $user2 = $query2->getRow();



        $judulLampiran = $user2->nomor_lampeval;

        $styleJudul = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $styleJudulKolom = [
            'alignment' => [
                'vertical'  => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
            'borders'   => [
                'top'   => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $styleCell = [
            'alignment' => [
                'vertical'  => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders'   => [
                'top'   => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        function namabulan($a)
        {
            switch ($a) {
                case '01':
                    return  'Januari';
                case '02':
                    return  'Februari';
                case '03':
                    return  'Maret';
                case '04':
                    return  'April';
                case '05':
                    return  'Mei';
                case '06':
                    return  'Juni';
                case '07':
                    return  'Juli';
                case '08':
                    return  'Agustus';
                case '09':
                    return  'September';
                case '10':
                    return  'Oktober';
                case '11':
                    return  'Nopember';
                case '12':
                    return  'Desember';
            }
        };

        function setTahun($a)
        {
            $sisa_bagi = $a % 12;
            $hsl_bagi = ($a - $sisa_bagi) / 12;
            $hasil = $hsl_bagi . ' Tahun ' . $sisa_bagi . ' Bulan';
            return $hasil;
        };

        function jenisMutasi($a)
        {
            $lolosbutuh = 'Lolos Butuh';
            $aps = 'APS';
            $bursa = 'Bursa';
            $rotasiinternal = 'Rotasi Internal Div';
            $berangkatptb = 'Berangkat PTB';
            $kembaliptb = 'Kembali PTB';
            $promosi = 'Promosi';
            $demosi = 'Demosi';
            $rotasiinternaldir = 'Rotasi Internal Dir';

            if ($a == 1) {
                return $lolosbutuh;
            } else if ($a == 2) {
                return $aps;
            } else if ($a == 3) {
                return $bursa;
            } else if ($a == 4) {
                return $rotasiinternal;
            } else if ($a == 5) {
                return $berangkatptb;
            } else if ($a == 6) {
                return $kembaliptb;
            } else if ($a == 7) {
                return $promosi;
            } else if ($a == 8) {
                return $demosi;
            } else if ($a == 9) {
                return $rotasiinternaldir;
            }
        };

        function pegpog($a)
        {
            $b = "'- PeG Ybs tidak memenuhi pada PoG Proyeksi Jabatan" . "\r\n";
            if ($a == "Memenuhi") {
                return NULL;
            } else {
                return $b;
            }
        };

        function ftkasal($a)
        {
            $b = "'- FTK Unit/Divisi Asal > Rata-Rata FTK Nasional" . "\r\n";
            $c = "'- FTK Unit/Divisi Asal < Rata-Rata FTK Nasional" . "\r\n";
            $d = "'- FTK Unit/Divisi Asal = Rata-Rata FTK Nasional" . "\r\n";
            if ($a == "Lebih") {
                return $b;
            } else if ($a == "Kurang") {
                return $c;
            } else {
                return $d;
            }
        };

        function ftktujuan($a)
        {
            $b = "- FTK Unit/Divisi Tujuan > Rata-Rata FTK Nasional" . "\r\n";
            $c = "- FTK Unit/Divisi Tujuan < Rata-Rata FTK Nasional" . "\r\n";
            $d = "- FTK Unit/Divisi Tujuan = Rata-Rata FTK Nasional" . "\r\n";
            if ($a == "Lebih") {
                return $b;
            } else if ($a == "Kurang") {
                return $c;
            } else {
                return $d;
            }
        };

        function masakerja($a)
        {
            $b = "- Masa Kerja < 7 Tahun, belum menjadi prioritas talent mobility" . "\r\n";
            if ($a > 84) {
                return NULL;
            } else {
                return $b;
            }
        };

        function masajabakhir($a, $b)
        {
            $c = "- Masa Jabatan Terakhir > 6 Bulan (Fungsional)" . "\r\n";
            $d = "- Masa Jabatan Terakhir < 6 Bulan (Fungsional)" . "\r\n";
            $e = "- Masa Jabatan Terakhir = 6 Bulan (Fungsional)" . "\r\n";
            $f = "- Masa Jabatan Terakhir > 1 Tahun (Struktural)" . "\r\n";
            $g = "- Masa Jabatan Terakhir < 1 Tahun (Struktural)" . "\r\n";
            $h = "- Masa Jabatan Terakhir = 1 Tahun (Struktural)" . "\r\n";
            if ($b == "FUNGSIONAL") {
                if ($a > 6) {
                    return $c;
                } else if ($a < 6) {
                    return $d;
                } else {
                    return $e;
                }
            } else {
                if ($a > 12) {
                    return $f;
                } else if ($a < 12) {
                    return $g;
                } else {
                    return $h;
                }
            }
        };

        function petarisiko($a)
        {
            $b = "- Peta Risiko Profesi : " . $a . "\r\n";
            return $b;
        };

        function sppd($a)
        {
            $b = "- Estimasi SPPD : Rp " . $a . "\r\n";
            return $b;
        };

        function pap($a, $b, $c, $d, $e, $f)
        {
            $y = "Pernikahan Antar Pegawai" . "\r\n" . "Nama Pasangan : " . $b . "\r\n" . "NIP Pasangan : " . $c . "\r\n" . "Unit : " . $d . ", " . $e . ", " . $f;
            if ($a == "Memenuhi") {
                return Null;
            } else {
                return $y;
            }
        };

        function sp($a, $c, $d, $e)
        {
            $b = "- Ybs adalah " . $c . " di " . $d . " pada " . $e;
            if ($a == NULL) {
                return NULL;
            } else {
                return $b;
            }
        };

        function rekanasal($a)
        {
            if ($a == null) {
                $b = "- Jumlah FTK pada bagian Ybs : 0" . "\r\n";
            } else {
                $b = "- Jumlah FTK pada bagian Ybs : " . $a . "\r\n";
            }

            return $b;
        };

        function rekantujuan($a)
        {
            if ($a == null) {
                $b = "- Jumlah FTK pada organisasi terkecil di unit/divisi tujuan : 0" . "\r\n";
            } else {
                $b = "- Jumlah FTK pada organisasi terkecil di unit/divisi tujuan : " . $a . "\r\n";
            }

            return $b;
        };

        function catatan($a, $b, $c)
        {
            $y = "\r\n" . "Catatan PIC" . "\r\n" . $a . "\r\n" . "Catatan MSB" . "\r\n" . $b . "\r\n" . "Catatan VP" . "\r\n" . $c . "\r\n";
            return $y;
        };

        function hasil($a, $b)
        {
            $x = "\r\n" . "HASIL EVALUASI : BELUM DAPAT DITINDAKLANJUTI";
            $y = "\r\n" . "HASIL EVALUASI : DAPAT DITINDAKLANJUTI, CETAK SK PER";
            $z = "\r\n" . "HASIL EVALUASI : DAPAT DITINDAKLANJUTI," . "\r\n" . "Proses Lolos Butuh ke HTD Area Asal oleh DIV HTD Kantor Pusat" . "\r\n";

            if ($a == 1) {
                if ($b == 4) {
                    return $y;
                } else {
                    return $z;
                }
            } else {
                return $x;
            }
        };

        function dasarmutasi($a)
        {
            $db3 = \Config\Database::connect();
            $builder3    = $db3->table('tb_dasar_mutasi');
            $builder3->where('id_dm', $a);
            $query3 =  $builder3->get();
            $user3 = $query3->getRow();

            $b = $user3->no_dm . "\r\n" . "tanggal " . $user3->tgl_dm . " Perihal " . $user3->perihal_dm;

            return $b;
        };

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', strtoupper($judulLampiran))->mergeCells('A2:P2')->getStyle('A2:P2')->applyFromArray($styleJudul); // judul lampiran dibuat dinamic by isian
        $sheet->setCellValue('A4', 'NO')->getStyle('A4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('B4', 'NIP')->getStyle('B4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('C4', 'NAMA')->getStyle('C4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('D4', 'PEG')->getStyle('D4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('E4', 'PENDIDIKAN')->getStyle('E4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('F4', 'MASA KERJA')->getStyle('F4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('G4', 'MASA JABATAN TERAKHIR')->getStyle('G4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('H4', 'POG LAMA')->getStyle('H4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('I4', 'JABATAN SAAT INI')->getStyle('I4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('J4', 'PROYEKSI JABATAN BARU')->getStyle('J4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('K4', 'POG BARU')->getStyle('K4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('L4', 'JENIS MUTASI')->getStyle('L4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('M4', 'DASAR/REKOMENDASI MUTASI')->getStyle('M4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('N4', 'FTK UNIT/DIVISI ASAL')->getStyle('N4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('O4', 'FTK UNIT/DIVISI TUJUAN')->getStyle('O4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('P4', 'EVALUASI')->getStyle('P4')->applyFromArray($styleJudulKolom);
        $sheet->getColumnDimension('A')->setWidth(50, 'px');
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setWidth(120, 'px');
        $sheet->getColumnDimension('D')->setWidth(60, 'px');
        $sheet->getColumnDimension('E')->setWidth(150, 'px');
        $sheet->getColumnDimension('F')->setWidth(63, 'px');
        $sheet->getColumnDimension('G')->setWidth(70, 'px');
        $sheet->getColumnDimension('H')->setWidth(63, 'px');
        $sheet->getColumnDimension('K')->setWidth(60, 'px');
        $sheet->getColumnDimension('L')->setWidth(60, 'px');
        $sheet->getColumnDimension('M')->setWidth(200, 'px');
        $sheet->getColumnDimension('N')->setWidth(60, 'px');
        $sheet->getColumnDimension('O')->setWidth(60, 'px');
        $sheet->getColumnDimension('P')->setWidth(400, 'px');
        $sheet->getColumnDimension('I')->setWidth(400, 'px');
        $sheet->getColumnDimension('J')->setWidth(400, 'px');
        $sheet->getStyle("A2")->getAlignment()->setWrapText(true);
        $sheet->getStyle("A4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("B4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("C4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("D4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("E4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("F4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("G4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("H4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("I4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("J4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("K4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("L4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("M4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("N4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("O4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("P4")->getAlignment()->setWrapText(true);


        $column = 5;
        $no = 1;
        foreach ($user as $key => $value) {

            $sheet->setCellValue('A' . $column, ($no))->getStyle('A' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('B' . $column, $value->nip_eval)->getStyle('B' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('C' . $column, $value->nama_eval)->getStyle('C' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('D' . $column, $value->peg_eval)->getStyle('D' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('E' . $column, $value->pendidikan)->getStyle('E' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('F' . $column, setTahun($value->masa_kerja))->getStyle('F' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('G' . $column, setTahun($value->masa_jabatan_terakhir))->getStyle('G' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('H' . $column, $value->pog_saat_ini)->getStyle('H' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('I' . $column, $value->jabatan_lengkap_saat_ini)->getStyle('I' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('J' . $column, $value->proyeksi_jabatan_baru)->getStyle('J' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('K' . $column, $value->pog_baru)->getStyle('K' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('L' . $column, jenisMutasi($value->jenis_mutasi))->getStyle('L' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('M' . $column, dasarmutasi($value->id_dasar_mutasi))->getStyle('M' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('N' . $column, $value->realisasi_ftk_unit_asal . '%')->getStyle('N' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('O' . $column, $value->realisasi_ftk_unit_tujuan . '%')->getStyle('O' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('P' . $column, pegpog($value->text_pegpog) . "" . ftkasal($value->kategori_ftk_asal) . "" . ftktujuan($value->kategori_ftk_tujuan) . "" . masakerja($value->masa_kerja) . "" . masajabakhir($value->masa_jabatan_terakhir, $value->jenjab_eval) . "" . petarisiko($value->text_peta_risk) . "" . sppd($value->text_sppd) . "" . pap($value->text_pap, $value->nama_pap, $value->nip_pap, $value->unit_pap, $value->unit_pelaksana_pap, $value->sub_unit_pap) . "" . sp($value->text_sp, $value->jab_sp, $value->unit_sp, $value->org_sp) . "" . rekanasal($value->text_rekan) . "" . rekantujuan($value->text_rekan_tujuan) . "" . catatan($value->catatan_1, $value->catatan_2, $value->catatan_3) . "" . hasil($value->hasil_evaluasi_akhir, $value->jenis_mutasi))->getStyle('P' . $column)->applyFromArray($styleCell);
            $sheet->getStyle("I$column:J$column")->getAlignment()->setWrapText(true);
            $sheet->getStyle('C' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('F' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('G' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('L' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('P' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('M' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('A' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('D' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('D' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('F' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('F' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('G' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('G' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('H' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('H' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('K' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('K' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('L' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('L' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('N' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('N' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('O' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('O' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $column++;
            $no++;
        }


        $right_sign = $user2->right_sign;
        $left_sign = $user2->left_sign;

        if ($right_sign == "Andrisa") {
            $signrightabove = "MANAGER";
            $signrightbottom = "PENGEMBANGAN TALENTA KANTOR PUSAT";
        } else if ($right_sign == "Diah Dayanti") {
            $signrightabove = "MANAGER";
            $signrightbottom = "PENGEMBANGAN TALENTA AREA HUMAN CAPITAL DAN ANAK PERUSAHAAN";
        } else if ($right_sign == "Gregorius Helmy Widyapamungkas") {
            $signrightabove = "VICE PRESIDENT";
            $signrightbottom = "PENGEMBANGAN TALENTA KORPORAT";
        } else if ($right_sign == "Dedi Budi Utomo") {
            $signrightabove = "EXECUTIVE VICE PRESIDENT";
            $signrightbottom = "PENGEMBANGAN TALENTA";
        }

        if ($left_sign == "Andrisa") {
            $signleftabove = "MANAGER";
            $signleftbottom = "PENGEMBANGAN TALENTA KANTOR PUSAT";
        } else if ($left_sign == "Diah Dayanti") {
            $signleftabove = "MANAGER";
            $signleftbottom = "PENGEMBANGAN TALENTA AREA HUMAN CAPITAL DAN ANAK PERUSAHAAN";
        } else if ($left_sign == "Gregorius Helmy Widyapamungkas") {
            $signleftabove = "VICE PRESIDENT";
            $signleftbottom = "PENGEMBANGAN TALENTA KORPORAT";
        } else if ($left_sign == "Dedi Budi Utomo") {
            $signleftabove = "EXECUTIVE VICE PRESIDENT";
            $signleftbottom = "PENGEMBANGAN TALENTA";
        }


        $endRow = $column + 3;

        $sheet->setCellValue('K' . $endRow, 'Jakarta, ' . date('d', strtotime($user2->tgl_lampeval)) . ' ' . namabulan(date('m', strtotime($user2->tgl_lampeval))) . ' ' . date('Y', strtotime($user2->tgl_lampeval)))->mergeCells('K' . $endRow . ':O' . $endRow . '')->getStyle('K' . $endRow . ':O' . $endRow . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $endRow + 1, $signrightabove)->mergeCells('K' . $endRow + 1 . ':O' . $endRow + 1 . '')->getStyle('K' . $endRow + 1 . ':O' . $endRow + 1 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $endRow + 2, $signrightbottom)->mergeCells('K' . $endRow + 2 . ':O' . $endRow + 2 . '')->getStyle('K' . $endRow + 2 . ':O' . $endRow + 2 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $endRow + 9, strtoupper($user2->right_sign))->mergeCells('K' . $endRow + 9 . ':O' . $endRow + 9 . '')->getStyle('K' . $endRow + 9 . ':O' . $endRow + 9 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $endRow + 1, $signleftabove)->mergeCells('C' . $endRow + 1 . ':H' . $endRow + 1 . '')->getStyle('C' . $endRow + 1 . ':H' . $endRow + 1 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $endRow + 2, $signleftbottom)->mergeCells('C' . $endRow + 2 . ':H' . $endRow + 2 . '')->getStyle('C' . $endRow + 2 . ':H' . $endRow + 2 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $endRow + 9, strtoupper($user2->left_sign))->mergeCells('C' . $endRow + 9 . ':H' . $endRow + 9 . '')->getStyle('C' . $endRow + 9 . ':H' . $endRow + 9 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C' . $endRow + 9)->applyFromArray($styleJudul);
        $sheet->getStyle('C' . $endRow + 1)->applyFromArray($styleJudul);
        $sheet->getStyle('C' . $endRow + 2)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow + 9)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow + 1)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow + 2)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow)->getFont()->setSize(14);
        $sheet->getStyle('C' . $endRow + 9)->getFont()->setSize(14);
        $sheet->getStyle('C' . $endRow + 1)->getFont()->setSize(14);
        $sheet->getStyle('C' . $endRow + 2)->getFont()->setSize(14);
        $sheet->getStyle('K' . $endRow + 9)->getFont()->setSize(14);
        $sheet->getStyle('K' . $endRow + 1)->getFont()->setSize(14);
        $sheet->getStyle('K' . $endRow + 2)->getFont()->setSize(14);
        $sheet->getStyle('A2')->getFont()->setSize(18);
        $spreadsheet->getDefaultStyle()->getFont()->setSize(12);

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Paid');
        $drawing->setDescription('Paid');
        if ($right_sign == "Andrisa") {
            $drawing->setPath('./template/img/logo/td1.png');
        } else if ($right_sign == "Diah Dayanti") {
            $drawing->setPath('./template/img/logo/td2.png');
        } else if ($right_sign == "Gregorius Helmy Widyapamungkas") {
            $drawing->setPath('./template/img/logo/td3.png');
        } else if ($right_sign == "Dedi Budi Utomo") {
            $drawing->setPath('./template/img/logo/td4.png');
        }
        $drawing->setCoordinates('M' . $endRow + 3);
        $drawing->setOffsetX(50);
        $drawing->setOffsetY(5);
        $drawing->setHeight(110);
        $drawing->getShadow()->setVisible(false);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());

        $drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing2->setName('Paid');
        $drawing2->setDescription('Paid');
        if ($left_sign == "Andrisa") {
            $drawing2->setPath('./template/img/logo/td1.png');
        } else if ($left_sign == "Diah Dayanti") {
            $drawing2->setPath('./template/img/logo/td2.png');
        } else if ($left_sign == "Gregorius Helmy Widyapamungkas") {
            $drawing2->setPath('./template/img/logo/td3.png');
        } else if ($left_sign == "Dedi Budi Utomo") {
            $drawing2->setPath('./template/img/logo/td4.png');
        }
        $drawing2->setCoordinates('E' . $endRow + 3);
        $drawing2->setOffsetX(20);
        $drawing2->setOffsetY(5);
        $drawing2->setHeight(110);
        $drawing2->getShadow()->setVisible(false);
        $drawing2->setWorksheet($spreadsheet->getActiveSheet());

        $sheet->getPageSetup()
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()
            ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        $sheet->getPageSetup()->setFitToWidth(1);


        $spreadsheet->getProperties()
            ->setCreator(ucfirst(strtolower(userLogin()->nama_user)))
            ->setLastModifiedBy(ucfirst(strtolower(userLogin()->nama_user)) . ' ' . date('Y-m-d-His'))
            ->setTitle($user2->nomor_lampeval)
            ->setKeywords('generated by: ' . ucfirst(userLogin()->nip))
            ->setCategory("Lampiran Evaluasi");

        $writer = new Xlsx($spreadsheet);
        $filename = $user2->nomor_lampeval . ' ' . date('Y-m-d-His');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function exportba($id)
    {
        // $user = $this->users->getAll();
        // $role_htd = "4";
        // $role_peg = "1";
        // $unit_induk = userLogin()->unit_induk;

        $keyword = $this->request->getGet('keyword');
        $db = \Config\Database::connect();
        $builder    = $db->table('tb_peg_ba');
        $builder->where('id_beritaacara', $id);
        // $builder->where('unit_induk', $unit_induk);
        // $builder->where('role_htd', $role_htd);
        $builder->join('tb_eval_mutasi', 'tb_eval_mutasi.id_eval = tb_peg_ba.id_eval_mutasi');
        // $builder->join('user', 'user.nip = tb_peg_lampeval.nip_lamp');
        // $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        // $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        // $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        $query =  $builder->get();
        $user = $query->getResult();

        $db2 = \Config\Database::connect();
        $builder2    = $db2->table('tb_ba_mutasi');
        $builder2->where('id_ba', $id);
        $query2 =  $builder2->get();
        $user2 = $query2->getRow();



        $judulLampiran = $user2->judul_ba;
        $nomorba = $user2->nomor_ba;

        $styleJudul = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $styleJudulKolom = [
            'alignment' => [
                'vertical'  => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
            'borders'   => [
                'top'   => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $styleCell = [
            'alignment' => [
                'vertical'  => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders'   => [
                'top'   => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        function namabulan($a)
        {
            switch ($a) {
                case '01':
                    return  'Januari';
                case '02':
                    return  'Februari';
                case '03':
                    return  'Maret';
                case '04':
                    return  'April';
                case '05':
                    return  'Mei';
                case '06':
                    return  'Juni';
                case '07':
                    return  'Juli';
                case '08':
                    return  'Agustus';
                case '09':
                    return  'September';
                case '10':
                    return  'Oktober';
                case '11':
                    return  'Nopember';
                case '12':
                    return  'Desember';
            }
        };

        function setTahun($a)
        {
            $sisa_bagi = $a % 12;
            $hsl_bagi = ($a - $sisa_bagi) / 12;
            $hasil = $hsl_bagi . ' Tahun ' . $sisa_bagi . ' Bulan';
            return $hasil;
        };

        function jenisMutasi($a)
        {
            $lolosbutuh = 'Lolos Butuh';
            $aps = 'APS';
            $bursa = 'Bursa';
            $rotasiinternal = 'Rotasi Internal Div';
            $berangkatptb = 'Berangkat PTB';
            $kembaliptb = 'Kembali PTB';
            $promosi = 'Promosi';
            $demosi = 'Demosi';
            $rotasiinternaldir = 'Rotasi Internal Dir';

            if ($a == 1) {
                return $lolosbutuh;
            } else if ($a == 2) {
                return $aps;
            } else if ($a == 3) {
                return $bursa;
            } else if ($a == 4) {
                return $rotasiinternal;
            } else if ($a == 5) {
                return $berangkatptb;
            } else if ($a == 6) {
                return $kembaliptb;
            } else if ($a == 7) {
                return $promosi;
            } else if ($a == 8) {
                return $demosi;
            } else if ($a == 9) {
                return $rotasiinternaldir;
            }
        };

        function pegpog($a)
        {
            $b = "'- PeG Ybs tidak memenuhi pada PoG Proyeksi Jabatan" . "\r\n";
            if ($a == "Memenuhi") {
                return NULL;
            } else {
                return $b;
            }
        };

        function ftkasal($a)
        {
            $b = "'- FTK Unit/Divisi Asal > Rata-Rata FTK Nasional" . "\r\n";
            $c = "'- FTK Unit/Divisi Asal < Rata-Rata FTK Nasional" . "\r\n";
            $d = "'- FTK Unit/Divisi Asal = Rata-Rata FTK Nasional" . "\r\n";
            if ($a == "Lebih") {
                return $b;
            } else if ($a == "Kurang") {
                return $c;
            } else {
                return $d;
            }
        };

        function ftktujuan($a)
        {
            $b = "- FTK Unit/Divisi Tujuan > Rata-Rata FTK Nasional" . "\r\n";
            $c = "- FTK Unit/Divisi Tujuan < Rata-Rata FTK Nasional" . "\r\n";
            $d = "- FTK Unit/Divisi Tujuan = Rata-Rata FTK Nasional" . "\r\n";
            if ($a == "Lebih") {
                return $b;
            } else if ($a == "Kurang") {
                return $c;
            } else {
                return $d;
            }
        };

        function masakerja($a)
        {
            $b = "- Masa Kerja < 7 Tahun, belum menjadi prioritas talent mobility" . "\r\n";
            if ($a > 84) {
                return NULL;
            } else {
                return $b;
            }
        };

        function masajabakhir($a, $b)
        {
            $c = "- Masa Jabatan Terakhir > 6 Bulan (Fungsional)" . "\r\n";
            $d = "- Masa Jabatan Terakhir < 6 Bulan (Fungsional)" . "\r\n";
            $e = "- Masa Jabatan Terakhir = 6 Bulan (Fungsional)" . "\r\n";
            $f = "- Masa Jabatan Terakhir > 1 Tahun (Struktural)" . "\r\n";
            $g = "- Masa Jabatan Terakhir < 1 Tahun (Struktural)" . "\r\n";
            $h = "- Masa Jabatan Terakhir = 1 Tahun (Struktural)" . "\r\n";
            if ($b == "FUNGSIONAL") {
                if ($a > 6) {
                    return $c;
                } else if ($a < 6) {
                    return $d;
                } else {
                    return $e;
                }
            } else {
                if ($a > 12) {
                    return $f;
                } else if ($a < 12) {
                    return $g;
                } else {
                    return $h;
                }
            }
        };

        function petarisiko($a)
        {
            $b = "- Peta Risiko Profesi : " . $a . "\r\n";
            return $b;
        };

        function sppd($a)
        {
            $b = "- Estimasi SPPD : Rp " . $a . "\r\n";
            return $b;
        };

        function pap($a, $b, $c, $d, $e, $f)
        {
            $y = "Pernikahan Antar Pegawai" . "\r\n" . "Nama Pasangan : " . $b . "\r\n" . "NIP Pasangan : " . $c . "\r\n" . "Unit : " . $d . ", " . $e . ", " . $f;
            if ($a == "Memenuhi") {
                return Null;
            } else {
                return $y;
            }
        };

        function sp($a, $c, $d, $e)
        {
            $b = "- Ybs adalah " . $c . " di " . $d . " pada " . $e;
            if ($a == NULL) {
                return NULL;
            } else {
                return $b;
            }
        };

        function rekanasal($a)
        {
            if ($a == null) {
                $b = "- Jumlah FTK pada bagian Ybs : 0" . "\r\n";
            } else {
                $b = "- Jumlah FTK pada bagian Ybs : " . $a . "\r\n";
            }

            return $b;
        };

        function rekantujuan($a)
        {
            if ($a == null) {
                $b = "- Jumlah FTK pada organisasi terkecil di unit/divisi tujuan : 0" . "\r\n";
            } else {
                $b = "- Jumlah FTK pada organisasi terkecil di unit/divisi tujuan : " . $a . "\r\n";
            }

            return $b;
        };

        function catatan($a, $b, $c)
        {
            $y = "\r\n" . "Catatan PIC" . "\r\n" . $a . "\r\n" . "Catatan MSB" . "\r\n" . $b . "\r\n" . "Catatan VP" . "\r\n" . $c . "\r\n";
            return $y;
        };

        function hasil($a, $b)
        {
            $x = "\r\n" . "HASIL EVALUASI : BELUM DAPAT DITINDAKLANJUTI";
            $y = "\r\n" . "HASIL EVALUASI : DAPAT DITINDAKLANJUTI, CETAK SK PER";
            $z = "\r\n" . "HASIL EVALUASI : DAPAT DITINDAKLANJUTI," . "\r\n" . "Proses Lolos Butuh ke HTD Area Asal oleh DIV HTD Kantor Pusat" . "\r\n";

            if ($a == 1) {
                if ($b == 4) {
                    return $y;
                } else {
                    return $z;
                }
            } else {
                return $x;
            }
        };

        function dasarmutasi($a)
        {
            $db3 = \Config\Database::connect();
            $builder3    = $db3->table('tb_dasar_mutasi');
            $builder3->where('id_dm', $a);
            $query3 =  $builder3->get();
            $user3 = $query3->getRow();

            $b = $user3->no_dm . "\r\n" . "tanggal " . $user3->tgl_dm . " Perihal " . $user3->perihal_dm;

            return $b;
        };

        function balasan($a)
        {
            $db4 = \Config\Database::connect();
            $builder4    = $db4->table('tb_nd_balasan');
            $builder4->where('id_balasan', $a);
            $query4 =  $builder4->get();
            $user4 = $query4->getRow();

            if ($user4->id_balasan == null) {
                $b = "";
            } else {
                $b = "\r\n" . $user4->no_balasan . "\r\n" . "tanggal " . $user4->tgl_balasan . " Perihal " . $user4->perihal_balasan;
            };

            return $b;
        };

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', strtoupper($judulLampiran))->mergeCells('A2:P2')->getStyle('A2:P2')->applyFromArray($styleJudul); // judul lampiran dibuat dinamic by isian
        $sheet->setCellValue('A3', strtoupper($nomorba))->mergeCells('A3:P3')->getStyle('A3:P3')->applyFromArray($styleJudul); // judul lampiran dibuat dinamic by isian
        $sheet->setCellValue('A5', 'NO')->getStyle('A5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('B5', 'NIP')->getStyle('B5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('C5', 'NAMA')->getStyle('C5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('D5', 'PEG')->getStyle('D5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('E5', 'PENDIDIKAN')->getStyle('E5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('F5', 'MASA KERJA')->getStyle('F5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('G5', 'MASA JABATAN TERAKHIR')->getStyle('G5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('H5', 'POG LAMA')->getStyle('H5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('I5', 'JABATAN SAAT INI')->getStyle('I5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('J5', 'PROYEKSI JABATAN BARU')->getStyle('J5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('K5', 'POG BARU')->getStyle('K5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('L5', 'JENIS MUTASI')->getStyle('L5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('M5', 'DASAR/REKOMENDASI MUTASI')->getStyle('M5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('N5', 'FTK UNIT/DIVISI ASAL')->getStyle('N5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('O5', 'FTK UNIT/DIVISI TUJUAN')->getStyle('O5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('P5', 'EVALUASI')->getStyle('P5')->applyFromArray($styleJudulKolom);
        $sheet->getColumnDimension('A')->setWidth(50, 'px');
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setWidth(120, 'px');
        $sheet->getColumnDimension('D')->setWidth(60, 'px');
        $sheet->getColumnDimension('E')->setWidth(150, 'px');
        $sheet->getColumnDimension('F')->setWidth(63, 'px');
        $sheet->getColumnDimension('G')->setWidth(70, 'px');
        $sheet->getColumnDimension('H')->setWidth(63, 'px');
        $sheet->getColumnDimension('K')->setWidth(60, 'px');
        $sheet->getColumnDimension('L')->setWidth(60, 'px');
        $sheet->getColumnDimension('M')->setWidth(200, 'px');
        $sheet->getColumnDimension('N')->setWidth(60, 'px');
        $sheet->getColumnDimension('O')->setWidth(60, 'px');
        $sheet->getColumnDimension('P')->setWidth(400, 'px');
        $sheet->getColumnDimension('I')->setWidth(400, 'px');
        $sheet->getColumnDimension('J')->setWidth(400, 'px');
        $sheet->getStyle("A2")->getAlignment()->setWrapText(true);
        $sheet->getStyle("A3")->getAlignment()->setWrapText(true);
        $sheet->getStyle("A5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("B5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("C5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("D5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("E5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("F5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("G5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("H5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("I5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("J5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("K5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("L5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("M5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("N5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("O5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("P5")->getAlignment()->setWrapText(true);


        $column = 6;
        $no = 1;
        foreach ($user as $key => $value) {

            $sheet->setCellValue('A' . $column, ($no))->getStyle('A' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('B' . $column, $value->nip_eval)->getStyle('B' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('C' . $column, $value->nama_eval)->getStyle('C' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('D' . $column, $value->peg_eval)->getStyle('D' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('E' . $column, $value->pendidikan)->getStyle('E' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('F' . $column, setTahun($value->masa_kerja))->getStyle('F' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('G' . $column, setTahun($value->masa_jabatan_terakhir))->getStyle('G' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('H' . $column, $value->pog_saat_ini)->getStyle('H' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('I' . $column, $value->jabatan_lengkap_saat_ini)->getStyle('I' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('J' . $column, $value->proyeksi_jabatan_baru)->getStyle('J' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('K' . $column, $value->pog_baru)->getStyle('K' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('L' . $column, jenisMutasi($value->jenis_mutasi))->getStyle('L' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('M' . $column, dasarmutasi($value->id_dasar_mutasi) . "\r\n" . balasan($value->id_nd_balasan))->getStyle('M' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('N' . $column, $value->realisasi_ftk_unit_asal . '%')->getStyle('N' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('O' . $column, $value->realisasi_ftk_unit_tujuan . '%')->getStyle('O' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('P' . $column, pegpog($value->text_pegpog) . "" . ftkasal($value->kategori_ftk_asal) . "" . ftktujuan($value->kategori_ftk_tujuan) . "" . masakerja($value->masa_kerja) . "" . masajabakhir($value->masa_jabatan_terakhir, $value->jenjab_eval) . "" . petarisiko($value->text_peta_risk) . "" . sppd($value->text_sppd) . "" . pap($value->text_pap, $value->nama_pap, $value->nip_pap, $value->unit_pap, $value->unit_pelaksana_pap, $value->sub_unit_pap) . "" . sp($value->text_sp, $value->jab_sp, $value->unit_sp, $value->org_sp) . "" . rekanasal($value->text_rekan) . "" . rekantujuan($value->text_rekan_tujuan) . "" . catatan($value->catatan_1, $value->catatan_2, $value->catatan_3) . "" . hasil($value->hasil_evaluasi_akhir, $value->jenis_mutasi))->getStyle('P' . $column)->applyFromArray($styleCell);
            $sheet->getStyle("I$column:J$column")->getAlignment()->setWrapText(true);
            $sheet->getStyle('C' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('F' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('G' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('L' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('P' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('M' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('A' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('D' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('D' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('F' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('F' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('G' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('G' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('H' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('H' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('K' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('K' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('L' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('L' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('N' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('N' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('O' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('O' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $column++;
            $no++;
        }


        $right_sign = $user2->right_sign_ba;
        $left_sign = $user2->left_sign_ba;

        if ($right_sign == "Andrisa") {
            $signrightabove = "MANAGER";
            $signrightbottom = "PENGEMBANGAN TALENTA KANTOR PUSAT";
        } else if ($right_sign == "Diah Dayanti") {
            $signrightabove = "MANAGER";
            $signrightbottom = "PENGEMBANGAN TALENTA AREA HUMAN CAPITAL DAN ANAK PERUSAHAAN";
        } else if ($right_sign == "Gregorius Helmy Widyapamungkas") {
            $signrightabove = "VICE PRESIDENT";
            $signrightbottom = "PENGEMBANGAN TALENTA KORPORAT";
        } else if ($right_sign == "Dedi Budi Utomo") {
            $signrightabove = "EXECUTIVE VICE PRESIDENT";
            $signrightbottom = "PENGEMBANGAN TALENTA";
        }

        if ($left_sign == "Andrisa") {
            $signleftabove = "MANAGER";
            $signleftbottom = "PENGEMBANGAN TALENTA KANTOR PUSAT";
        } else if ($left_sign == "Diah Dayanti") {
            $signleftabove = "MANAGER";
            $signleftbottom = "PENGEMBANGAN TALENTA AREA HUMAN CAPITAL DAN ANAK PERUSAHAAN";
        } else if ($left_sign == "Gregorius Helmy Widyapamungkas") {
            $signleftabove = "VICE PRESIDENT";
            $signleftbottom = "PENGEMBANGAN TALENTA KORPORAT";
        } else if ($left_sign == "Dedi Budi Utomo") {
            $signleftabove = "EXECUTIVE VICE PRESIDENT";
            $signleftbottom = "PENGEMBANGAN TALENTA";
        }


        $endRow = $column + 3;

        $sheet->setCellValue('K' . $endRow, 'Jakarta, ' . date('d', strtotime($user2->tgl_ba)) . ' ' . namabulan(date('m', strtotime($user2->tgl_ba))) . ' ' . date('Y', strtotime($user2->tgl_ba)))->mergeCells('K' . $endRow . ':O' . $endRow . '')->getStyle('K' . $endRow . ':O' . $endRow . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $endRow + 1, $signrightabove)->mergeCells('K' . $endRow + 1 . ':O' . $endRow + 1 . '')->getStyle('K' . $endRow + 1 . ':O' . $endRow + 1 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $endRow + 2, $signrightbottom)->mergeCells('K' . $endRow + 2 . ':O' . $endRow + 2 . '')->getStyle('K' . $endRow + 2 . ':O' . $endRow + 2 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $endRow + 9, strtoupper($user2->right_sign_ba))->mergeCells('K' . $endRow + 9 . ':O' . $endRow + 9 . '')->getStyle('K' . $endRow + 9 . ':O' . $endRow + 9 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $endRow + 1, $signleftabove)->mergeCells('C' . $endRow + 1 . ':H' . $endRow + 1 . '')->getStyle('C' . $endRow + 1 . ':H' . $endRow + 1 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $endRow + 2, $signleftbottom)->mergeCells('C' . $endRow + 2 . ':H' . $endRow + 2 . '')->getStyle('C' . $endRow + 2 . ':H' . $endRow + 2 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $endRow + 9, strtoupper($user2->left_sign_ba))->mergeCells('C' . $endRow + 9 . ':H' . $endRow + 9 . '')->getStyle('C' . $endRow + 9 . ':H' . $endRow + 9 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C' . $endRow + 9)->applyFromArray($styleJudul);
        $sheet->getStyle('C' . $endRow + 1)->applyFromArray($styleJudul);
        $sheet->getStyle('C' . $endRow + 2)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow + 9)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow + 1)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow + 2)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow)->getFont()->setSize(14);
        $sheet->getStyle('C' . $endRow + 9)->getFont()->setSize(14);
        $sheet->getStyle('C' . $endRow + 1)->getFont()->setSize(14);
        $sheet->getStyle('C' . $endRow + 2)->getFont()->setSize(14);
        $sheet->getStyle('K' . $endRow + 9)->getFont()->setSize(14);
        $sheet->getStyle('K' . $endRow + 1)->getFont()->setSize(14);
        $sheet->getStyle('K' . $endRow + 2)->getFont()->setSize(14);
        $sheet->getStyle('A2')->getFont()->setSize(18);
        $spreadsheet->getDefaultStyle()->getFont()->setSize(12);



        $sheet->getPageSetup()
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()
            ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        $sheet->getPageSetup()->setFitToWidth(1);


        $spreadsheet->getProperties()
            ->setCreator(ucfirst(strtolower(userLogin()->nama_user)))
            ->setLastModifiedBy(ucfirst(strtolower(userLogin()->nama_user)) . ' ' . date('Y-m-d-His'))
            ->setTitle($user2->nomor_ba)
            ->setKeywords('generated by: ' . ucfirst(userLogin()->nip))
            ->setCategory("Lampiran Evaluasi");

        $writer = new Xlsx($spreadsheet);
        $filename = $user2->nomor_ba . ' ' . date('Y-m-d-His');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function exportreq($id)
    {
        // $user = $this->users->getAll();
        // $role_htd = "4";
        // $role_peg = "1";
        // $unit_induk = userLogin()->unit_induk;

        $keyword = $this->request->getGet('keyword');
        $db = \Config\Database::connect();
        $builder    = $db->table('tb_peg_req');
        $builder->where('id_data_req', $id);
        // $builder->where('unit_induk', $unit_induk);
        // $builder->where('role_htd', $role_htd);
        $builder->join('tb_eval_mutasi', 'tb_eval_mutasi.id_eval = tb_peg_req.id_eval_mutasi');
        // $builder->join('user', 'user.nip = tb_peg_lampeval.nip_lamp');
        // $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        // $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        // $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        $query =  $builder->get();
        $user = $query->getResult();

        $db2 = \Config\Database::connect();
        $builder2    = $db2->table('tb_reqkodpos');
        $builder2->where('id_req', $id);
        $query2 =  $builder2->get();
        $user2 = $query2->getRow();



        $judulLampiran = $user2->judul_req;
        $nomorba = $user2->nomor_req;

        $styleJudul = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $styleJudulKolom = [
            'alignment' => [
                'vertical'  => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
            'borders'   => [
                'top'   => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $styleCell = [
            'alignment' => [
                'vertical'  => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders'   => [
                'top'   => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        function namabulan($a)
        {
            switch ($a) {
                case '01':
                    return  'Januari';
                case '02':
                    return  'Februari';
                case '03':
                    return  'Maret';
                case '04':
                    return  'April';
                case '05':
                    return  'Mei';
                case '06':
                    return  'Juni';
                case '07':
                    return  'Juli';
                case '08':
                    return  'Agustus';
                case '09':
                    return  'September';
                case '10':
                    return  'Oktober';
                case '11':
                    return  'Nopember';
                case '12':
                    return  'Desember';
            }
        };

        function setTahun($a)
        {
            $sisa_bagi = $a % 12;
            $hsl_bagi = ($a - $sisa_bagi) / 12;
            $hasil = $hsl_bagi . ' Tahun ' . $sisa_bagi . ' Bulan';
            return $hasil;
        };

        function jenisMutasi($a)
        {
            $lolosbutuh = 'Lolos Butuh';
            $aps = 'APS';
            $bursa = 'Bursa';
            $rotasiinternal = 'Rotasi Internal Div';
            $berangkatptb = 'Berangkat PTB';
            $kembaliptb = 'Kembali PTB';
            $promosi = 'Promosi';
            $demosi = 'Demosi';
            $rotasiinternaldir = 'Rotasi Internal Dir';

            if ($a == 1) {
                return $lolosbutuh;
            } else if ($a == 2) {
                return $aps;
            } else if ($a == 3) {
                return $bursa;
            } else if ($a == 4) {
                return $rotasiinternal;
            } else if ($a == 5) {
                return $berangkatptb;
            } else if ($a == 6) {
                return $kembaliptb;
            } else if ($a == 7) {
                return $promosi;
            } else if ($a == 8) {
                return $demosi;
            } else if ($a == 9) {
                return $rotasiinternaldir;
            }
        };

        function pegpog($a)
        {
            $b = "'- PeG Ybs tidak memenuhi pada PoG Proyeksi Jabatan" . "\r\n";
            if ($a == "Memenuhi") {
                return NULL;
            } else {
                return $b;
            }
        };

        function ftkasal($a)
        {
            $b = "'- FTK Unit/Divisi Asal > Rata-Rata FTK Nasional" . "\r\n";
            $c = "'- FTK Unit/Divisi Asal < Rata-Rata FTK Nasional" . "\r\n";
            $d = "'- FTK Unit/Divisi Asal = Rata-Rata FTK Nasional" . "\r\n";
            if ($a == "Lebih") {
                return $b;
            } else if ($a == "Kurang") {
                return $c;
            } else {
                return $d;
            }
        };

        function ftktujuan($a)
        {
            $b = "- FTK Unit/Divisi Tujuan > Rata-Rata FTK Nasional" . "\r\n";
            $c = "- FTK Unit/Divisi Tujuan < Rata-Rata FTK Nasional" . "\r\n";
            $d = "- FTK Unit/Divisi Tujuan = Rata-Rata FTK Nasional" . "\r\n";
            if ($a == "Lebih") {
                return $b;
            } else if ($a == "Kurang") {
                return $c;
            } else {
                return $d;
            }
        };

        function masakerja($a)
        {
            $b = "- Masa Kerja < 7 Tahun, belum menjadi prioritas talent mobility" . "\r\n";
            if ($a > 84) {
                return NULL;
            } else {
                return $b;
            }
        };

        function masajabakhir($a, $b)
        {
            $c = "- Masa Jabatan Terakhir > 6 Bulan (Fungsional)" . "\r\n";
            $d = "- Masa Jabatan Terakhir < 6 Bulan (Fungsional)" . "\r\n";
            $e = "- Masa Jabatan Terakhir = 6 Bulan (Fungsional)" . "\r\n";
            $f = "- Masa Jabatan Terakhir > 1 Tahun (Struktural)" . "\r\n";
            $g = "- Masa Jabatan Terakhir < 1 Tahun (Struktural)" . "\r\n";
            $h = "- Masa Jabatan Terakhir = 1 Tahun (Struktural)" . "\r\n";
            if ($b == "FUNGSIONAL") {
                if ($a > 6) {
                    return $c;
                } else if ($a < 6) {
                    return $d;
                } else {
                    return $e;
                }
            } else {
                if ($a > 12) {
                    return $f;
                } else if ($a < 12) {
                    return $g;
                } else {
                    return $h;
                }
            }
        };

        function petarisiko($a)
        {
            $b = "- Peta Risiko Profesi : " . $a . "\r\n";
            return $b;
        };

        function sppd($a)
        {
            $b = "- Estimasi SPPD : Rp " . $a . "\r\n";
            return $b;
        };

        function pap($a, $b, $c, $d, $e, $f)
        {
            $y = "Pernikahan Antar Pegawai" . "\r\n" . "Nama Pasangan : " . $b . "\r\n" . "NIP Pasangan : " . $c . "\r\n" . "Unit : " . $d . ", " . $e . ", " . $f;
            if ($a == "Memenuhi") {
                return Null;
            } else {
                return $y;
            }
        };

        function sp($a, $c, $d, $e)
        {
            $b = "- Ybs adalah " . $c . " di " . $d . " pada " . $e;
            if ($a == NULL) {
                return NULL;
            } else {
                return $b;
            }
        };

        function rekanasal($a)
        {
            if ($a == null) {
                $b = "- Jumlah FTK pada bagian Ybs : 0" . "\r\n";
            } else {
                $b = "- Jumlah FTK pada bagian Ybs : " . $a . "\r\n";
            }

            return $b;
        };

        function rekantujuan($a)
        {
            if ($a == null) {
                $b = "- Jumlah FTK pada organisasi terkecil di unit/divisi tujuan : 0" . "\r\n";
            } else {
                $b = "- Jumlah FTK pada organisasi terkecil di unit/divisi tujuan : " . $a . "\r\n";
            }

            return $b;
        };

        function catatan($a, $b, $c)
        {
            $y = "\r\n" . "Catatan PIC" . "\r\n" . $a . "\r\n" . "Catatan MSB" . "\r\n" . $b . "\r\n" . "Catatan VP" . "\r\n" . $c . "\r\n";
            return $y;
        };

        function hasil($a, $b)
        {
            $x = "\r\n" . "HASIL EVALUASI : BELUM DAPAT DITINDAKLANJUTI";
            $y = "\r\n" . "HASIL EVALUASI : DAPAT DITINDAKLANJUTI, CETAK SK PER";
            $z = "\r\n" . "HASIL EVALUASI : DAPAT DITINDAKLANJUTI," . "\r\n" . "Proses Lolos Butuh ke HTD Area Asal oleh DIV HTD Kantor Pusat" . "\r\n";

            if ($a == 1) {
                if ($b == 4) {
                    return $y;
                } else {
                    return $z;
                }
            } else {
                return $x;
            }
        };

        function dasarmutasi($a)
        {
            $db3 = \Config\Database::connect();
            $builder3    = $db3->table('tb_dasar_mutasi');
            $builder3->where('id_dm', $a);
            $query3 =  $builder3->get();
            $user3 = $query3->getRow();

            $b = $user3->no_dm . "\r\n" . "tanggal " . $user3->tgl_dm . " Perihal " . $user3->perihal_dm;

            return $b;
        };

        function balasan($a)
        {
            $db4 = \Config\Database::connect();
            $builder4    = $db4->table('tb_nd_balasan');
            $builder4->where('id_balasan', $a);
            $query4 =  $builder4->get();
            $user4 = $query4->getRow();

            if ($user4->id_balasan == null) {
                $b = "";
            } else {
                $b = "\r\n" . $user4->no_balasan . "\r\n" . "tanggal " . $user4->tgl_balasan . " Perihal " . $user4->perihal_balasan;
            };

            return $b;
        };

        function getkodeposisilama($a)
        {
            $db = \Config\Database::connect();
            $builder    = $db->table('user');
            $builder->where('nip', $a);
            $query =  $builder->get();
            $u = $query->getRow();

            $b = $u->kd_posisi;
            return $b;
        };

        function getorglama($a)
        {
            $db = \Config\Database::connect();
            $builder    = $db->table('user');
            $builder->where('nip', $a);
            $query =  $builder->get();
            $u = $query->getRow();


            $tx9 = $u->tx_org_09;
            $tx8 = $u->tx_org_08;
            $tx7 = $u->tx_org_07;
            $tx6 = $u->tx_org_06;
            $tx4 = $u->tx_org_04;
            $tx3 = $u->tx_org_03;
            $tx2 = $u->tx_org_02;
            $b = $tx9 . " " . $tx8 . " " . $tx7 . " " . $tx6 . " " . $tx4 . " " . $tx3 . " " . $tx2;

            return $b;
        };

        function getkodeorglama($a)
        {
            $db = \Config\Database::connect();
            $builder    = $db->table('user');
            $builder->where('nip', $a);
            $query =  $builder->get();
            $u = $query->getRow();

            $b = $u->kode_org_unit;
            return $b;
        };

        function getnamaorgbaru($a)
        {
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('id_eval', $a);
            $query =  $builder->get();
            $u = $query->getRow();

            $b = explode("pada", $u->proyeksi_jabatan_baru);

            return $b[1];
        };

        function getnamaposbaru($a)
        {
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('id_eval', $a);
            $query =  $builder->get();
            $u = $query->getRow();

            $b = explode("pada", $u->proyeksi_jabatan_baru);

            return $b[0];
        };

        function unittujuan($a)
        {
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_eval_mutasi');
            $builder->where('id_eval', $a);
            $query =  $builder->get();
            $u = $query->getRow();

            if ($u->unit_tujuan == 1000) {
                $b = $u->div_tujuan;
            };

            return $b;
        };

        function nomorsk($a)
        {
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_sk_mutasi');
            $builder->where('id_sk', $a);
            $query =  $builder->get();
            $u = $query->getRow();
            $c = "";
            if ($u->nomor_sk == null) {
                return $c;
            } else {
                return $u->nomor_sk;
            }
        };

        function tglsk($a)
        {
            $db = \Config\Database::connect();
            $builder    = $db->table('tb_sk_mutasi');
            $builder->where('id_sk', $a);
            $query =  $builder->get();
            $u = $query->getRow();
            $b = $u->tgl_sk;

            return $b;
        };

        function getpic($a)
        {
            $db = \Config\Database::connect();
            $builder    = $db->table('user');
            $builder->where('nip', $a);
            $query =  $builder->get();
            $u = $query->getRow();
            $b = $u->nama_user;

            return $b;
        };

        function getsppd($a)
        {
            $b = "YES";
            $c = "NO";

            if ($a == "Not") {
                return $c;
            } else {
                return $b;
            }
        };

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', strtoupper($judulLampiran))->mergeCells('A2:Z2')->getStyle('A2:P2')->applyFromArray($styleJudul); // judul lampiran dibuat dinamic by isian
        // $sheet->setCellValue('A3', strtoupper($nomorba))->mergeCells('A3:P3')->getStyle('A3:P3')->applyFromArray($styleJudul); // judul lampiran dibuat dinamic by isian
        $sheet->setCellValue('A5', 'NO')->getStyle('A5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('B5', 'NIP')->getStyle('B5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('C5', 'NAMA')->getStyle('C5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('D5', 'PEG')->getStyle('D5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('E5', 'KODE POSISI LAMA')->getStyle('E5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('F5', 'NAMA POSISI LAMA')->getStyle('F5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('G5', 'NAMA ORGANISASI LAMA')->getStyle('G5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('H5', 'KODE ORGANISASI LAMA')->getStyle('H5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('I5', 'NAMA POSISI BARU')->getStyle('I5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('J5', 'NAMA ORGANISASI BARU')->getStyle('J5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('K5', 'POG BARU')->getStyle('K5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('L5', 'POG SEBELUMNYA')->getStyle('L5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('M5', 'KODE ORGANISASI BARU')->getStyle('M5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('N5', 'TANGGAL AKTIVASI')->getStyle('N5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('O5', 'KETERANGAN')->getStyle('O5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('P5', 'KODE JOB')->getStyle('P5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('Q5', 'KODE POSISI BARU (AKAN DIISI OM ADMIN PUSAT)')->getStyle('Q5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('R5', 'UNIT ASAL')->getStyle('R5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('S5', 'UNIT TUJUAN')->getStyle('S5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('T5', 'PLT')->getStyle('T5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('U5', 'NOMOR SK')->getStyle('U5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('V5', 'TANGGAL SK')->getStyle('V5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('W5', 'STG')->getStyle('W5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('X5', 'TGL STG')->getStyle('X5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('Y5', 'SPPD (YES/NO)')->getStyle('Y5')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('Z5', 'PIC')->getStyle('Z5')->applyFromArray($styleJudulKolom);
        $sheet->getColumnDimension('A')->setWidth(50, 'px');
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setWidth(120, 'px');
        $sheet->getColumnDimension('D')->setWidth(60, 'px');
        $sheet->getColumnDimension('E')->setWidth(80, 'px');
        $sheet->getColumnDimension('F')->setWidth(150, 'px');
        $sheet->getColumnDimension('G')->setWidth(150, 'px');
        $sheet->getColumnDimension('H')->setWidth(80, 'px');
        $sheet->getColumnDimension('I')->setWidth(150, 'px');
        $sheet->getColumnDimension('J')->setWidth(150, 'px');
        $sheet->getColumnDimension('K')->setWidth(60, 'px');
        $sheet->getColumnDimension('L')->setWidth(60, 'px');
        $sheet->getColumnDimension('M')->setWidth(80, 'px');
        $sheet->getColumnDimension('N')->setWidth(80, 'px');
        $sheet->getColumnDimension('O')->setWidth(150, 'px');
        $sheet->getColumnDimension('P')->setWidth(80, 'px');
        $sheet->getColumnDimension('Q')->setWidth(80, 'px');
        $sheet->getColumnDimension('R')->setWidth(80, 'px');
        $sheet->getColumnDimension('S')->setWidth(80, 'px');
        $sheet->getColumnDimension('T')->setWidth(80, 'px');
        $sheet->getColumnDimension('U')->setWidth(100, 'px');
        $sheet->getColumnDimension('V')->setWidth(80, 'px');
        $sheet->getColumnDimension('W')->setWidth(80, 'px');
        $sheet->getColumnDimension('X')->setWidth(80, 'px');
        $sheet->getColumnDimension('Y')->setWidth(80, 'px');
        $sheet->getColumnDimension('Z')->setWidth(150, 'px');
        $sheet->getStyle("A2")->getAlignment()->setWrapText(true);
        // $sheet->getStyle("A3")->getAlignment()->setWrapText(true);
        $sheet->getStyle("A5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("B5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("C5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("D5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("E5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("F5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("G5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("H5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("I5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("J5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("K5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("L5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("M5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("N5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("O5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("P5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("Q5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("R5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("S5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("T5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("U5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("V5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("W5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("X5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("Y5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("Z5")->getAlignment()->setWrapText(true);


        $column = 6;
        $no = 1;
        foreach ($user as $key => $value) {

            $sheet->setCellValue('A' . $column, ($no))->getStyle('A' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('B' . $column, $value->nip_eval)->getStyle('B' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('C' . $column, $value->nama_eval)->getStyle('C' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('D' . $column, $value->peg_eval)->getStyle('D' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('E' . $column, getkodeposisilama($value->nip_eval))->getStyle('E' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('F' . $column, $value->jabatan_saat_ini)->getStyle('F' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('G' . $column, getorglama($value->nip_eval))->getStyle('G' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('H' . $column, getkodeorglama($value->nip_eval))->getStyle('H' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('I' . $column, getnamaposbaru($value->id_eval))->getStyle('I' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('J' . $column, getnamaorgbaru($value->id_eval))->getStyle('J' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('K' . $column, $value->pog_baru)->getStyle('K' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('L' . $column, $value->pog_saat_ini)->getStyle('L' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('M' . $column, "")->getStyle('M' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('N' . $column, "")->getStyle('N' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('O' . $column, jenisMutasi($value->jenis_mutasi))->getStyle('O' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('P' . $column, "")->getStyle('P' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('Q' . $column, "")->getStyle('Q' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('R' . $column, $value->unit_asal)->getStyle('R' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('S' . $column, unittujuan($value->id_eval))->getStyle('S' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('T' . $column, "")->getStyle('T' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('U' . $column, nomorsk($value->id_sk_mutasi))->getStyle('U' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('V' . $column, tglsk($value->id_sk_mutasi))->getStyle('V' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('W' . $column, "")->getStyle('W' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('X' . $column, "")->getStyle('X' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('Y' . $column, getsppd($value->notif_sppd))->getStyle('Y' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('Z' . $column, getpic($value->dientry_oleh))->getStyle('Z' . $column)->applyFromArray($styleCell);

            $sheet->getStyle("I$column:J$column")->getAlignment()->setWrapText(true);
            $sheet->getStyle('C' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('F' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('G' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('L' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('P' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('M' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('Z' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('R' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('A' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('D' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('D' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('F' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('F' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('G' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('G' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('H' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('I' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('I' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('H' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('K' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('K' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('L' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('L' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('N' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('N' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('O' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('O' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $column++;
            $no++;
        }


        // $right_sign = $user2->right_sign_req;
        // $left_sign = $user2->left_sign_req;

        // if ($right_sign == "Andrisa") {
        //     $signrightabove = "MANAGER";
        //     $signrightbottom = "PENGEMBANGAN TALENTA KANTOR PUSAT";
        // } else if ($right_sign == "Diah Dayanti") {
        //     $signrightabove = "MANAGER";
        //     $signrightbottom = "PENGEMBANGAN TALENTA AREA HUMAN CAPITAL DAN ANAK PERUSAHAAN";
        // } else if ($right_sign == "Gregorius Helmy Widyapamungkas") {
        //     $signrightabove = "VICE PRESIDENT";
        //     $signrightbottom = "PENGEMBANGAN TALENTA KORPORAT";
        // } else if ($right_sign == "Dedi Budi Utomo") {
        //     $signrightabove = "EXECUTIVE VICE PRESIDENT";
        //     $signrightbottom = "PENGEMBANGAN TALENTA";
        // }

        // if ($left_sign == "Andrisa") {
        //     $signleftabove = "MANAGER";
        //     $signleftbottom = "PENGEMBANGAN TALENTA KANTOR PUSAT";
        // } else if ($left_sign == "Diah Dayanti") {
        //     $signleftabove = "MANAGER";
        //     $signleftbottom = "PENGEMBANGAN TALENTA AREA HUMAN CAPITAL DAN ANAK PERUSAHAAN";
        // } else if ($left_sign == "Gregorius Helmy Widyapamungkas") {
        //     $signleftabove = "VICE PRESIDENT";
        //     $signleftbottom = "PENGEMBANGAN TALENTA KORPORAT";
        // } else if ($left_sign == "Dedi Budi Utomo") {
        //     $signleftabove = "EXECUTIVE VICE PRESIDENT";
        //     $signleftbottom = "PENGEMBANGAN TALENTA";
        // }


        // $endRow = $column + 3;

        // $sheet->setCellValue('K' . $endRow, 'Jakarta, ' . date('d', strtotime($user2->tgl_req)) . ' ' . namabulan(date('m', strtotime($user2->tgl_req))) . ' ' . date('Y', strtotime($user2->tgl_req)))->mergeCells('K' . $endRow . ':O' . $endRow . '')->getStyle('K' . $endRow . ':O' . $endRow . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $sheet->setCellValue('K' . $endRow + 1, $signrightabove)->mergeCells('K' . $endRow + 1 . ':O' . $endRow + 1 . '')->getStyle('K' . $endRow + 1 . ':O' . $endRow + 1 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $sheet->setCellValue('K' . $endRow + 2, $signrightbottom)->mergeCells('K' . $endRow + 2 . ':O' . $endRow + 2 . '')->getStyle('K' . $endRow + 2 . ':O' . $endRow + 2 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $sheet->setCellValue('K' . $endRow + 9, strtoupper($user2->right_sign_req))->mergeCells('K' . $endRow + 9 . ':O' . $endRow + 9 . '')->getStyle('K' . $endRow + 9 . ':O' . $endRow + 9 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $sheet->setCellValue('C' . $endRow + 1, $signleftabove)->mergeCells('C' . $endRow + 1 . ':H' . $endRow + 1 . '')->getStyle('C' . $endRow + 1 . ':H' . $endRow + 1 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $sheet->setCellValue('C' . $endRow + 2, $signleftbottom)->mergeCells('C' . $endRow + 2 . ':H' . $endRow + 2 . '')->getStyle('C' . $endRow + 2 . ':H' . $endRow + 2 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $sheet->setCellValue('C' . $endRow + 9, strtoupper($user2->left_sign_req))->mergeCells('C' . $endRow + 9 . ':H' . $endRow + 9 . '')->getStyle('C' . $endRow + 9 . ':H' . $endRow + 9 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $sheet->getStyle('C' . $endRow + 9)->applyFromArray($styleJudul);
        // $sheet->getStyle('C' . $endRow + 1)->applyFromArray($styleJudul);
        // $sheet->getStyle('C' . $endRow + 2)->applyFromArray($styleJudul);
        // $sheet->getStyle('K' . $endRow + 9)->applyFromArray($styleJudul);
        // $sheet->getStyle('K' . $endRow + 1)->applyFromArray($styleJudul);
        // $sheet->getStyle('K' . $endRow + 2)->applyFromArray($styleJudul);
        // $sheet->getStyle('K' . $endRow)->getFont()->setSize(14);
        // $sheet->getStyle('C' . $endRow + 9)->getFont()->setSize(14);
        // $sheet->getStyle('C' . $endRow + 1)->getFont()->setSize(14);
        // $sheet->getStyle('C' . $endRow + 2)->getFont()->setSize(14);
        // $sheet->getStyle('K' . $endRow + 9)->getFont()->setSize(14);
        // $sheet->getStyle('K' . $endRow + 1)->getFont()->setSize(14);
        // $sheet->getStyle('K' . $endRow + 2)->getFont()->setSize(14);
        $sheet->getStyle('A2')->getFont()->setSize(18);
        $spreadsheet->getDefaultStyle()->getFont()->setSize(12);



        $sheet->getPageSetup()
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()
            ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        $sheet->getPageSetup()->setFitToWidth(1);


        $spreadsheet->getProperties()
            ->setCreator(ucfirst(strtolower(userLogin()->nama_user)))
            ->setLastModifiedBy(ucfirst(strtolower(userLogin()->nama_user)) . ' ' . date('Y-m-d-His'))
            ->setTitle($user2->judul_req)
            ->setKeywords('generated by: ' . ucfirst(userLogin()->nip))
            ->setCategory("Lampiran Evaluasi");

        $writer = new Xlsx($spreadsheet);
        $filename = $user2->judul_req . ' ' . date('Y-m-d-His');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function exportpdf($id)
    {
        // $user = $this->users->getAll();
        // $role_htd = "4";
        // $role_peg = "1";
        // $unit_induk = userLogin()->unit_induk;

        $keyword = $this->request->getGet('keyword');
        $db = \Config\Database::connect();
        $builder    = $db->table('tb_peg_lampeval');
        $builder->where('id_lampeval', $id);
        // $builder->where('unit_induk', $unit_induk);
        // $builder->where('role_htd', $role_htd);
        $builder->join('tb_eval_mutasi', 'tb_eval_mutasi.id_eval = tb_peg_lampeval.id_eval_mutasi');
        // $builder->join('user', 'user.nip = tb_peg_lampeval.nip_lamp');
        // $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        // $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        // $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        $query =  $builder->get();
        $user = $query->getResult();

        $db2 = \Config\Database::connect();
        $builder2    = $db2->table('tb_lamp_eval');
        $builder2->where('id_lamp', $id);
        $query2 =  $builder2->get();
        $user2 = $query2->getRow();

        $judulLampiran = $user2->nomor_lampeval;

        $styleJudul = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $styleJudulKolom = [
            'alignment' => [
                'vertical'  => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
            'borders'   => [
                'top'   => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $styleCell = [
            'alignment' => [
                'vertical'  => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders'   => [
                'top'   => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        function namabulan($a)
        {
            switch ($a) {
                case '01':
                    return  'Januari';
                case '02':
                    return  'Februari';
                case '03':
                    return  'Maret';
                case '04':
                    return  'April';
                case '05':
                    return  'Mei';
                case '06':
                    return  'Juni';
                case '07':
                    return  'Juli';
                case '08':
                    return  'Agustus';
                case '09':
                    return  'September';
                case '10':
                    return  'Oktober';
                case '11':
                    return  'Nopember';
                case '12':
                    return  'Desember';
            }
        };

        function setTahun($a)
        {
            $sisa_bagi = $a % 12;
            $hsl_bagi = ($a - $sisa_bagi) / 12;
            $hasil = $hsl_bagi . ' Tahun ' . $sisa_bagi . ' Bulan';
            return $hasil;
        };

        function jenisMutasi($a)
        {
            $lolosbutuh = 'Lolos Butuh';
            $aps = 'APS';
            $bursa = 'Bursa';
            $rotasiinternal = 'Rotasi Internal Div';
            $berangkatptb = 'Berangkat PTB';
            $kembaliptb = 'Kembali PTB';
            $promosi = 'Promosi';
            $demosi = 'Demosi';
            $rotasiinternaldir = 'Rotasi Internal Dir';

            if ($a == 1) {
                return $lolosbutuh;
            } else if ($a == 2) {
                return $aps;
            } else if ($a == 3) {
                return $bursa;
            } else if ($a == 4) {
                return $rotasiinternal;
            } else if ($a == 5) {
                return $berangkatptb;
            } else if ($a == 6) {
                return $kembaliptb;
            } else if ($a == 7) {
                return $promosi;
            } else if ($a == 8) {
                return $demosi;
            } else if ($a == 9) {
                return $rotasiinternaldir;
            }
        };

        function pegpog($a)
        {
            $b = "'- PeG Ybs tidak memenuhi pada PoG Proyeksi Jabatan" . "\r\n";
            if ($a == "Memenuhi") {
                return NULL;
            } else {
                return $b;
            }
        };

        function ftkasal($a)
        {
            $b = "'- FTK Unit/Divisi Asal > Rata-Rata FTK Nasional" . "\r\n";
            $c = "'- FTK Unit/Divisi Asal < Rata-Rata FTK Nasional" . "\r\n";
            $d = "'- FTK Unit/Divisi Asal = Rata-Rata FTK Nasional" . "\r\n";
            if ($a == "Lebih") {
                return $b;
            } else if ($a == "Kurang") {
                return $c;
            } else {
                return $d;
            }
        };

        function ftktujuan($a)
        {
            $b = "- FTK Unit/Divisi Tujuan > Rata-Rata FTK Nasional" . "\r\n";
            $c = "- FTK Unit/Divisi Tujuan < Rata-Rata FTK Nasional" . "\r\n";
            $d = "- FTK Unit/Divisi Tujuan = Rata-Rata FTK Nasional" . "\r\n";
            if ($a == "Lebih") {
                return $b;
            } else if ($a == "Kurang") {
                return $c;
            } else {
                return $d;
            }
        };

        function masakerja($a)
        {
            $b = "- Masa Kerja < 7 Tahun, belum menjadi prioritas talent mobility" . "\r\n";
            if ($a > 84) {
                return NULL;
            } else {
                return $b;
            }
        };

        function masajabakhir($a, $b)
        {
            $c = "- Masa Jabatan Terakhir > 6 Bulan (Fungsional)" . "\r\n";
            $d = "- Masa Jabatan Terakhir < 6 Bulan (Fungsional)" . "\r\n";
            $e = "- Masa Jabatan Terakhir = 6 Bulan (Fungsional)" . "\r\n";
            $f = "- Masa Jabatan Terakhir > 1 Tahun (Struktural)" . "\r\n";
            $g = "- Masa Jabatan Terakhir < 1 Tahun (Struktural)" . "\r\n";
            $h = "- Masa Jabatan Terakhir = 1 Tahun (Struktural)" . "\r\n";
            if ($b == "FUNGSIONAL") {
                if ($a > 6) {
                    return $c;
                } else if ($a < 6) {
                    return $d;
                } else {
                    return $e;
                }
            } else {
                if ($a > 12) {
                    return $f;
                } else if ($a < 12) {
                    return $g;
                } else {
                    return $h;
                }
            }
        };

        function petarisiko($a)
        {
            $b = "- Peta Risiko Profesi : " . $a . "\r\n";
            return $b;
        };

        function sppd($a)
        {
            $b = "- Estimasi SPPD : Rp " . $a . "\r\n";
            return $b;
        };

        function pap($a, $b, $c, $d, $e, $f)
        {
            $y = "Pernikahan Antar Pegawai" . "\r\n" . "Nama Pasangan : " . $b . "\r\n" . "NIP Pasangan : " . $c . "\r\n" . "Unit : " . $d . ", " . $e . ", " . $f;
            if ($a == "Memenuhi") {
                return Null;
            } else {
                return $y;
            }
        };

        function sp($a, $c, $d, $e)
        {
            $b = "- Ybs adalah " . $c . " di " . $d . " pada " . $e;
            if ($a == NULL) {
                return NULL;
            } else {
                return $b;
            }
        };

        function rekanasal($a)
        {
            if ($a == null) {
                $b = "- Jumlah FTK pada bagian Ybs : 0" . "\r\n";
            } else {
                $b = "- Jumlah FTK pada bagian Ybs : " . $a . "\r\n";
            }

            return $b;
        };

        function rekantujuan($a)
        {
            if ($a == null) {
                $b = "- Jumlah FTK pada organisasi terkecil di unit/divisi tujuan : 0" . "\r\n";
            } else {
                $b = "- Jumlah FTK pada organisasi terkecil di unit/divisi tujuan : " . $a . "\r\n";
            }

            return $b;
        };

        function catatan($a, $b, $c)
        {
            $y = "\r\n" . "Catatan PIC" . "\r\n" . $a . "\r\n" . "Catatan MSB" . "\r\n" . $b . "\r\n" . "Catatan VP" . "\r\n" . $c . "\r\n";
            return $y;
        };

        function hasil($a, $b)
        {
            $x = "\r\n" . "HASIL EVALUASI : BELUM DAPAT DITINDAKLANJUTI";
            $y = "\r\n" . "HASIL EVALUASI : DAPAT DITINDAKLANJUTI, CETAK SK";
            $z = "\r\n" . "HASIL EVALUASI : DAPAT DITINDAKLANJUTI, " . "\r\n" . "Proses Lolos Butuh ke HTD Area Asal oleh DIV HTD Kantor Pusat";

            if ($a == 1) {
                if ($b == 4) {
                    return $y;
                } else {
                    return $z;
                }
            } else {
                return $x;
            }
        };


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', strtoupper($judulLampiran))->mergeCells('A2:P2')->getStyle('A2:P2')->applyFromArray($styleJudul); // judul lampiran dibuat dinamic by isian
        $sheet->setCellValue('A4', 'NO')->getStyle('A4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('B4', 'NIP')->getStyle('B4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('C4', 'NAMA')->getStyle('C4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('D4', 'PEG')->getStyle('D4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('E4', 'PENDIDIKAN')->getStyle('E4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('F4', 'MASA KERJA')->getStyle('F4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('G4', 'MASA JABATAN TERAKHIR')->getStyle('G4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('H4', 'POG LAMA')->getStyle('H4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('I4', 'JABATAN SAAT INI')->getStyle('I4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('J4', 'PROYEKSI JABATAN BARU')->getStyle('J4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('K4', 'POG BARU')->getStyle('K4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('L4', 'JENIS MUTASI')->getStyle('L4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('M4', 'DASAR/REKOMENDASI MUTASI')->getStyle('M4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('N4', 'FTK UNIT/DIVISI ASAL')->getStyle('N4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('O4', 'FTK UNIT/DIVISI TUJUAN')->getStyle('O4')->applyFromArray($styleJudulKolom);
        $sheet->setCellValue('P4', 'EVALUASI')->getStyle('P4')->applyFromArray($styleJudulKolom);
        $sheet->getColumnDimension('A')->setWidth(50, 'px');
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setWidth(120, 'px');
        $sheet->getColumnDimension('D')->setWidth(60, 'px');
        $sheet->getColumnDimension('E')->setWidth(150, 'px');
        $sheet->getColumnDimension('F')->setWidth(63, 'px');
        $sheet->getColumnDimension('G')->setWidth(70, 'px');
        $sheet->getColumnDimension('H')->setWidth(63, 'px');
        $sheet->getColumnDimension('K')->setWidth(60, 'px');
        $sheet->getColumnDimension('L')->setWidth(60, 'px');
        $sheet->getColumnDimension('M')->setWidth(200, 'px');
        $sheet->getColumnDimension('N')->setWidth(60, 'px');
        $sheet->getColumnDimension('O')->setWidth(60, 'px');
        $sheet->getColumnDimension('P')->setWidth(400, 'px');
        $sheet->getColumnDimension('I')->setWidth(400, 'px');
        $sheet->getColumnDimension('J')->setWidth(400, 'px');
        $sheet->getStyle("A2")->getAlignment()->setWrapText(true);
        $sheet->getStyle("A4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("B4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("C4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("D4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("E4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("F4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("G4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("H4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("I4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("J4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("K4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("L4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("M4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("N4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("O4")->getAlignment()->setWrapText(true);
        $sheet->getStyle("P4")->getAlignment()->setWrapText(true);


        $column = 5;
        $no = 1;
        foreach ($user as $key => $value) {

            $sheet->setCellValue('A' . $column, ($no))->getStyle('A' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('B' . $column, $value->nip_eval)->getStyle('B' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('C' . $column, $value->nama_eval)->getStyle('C' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('D' . $column, $value->peg_eval)->getStyle('D' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('E' . $column, $value->pendidikan)->getStyle('E' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('F' . $column, setTahun($value->masa_kerja))->getStyle('F' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('G' . $column, setTahun($value->masa_jabatan_terakhir))->getStyle('G' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('H' . $column, $value->pog_saat_ini)->getStyle('H' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('I' . $column, $value->jabatan_lengkap_saat_ini)->getStyle('I' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('J' . $column, $value->proyeksi_jabatan_baru)->getStyle('J' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('K' . $column, $value->pog_baru)->getStyle('K' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('L' . $column, jenisMutasi($value->jenis_mutasi))->getStyle('L' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('M' . $column, $value->dasar_mutasi)->getStyle('M' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('N' . $column, $value->realisasi_ftk_unit_asal . '%')->getStyle('N' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('O' . $column, $value->realisasi_ftk_unit_tujuan . '%')->getStyle('O' . $column)->applyFromArray($styleCell);
            $sheet->setCellValue('P' . $column, pegpog($value->text_pegpog) . "" . ftkasal($value->kategori_ftk_asal) . "" . ftktujuan($value->kategori_ftk_tujuan) . "" . masakerja($value->masa_kerja) . "" . masajabakhir($value->masa_jabatan_terakhir, $value->jenjab_eval) . "" . petarisiko($value->text_peta_risk) . "" . sppd($value->text_sppd) . "" . pap($value->text_pap, $value->nama_pap, $value->nip_pap, $value->unit_pap, $value->unit_pelaksana_pap, $value->sub_unit_pap) . "" . sp($value->text_sp, $value->jab_sp, $value->unit_sp, $value->org_sp) . "" . rekanasal($value->text_rekan) . "" . rekantujuan($value->text_rekan_tujuan) . "" . catatan($value->catatan_1, $value->catatan_2, $value->catatan_3) . "" . hasil($value->hasil_evaluasi_akhir, $value->jenis_mutasi))->getStyle('P' . $column)->applyFromArray($styleCell);
            $sheet->getStyle("I$column:J$column")->getAlignment()->setWrapText(true);
            $sheet->getStyle('C' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('F' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('G' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('L' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('P' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('M' . $column)->getAlignment()->setWrapText(true);
            $sheet->getStyle('A' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('D' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('D' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('F' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('F' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('G' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('G' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('H' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('H' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('K' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('K' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('L' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('L' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('N' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('N' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('O' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('O' . $column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $column++;
            $no++;
        }


        $right_sign = $user2->right_sign;
        $left_sign = $user2->left_sign;

        if ($right_sign == "Andrisa") {
            $signrightabove = "MANAGER";
            $signrightbottom = "PENGEMBANGAN TALENTA KANTOR PUSAT";
        } else if ($right_sign == "Diah Dayanti") {
            $signrightabove = "MANAGER";
            $signrightbottom = "PENGEMBANGAN TALENTA AREA HUMAN CAPITAL DAN ANAK PERUSAHAAN";
        } else if ($right_sign == "Gregorius Helmy Widyapamungkas") {
            $signrightabove = "VICE PRESIDENT";
            $signrightbottom = "PENGEMBANGAN TALENTA KORPORAT";
        } else if ($right_sign == "Dedi Budi Utomo") {
            $signrightabove = "EXECUTIVE VICE PRESIDENT";
            $signrightbottom = "PENGEMBANGAN TALENTA";
        }

        if ($left_sign == "Andrisa") {
            $signleftabove = "MANAGER";
            $signleftbottom = "PENGEMBANGAN TALENTA KANTOR PUSAT";
        } else if ($left_sign == "Diah Dayanti") {
            $signleftabove = "MANAGER";
            $signleftbottom = "PENGEMBANGAN TALENTA AREA HUMAN CAPITAL DAN ANAK PERUSAHAAN";
        } else if ($left_sign == "Gregorius Helmy Widyapamungkas") {
            $signleftabove = "VICE PRESIDENT";
            $signleftbottom = "PENGEMBANGAN TALENTA KORPORAT";
        } else if ($left_sign == "Dedi Budi Utomo") {
            $signleftabove = "EXECUTIVE VICE PRESIDENT";
            $signleftbottom = "PENGEMBANGAN TALENTA";
        }


        $endRow = $column + 3;

        $sheet->setCellValue('K' . $endRow, 'Jakarta, ' . date('d', strtotime($user2->tgl_lampeval)) . ' ' . namabulan(date('m', strtotime($user2->tgl_lampeval))) . ' ' . date('Y', strtotime($user2->tgl_lampeval)))->mergeCells('K' . $endRow . ':O' . $endRow . '')->getStyle('K' . $endRow . ':O' . $endRow . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $endRow + 1, $signrightabove)->mergeCells('K' . $endRow + 1 . ':O' . $endRow + 1 . '')->getStyle('K' . $endRow + 1 . ':O' . $endRow + 1 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $endRow + 2, $signrightbottom)->mergeCells('K' . $endRow + 2 . ':O' . $endRow + 2 . '')->getStyle('K' . $endRow + 2 . ':O' . $endRow + 2 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $endRow + 9, strtoupper($user2->right_sign))->mergeCells('K' . $endRow + 9 . ':O' . $endRow + 9 . '')->getStyle('K' . $endRow + 9 . ':O' . $endRow + 9 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $endRow + 1, $signleftabove)->mergeCells('C' . $endRow + 1 . ':H' . $endRow + 1 . '')->getStyle('C' . $endRow + 1 . ':H' . $endRow + 1 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $endRow + 2, $signleftbottom)->mergeCells('C' . $endRow + 2 . ':H' . $endRow + 2 . '')->getStyle('C' . $endRow + 2 . ':H' . $endRow + 2 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $endRow + 9, strtoupper($user2->left_sign))->mergeCells('C' . $endRow + 9 . ':H' . $endRow + 9 . '')->getStyle('C' . $endRow + 9 . ':H' . $endRow + 9 . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C' . $endRow + 9)->applyFromArray($styleJudul);
        $sheet->getStyle('C' . $endRow + 1)->applyFromArray($styleJudul);
        $sheet->getStyle('C' . $endRow + 2)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow + 9)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow + 1)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow + 2)->applyFromArray($styleJudul);
        $sheet->getStyle('K' . $endRow)->getFont()->setSize(14);
        $sheet->getStyle('C' . $endRow + 9)->getFont()->setSize(14);
        $sheet->getStyle('C' . $endRow + 1)->getFont()->setSize(14);
        $sheet->getStyle('C' . $endRow + 2)->getFont()->setSize(14);
        $sheet->getStyle('K' . $endRow + 9)->getFont()->setSize(14);
        $sheet->getStyle('K' . $endRow + 1)->getFont()->setSize(14);
        $sheet->getStyle('K' . $endRow + 2)->getFont()->setSize(14);
        $sheet->getStyle('A2')->getFont()->setSize(18);

        // $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        // $drawing->setName('Paid');
        // $drawing->setDescription('Paid');
        // $drawing->setPath('./template/img/logo/5.png');
        // $drawing->setCoordinates('M' . $endRow + 3);
        // $drawing->setOffsetX(50);
        // $drawing->setOffsetY(5);
        // $drawing->setHeight(110);
        // $drawing->getShadow()->setVisible(true);
        // $drawing->setWorksheet($spreadsheet->getActiveSheet());

        // $drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        // $drawing2->setName('Paid');
        // $drawing2->setDescription('Paid');
        // $drawing2->setPath('./template/img/logo/5.png');
        // $drawing2->setCoordinates('E' . $endRow + 3);
        // $drawing2->setOffsetX(20);
        // $drawing2->setOffsetY(5);
        // $drawing2->setHeight(110);
        // $drawing2->getShadow()->setVisible(true);
        // $drawing2->setWorksheet($spreadsheet->getActiveSheet());

        //  Use GD to create an in-memory image
        // $gdImage = @imagecreatetruecolor(120, 20) or die('Cannot Initialize new GD image stream');
        // $textColor = imagecolorallocate($gdImage, 255, 255, 255);
        // imagestring($gdImage, 1, 5, 5,  'Created with PhpSpreadsheet', $textColor);

        //  Add the In-Memory image to a worksheet
        // $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing();
        // $drawing->setName('In-Memory image 1');
        // $drawing->setDescription('In-Memory image 1');
        // $drawing->setCoordinates('K' . $endRow + 4);
        // $drawing->setImageResource($gdImage);
        // $drawing->setRenderingFunction(
        //     \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::RENDERING_JPEG
        // );
        // $drawing->setMimeType(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_DEFAULT);
        // $drawing->setHeight(36);
        // $drawing->setWorksheet($spreadsheet->getActiveSheet());




        $sheet->getPageSetup()
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()
            ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        $sheet->getPageSetup()->setFitToWidth(1);


        $spreadsheet->getProperties()
            ->setCreator(ucfirst(strtolower(userLogin()->nama_user)))
            ->setLastModifiedBy(ucfirst(strtolower(userLogin()->nama_user)) . ' ' . date('Y-m-d-His'))
            ->setTitle($user2->nomor_lampeval)
            ->setKeywords('generated by: ' . ucfirst(userLogin()->nip))
            ->setCategory("Lampiran Evaluasi");


        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Mpdf');
        $filename = $user2->nomor_lampeval . ' ' . date('Y-m-d-His');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.pdf"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }


    public function prosesimport()
    {
        $file = $this->request->getFile('file_excel');
        $extention = $file->getClientExtension();
        if ($extention == 'xlsx' || $extention == 'xls') {
            if ($extention == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $user = $spreadsheet->getActiveSheet()->toArray();
            foreach ($user as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'nip'                       =>  $value[1],
                    'no_sap'                    =>  $value[2],
                    'nama_user'                 =>  $value[3],
                    'tgl_lahir'                 =>  $value[4],
                    'tempat_lahir'              =>  $value[5],
                    'jenis_kelamin'             =>  $value[6],
                    'agama'                     =>  $value[7],
                    'status_perkawinan'         =>  $value[8],
                    'grade'                     =>  $value[9],
                    'tgl_grade_terakhir'        =>  $value[10],
                    'email_korpo'               =>  $value[11],
                    'no_hp'                     =>  $value[12],
                    'no_ktp'                    =>  $value[13],
                    'npwp'                      =>  $value[14],
                    'alamat'                    =>  $value[15],
                    'kota_alamat'               =>  $value[16],
                    'tgl_masuk'                 =>  $value[17],
                    'tgl_capeg'                 =>  $value[18],
                    'tgl_peg_tetap'             =>  $value[19],
                    'sebutan_jabatan'           =>  $value[20],
                    'start_date_jabatan'        =>  $value[21],
                    'profesi_jabatan'           =>  $value[22],
                    'htd_area'                  =>  $value[23],
                    'unit_induk'                =>  $value[24],
                    'unit_pelaksana'            =>  $value[25],
                    'sub_unit_pelaksana'        =>  $value[26],
                    'kode_org_unit'             =>  $value[27],
                    'nama_org_unit'             =>  $value[28],
                    'password'                  =>  sha1($value[1]),
                ];
                $this->users->insert($data);
            }
            return redirect()->back()->with('success', 'Data Excel Berhasil DiUpload');
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }
}
