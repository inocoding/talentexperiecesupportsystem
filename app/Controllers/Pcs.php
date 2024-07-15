<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\Users;
use App\Models\Rjab;
use App\Models\Rpend;
use App\Models\Rsertifikasi;
use App\Models\OrghtdModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use function PHPUnit\Framework\throwException;

class Pcs extends BaseController
{
    function __construct()
    {
        $this->users        = new Users();
        $this->rjab        = new Rjab();
        $this->rpend        = new Rpend();
        $this->rsert        = new Rsertifikasi();
        $this->orghtd       = new OrghtdModel();
    }

    public function index()
    {
        $builder            = $this->db->table('tb_org_htd');
        $query              = $builder->get()->getResult();

        $builder2           = $this->db->table('tb_org_satu');
        $query2             = $builder2->get()->getResult();

        $builder3           = $this->db->table('tb_org_dua');
        $query3             = $builder3->get()->getResult();

        $builder4           = $this->db->table('tb_org_tiga');
        $query4             = $builder4->get()->getResult();


        $data['org_htd']   = $query;
        $data['org_satu']   = $query2;
        $data['org_dua']   = $query3;
        $data['org_tiga']   = $query4;
        return view('pcs', $data);
    }
}
