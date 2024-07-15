<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\Users;
use App\Models\Rjab;
use App\Models\Tasklist;
use App\Models\Rpend;
use App\Models\Rsertifikasi;
use App\Models\OrghtdModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use function PHPUnit\Framework\throwException;

class Dashboard extends BaseController
{
    function __construct()
    {
        $this->users        = new Users();
        $this->rjab        = new Rjab();
        $this->task        = new Tasklist();
        $this->rpend        = new Rpend();
        $this->rsert        = new Rsertifikasi();
        $this->orghtd       = new OrghtdModel();
    }

    public function index()
    {
        $dapeg = $this->users->getDetail(userLogin()->nip);
        $rjab = $this->rjab->get(userLogin()->nip);
        $rpend = $this->rpend->get(userLogin()->nip);
        $rsert = $this->rsert->get(userLogin()->nip);
        $kode_nip = $dapeg->nip;
        $kode_org_unit = $dapeg->kode_org_unit;
        $kode_org_tiga = $dapeg->sub_unit_pelaksana;
        $jenjab = $dapeg->jenjab;
        $list = $this->task->get(userLogin()->nip);
        $finish = $this->task->get_finish(userLogin()->nip);

        $sql = "SELECT SUM(datediff(end_date, start_date)) AS jumlah\n"
            . "FROM tb_riwayat_jabatan\n"
            . "WHERE kode_nip = '$kode_nip' AND kode_riwayat_org_unit = '$kode_org_unit' AND kode_riwayat_org_tiga = '$kode_org_tiga' AND jenjang_jabatan = '$jenjab' AND end_date != '9999-12-31';";
        $jumlah = $this->db->query($sql)->getRow();

        $data['dapeg']      = $dapeg;
        $data['rjab']      = $rjab;
        $data['rpend']      = $rpend;
        $data['rsert']      = $rsert;
        $data['jumlah']     = $jumlah;
        $data['tasklist']   = 'task/index';
        $data['list']     = $list;
        $data['finish']     = $finish;
        return view('dashboard/dashboardanda', $data);
    }

    public function dashtd()
    {
        return view('dashboard/dashboardhtd');
    }

    public function getList()
    {
        $list = $this->task->get(userLogin()->nip);
        $data['list']     = $list;

        return view('task/index', $data);
    }

    public function getForm()
    {
        return view('task/form');
    }

    public function addList()
    {

        $data = array(
            'deskripsi_list' => $this->request->getPost('deskripsi_list'),
            'list_nip' => $this->request->getPost('list_nip'),
            'start_date_list' => $this->request->getPost('start_date_list'),
        );
        $this->task->addList($data);
    }
}
