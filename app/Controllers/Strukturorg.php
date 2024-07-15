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

class Strukturorg extends BaseController
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
        return view('struktur/org');
    }

    public function monitoringftk()
    {
        return view('struktur/ftk');
    }
}
