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

class Talentdev extends BaseController
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
        return view('talentdev/internship');
    }


    public function internal()
    {
        return view('talentdev/internal');
    }

    public function eksternal()
    {
        // $builder        = $this->users;
        // $query          = $builder->getAll();
        // $data['user']   = $query;

        // $data['user']   = $this->users->getAll();
        $keyword = $this->request->getGet('keyword');
        $data = $this->users->getAllPaginated(5, $keyword);

        return view('talentdev/eksternal', $data);
    }

    public function addlist()
    {
        $list_nip = $this->request->getPost('list_nip');
        $deskripsi_list = $this->request->getPost('deskripsi_list');
        $start_date_list = "2023-01-27";
        $end_date_list = "2023-01-28";
        $status_list = "1";

        $data = [
            'list_nip'          => $list_nip,
            'deskripsi_list'    => $deskripsi_list,
            'start_date_list'    => $start_date_list,
            'end_date_list'    => $end_date_list,
            'status_list'    => $status_list,
        ];

        $this->tasklist->insert($data);
        $data = ['status' => 'sukses insert data'];
        return $this->response->setJSON($data);
    }

    public function dapeghtd()
    {
        // $builder        = $this->users;
        // $query          = $builder->getAll();
        // $data['user']   = $query;

        // $data['user']   = $this->users->getAll();
        $keyword = $this->request->getGet('keyword');
        $data = $this->users->getAllPaginatedHtd(5, $keyword);

        return view('master/pegawaihtd', $data);
    }

    public function rjab()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->rjab->getAllPaginated(5, $keyword);
        return view('master/rjab', $data);
    }

    public function simkpnas()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->rjab->getAllPaginated(5, $keyword);
        return view('master/simkp', $data);
    }

    public function import()
    {
        return view('master/import');
    }

    public function import_rjab()
    {
        return view('master/import_rjab');
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
                    'no_hp'                     =>  $value[13],
                    'no_ktp'                    =>  $value[14],
                    'npwp'                      =>  $value[15],
                    'alamat'                    =>  $value[16],
                    'kota_alamat'               =>  $value[17],
                    'tgl_masuk'                 =>  $value[18],
                    'tgl_capeg'                 =>  $value[19],
                    'tgl_peg_tetap'             =>  $value[20],
                    'sebutan_jabatan'           =>  $value[21],
                    'start_date_jabatan'        =>  $value[22],
                    'profesi_jabatan'           =>  $value[23],
                    'htd_area'                  =>  $value[24],
                    'unit_induk'                =>  $value[25],
                    'unit_pelaksana'            =>  $value[26],
                    'sub_unit_pelaksana'        =>  $value[27],
                    'kode_org_unit'             =>  $value[28],
                    'nama_org_unit'             =>  $value[29],
                    'password'                  =>  sha1($value[4]),
                ];
                $this->users->insert($data);
            }
            return redirect()->back()->with('success', 'Data Excel Berhasil DiUpload');
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }

    public function hapusduplikat()
    {
    }

    public function prosesimport_rjab()
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
                    'kode_nip'                  =>  $value[1],
                    'peg_riwayat'               =>  $value[3],
                    'kode_riwayat_posisi'       =>  $value[4],
                    'nama_formasi_jabatan'      =>  $value[5],
                    'kode_riwayat_org_unit'     =>  $value[6],
                    'nama_riwayat_org_unit'     =>  $value[7],
                    'kode_profesi_rjab'         =>  $value[8],
                    'nama_riwayat_profesi'      =>  $value[9],
                    'jenjang_jabatan'           =>  $value[10],
                    'pog_riwayat'               =>  $value[11],
                    'kode_riwayat_org_htd'      =>  $value[12],
                    'kode_riwayat_org_satu'     =>  $value[13],
                    'kode_riwayat_org_dua'      =>  $value[14],
                    'kode_riwayat_org_tiga'     =>  $value[15],
                    'start_date'                =>  $value[16],
                    'end_date'                  =>  $value[17],
                ];
                $this->rjab->insert($data);

                $sql = "DELETE t1 FROM tb_riwayat_jabatan t1\n"
                    . "  JOIN tb_riwayat_jabatan t2\n"
                    . "  ON t2.kode_riwayat_org_unit = t1.kode_riwayat_org_unit\n"
                    . "  AND t2.jenjang_jabatan = t1.jenjang_jabatan\n"
                    . "  AND t2.pog_riwayat = t1.pog_riwayat\n"
                    . "  AND t2.kode_riwayat_org_htd = t1.kode_riwayat_org_htd\n"
                    . "  AND t2.kode_riwayat_org_satu = t1.kode_riwayat_org_satu\n"
                    . "  AND t2.kode_riwayat_org_dua = t1.kode_riwayat_org_dua\n"
                    . "  AND t2.kode_riwayat_org_tiga = t1.kode_riwayat_org_tiga\n"
                    . "  AND t2.start_date = t1.start_date\n"
                    . "  AND t2.end_date = t1.end_date\n"
                    . "  AND t2.id_riwayat_jabatan < t1.id_riwayat_jabatan";
                $this->db->query($sql);
            }
            return redirect()->back()->with('success', 'Data Excel Berhasil DiUpload');
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }

    public function export()
    {
        // $user = $this->users->getAll();
        $role_htd = "4";
        $role_peg = "1";
        $unit_induk = userLogin()->unit_induk;

        $keyword = $this->request->getGet('keyword');
        $db = \Config\Database::connect();
        $builder    = $db->table('user');
        $builder->where('role_peg', $role_peg);
        $builder->where('unit_induk', $unit_induk);
        $builder->where('role_htd', $role_htd);
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        if ($keyword != '') {
            $builder->like('nip', $keyword);
            $builder->orLike('nama_user', $keyword);
            $builder->orLike('nama_org_htd', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('email_korpo', $keyword);
            $builder->orLike('email_non', $keyword);
            $builder->orLike('ket_aktif', $keyword);
        }
        $query =  $builder->get();
        $user = $query->getResult();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'no');
        $sheet->setCellValue('B1', 'nip');
        $sheet->setCellValue('C1', 'no_sap');
        $sheet->setCellValue('D1', 'nama');
        $sheet->setCellValue('E1', 'tgl_lahir');
        $sheet->setCellValue('F1', 'tempat_lahir');
        $sheet->setCellValue('G1', 'jenis_kelamin');
        $sheet->setCellValue('H1', 'agama');
        $sheet->setCellValue('I1', 'status_perkawinan');
        $sheet->setCellValue('J1', 'grade');
        $sheet->setCellValue('K1', 'tgl_grade_terakhir');
        $sheet->setCellValue('L1', 'email_korpo');
        $sheet->setCellValue('M1', 'email_non');
        $sheet->setCellValue('N1', 'no_hp');
        $sheet->setCellValue('O1', 'no_ktp');
        $sheet->setCellValue('P1', 'npwp');
        $sheet->setCellValue('Q1', 'alamat');
        $sheet->setCellValue('R1', 'kota_alamat');
        $sheet->setCellValue('S1', 'tgl_masuk');
        $sheet->setCellValue('T1', 'tgl_capeg');
        $sheet->setCellValue('U1', 'tgl_peg_tetap');
        $sheet->setCellValue('V1', 'sebutan_jabatan');
        $sheet->setCellValue('W1', 'start_date_jabatan');
        $sheet->setCellValue('X1', 'profesi_jabatan');
        $sheet->setCellValue('Y1', 'htd_area');
        $sheet->setCellValue('Z1', 'unit_induk');
        $sheet->setCellValue('AA1', 'unit_pelaksana');
        $sheet->setCellValue('AB1', 'sub_unit_pelaksana');

        $column = 2;
        foreach ($user as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->nip);
            $sheet->setCellValue('C' . $column, $value->no_sap);
            $sheet->setCellValue('D' . $column, $value->nama_user);
            $sheet->setCellValue('E' . $column, $value->tgl_lahir);
            $sheet->setCellValue('F' . $column, $value->tempat_lahir);
            $sheet->setCellValue('G' . $column, $value->jenis_kelamin);
            $sheet->setCellValue('H' . $column, $value->agama);
            $sheet->setCellValue('I' . $column, $value->status_perkawinan);
            $sheet->setCellValue('J' . $column, $value->grade);
            $sheet->setCellValue('K' . $column, $value->tgl_grade_terakhir);
            $sheet->setCellValue('L' . $column, $value->email_korpo);
            $sheet->setCellValue('M' . $column, $value->email_non);
            $sheet->setCellValue('N' . $column, $value->no_hp);
            $sheet->setCellValue('O' . $column, $value->no_ktp);
            $sheet->setCellValue('P' . $column, $value->npwp);
            $sheet->setCellValue('Q' . $column, $value->alamat);
            $sheet->setCellValue('R' . $column, $value->kota_alamat);
            $sheet->setCellValue('S' . $column, $value->tgl_masuk);
            $sheet->setCellValue('T' . $column, $value->tgl_capeg);
            $sheet->setCellValue('U' . $column, $value->tgl_peg_tetap);
            $sheet->setCellValue('V' . $column, $value->sebutan_jabatan);
            $sheet->setCellValue('W' . $column, $value->start_date_jabatan);
            $sheet->setCellValue('X' . $column, $value->profesi_jabatan);
            $sheet->setCellValue('Y' . $column, $value->nama_org_htd);
            $sheet->setCellValue('Z' . $column, $value->nama_org_satu);
            $sheet->setCellValue('AA' . $column, $value->nama_org_dua);
            $sheet->setCellValue('AB' . $column, $value->nama_org_tiga);
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Dispotition: attachment;filename=datapegawai.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function exporthtd()
    {
        // $user = $this->users->getAll();
        $role_htd = "4";
        $role_peg = "1";
        $htd_area = userLogin()->htd_area;

        $keyword = $this->request->getGet('keyword');
        $db = \Config\Database::connect();
        $builder    = $db->table('user');
        $builder->where('role_peg', $role_peg);
        $builder->where('htd_area', $htd_area);
        $builder->where('role_htd !=', $role_htd);
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
        if ($keyword != '') {
            $builder->like('nip', $keyword);
            $builder->orLike('nama_user', $keyword);
            $builder->orLike('nama_org_htd', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('email_korpo', $keyword);
            $builder->orLike('email_non', $keyword);
            $builder->orLike('ket_aktif', $keyword);
        }
        $query =  $builder->get();
        $user = $query->getResult();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'no');
        $sheet->setCellValue('B1', 'nip');
        $sheet->setCellValue('C1', 'no_sap');
        $sheet->setCellValue('D1', 'nama');
        $sheet->setCellValue('E1', 'tgl_lahir');
        $sheet->setCellValue('F1', 'tempat_lahir');
        $sheet->setCellValue('G1', 'jenis_kelamin');
        $sheet->setCellValue('H1', 'agama');
        $sheet->setCellValue('I1', 'status_perkawinan');
        $sheet->setCellValue('J1', 'grade');
        $sheet->setCellValue('K1', 'tgl_grade_terakhir');
        $sheet->setCellValue('L1', 'email_korpo');
        $sheet->setCellValue('M1', 'email_non');
        $sheet->setCellValue('N1', 'no_hp');
        $sheet->setCellValue('O1', 'no_ktp');
        $sheet->setCellValue('P1', 'npwp');
        $sheet->setCellValue('Q1', 'alamat');
        $sheet->setCellValue('R1', 'kota_alamat');
        $sheet->setCellValue('S1', 'tgl_masuk');
        $sheet->setCellValue('T1', 'tgl_capeg');
        $sheet->setCellValue('U1', 'tgl_peg_tetap');
        $sheet->setCellValue('V1', 'sebutan_jabatan');
        $sheet->setCellValue('W1', 'start_date_jabatan');
        $sheet->setCellValue('X1', 'profesi_jabatan');
        $sheet->setCellValue('Y1', 'htd_area');
        $sheet->setCellValue('Z1', 'unit_induk');
        $sheet->setCellValue('AA1', 'unit_pelaksana');
        $sheet->setCellValue('AB1', 'sub_unit_pelaksana');

        $column = 2;
        foreach ($user as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->nip);
            $sheet->setCellValue('C' . $column, $value->no_sap);
            $sheet->setCellValue('D' . $column, $value->nama_user);
            $sheet->setCellValue('E' . $column, $value->tgl_lahir);
            $sheet->setCellValue('F' . $column, $value->tempat_lahir);
            $sheet->setCellValue('G' . $column, $value->jenis_kelamin);
            $sheet->setCellValue('H' . $column, $value->agama);
            $sheet->setCellValue('I' . $column, $value->status_perkawinan);
            $sheet->setCellValue('J' . $column, $value->grade);
            $sheet->setCellValue('K' . $column, $value->tgl_grade_terakhir);
            $sheet->setCellValue('L' . $column, $value->email_korpo);
            $sheet->setCellValue('M' . $column, $value->email_non);
            $sheet->setCellValue('N' . $column, $value->no_hp);
            $sheet->setCellValue('O' . $column, $value->no_ktp);
            $sheet->setCellValue('P' . $column, $value->npwp);
            $sheet->setCellValue('Q' . $column, $value->alamat);
            $sheet->setCellValue('R' . $column, $value->kota_alamat);
            $sheet->setCellValue('S' . $column, $value->tgl_masuk);
            $sheet->setCellValue('T' . $column, $value->tgl_capeg);
            $sheet->setCellValue('U' . $column, $value->tgl_peg_tetap);
            $sheet->setCellValue('V' . $column, $value->sebutan_jabatan);
            $sheet->setCellValue('W' . $column, $value->start_date_jabatan);
            $sheet->setCellValue('X' . $column, $value->profesi_jabatan);
            $sheet->setCellValue('Y' . $column, $value->nama_org_htd);
            $sheet->setCellValue('Z' . $column, $value->nama_org_satu);
            $sheet->setCellValue('AA' . $column, $value->nama_org_dua);
            $sheet->setCellValue('AB' . $column, $value->nama_org_tiga);
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Dispotition: attachment;filename=datapegawai.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function export_rjab()
    {

        $keyword = $this->request->getGet('keyword');
        $db = \Config\Database::connect();
        $builder    = $db->table('tb_riwayat_jabatan');
        $builder->join('user', 'user.nip = tb_riwayat_jabatan.kode_nip');
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = tb_riwayat_jabatan.kode_riwayat_org_htd');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = tb_riwayat_jabatan.kode_riwayat_org_satu');
        $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = tb_riwayat_jabatan.kode_riwayat_org_dua');
        $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = tb_riwayat_jabatan.kode_riwayat_org_tiga');
        if ($keyword != '') {
            $builder->like('kode_nip', $keyword);
            $builder->orLike('nama_user', $keyword);
            $builder->orLike('nama_org_htd', $keyword);
            $builder->orLike('nama_org_satu', $keyword);
            $builder->orLike('nama_org_dua', $keyword);
            $builder->orLike('nama_org_tiga', $keyword);
            $builder->orLike('nama_formasi_jabatan', $keyword);
            $builder->orLike('kode_profesi_rjab', $keyword);
            $builder->orLike('nama_riwayat_profesi', $keyword);
            $builder->orLike('jenjang_jabatan', $keyword);
            $builder->orLike('start_date', $keyword);
            $builder->orLike('end_date', $keyword);
        }
        $query =  $builder->get();
        $user = $query->getResult();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'no');
        $sheet->setCellValue('B1', 'nip');
        $sheet->setCellValue('C1', 'nama');
        $sheet->setCellValue('D1', 'Sebutan Jabatan');
        $sheet->setCellValue('E1', 'kode_profesi');
        $sheet->setCellValue('F1', 'nama_profesi');
        $sheet->setCellValue('G1', 'jenjang_jabatan');
        $sheet->setCellValue('H1', 'HTD Area');
        $sheet->setCellValue('I1', 'Unit Induk');
        $sheet->setCellValue('J1', 'Unit Pelaksana');
        $sheet->setCellValue('K1', 'Sub Unit Pelaksana');
        $sheet->setCellValue('L1', 'start_date');
        $sheet->setCellValue('M1', 'end_date');

        $column = 2;
        foreach ($user as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->kode_nip);
            $sheet->setCellValue('C' . $column, $value->nama_user);
            $sheet->setCellValue('D' . $column, $value->nama_formasi_jabatan);
            $sheet->setCellValue('E' . $column, $value->kode_profesi_rjab);
            $sheet->setCellValue('F' . $column, $value->nama_riwayat_profesi);
            $sheet->setCellValue('G' . $column, $value->jenjang_jabatan);
            $sheet->setCellValue('H' . $column, $value->nama_org_htd);
            $sheet->setCellValue('I' . $column, $value->nama_org_satu);
            $sheet->setCellValue('J' . $column, $value->nama_org_dua);
            $sheet->setCellValue('K' . $column, $value->nama_org_tiga);
            $sheet->setCellValue('L' . $column, $value->start_date);
            $sheet->setCellValue('M' . $column, $value->end_date);
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Dispotition: attachment;filename=datariwayatjabatan.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function addpeg1()
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
        return view('master/formaddpeg', $data);
    }

    public function get_org_satu($id, $userid = null)
    {
        // $builder        = $this->db->table('tb_org_satu')->getWhere(['parent_org_satu' =>  $id]);
        // $query          = $builder->getResult();
        // dd($query);
        if ($this->request->isAJAX()) {
            $builder        = $this->db->table('tb_org_satu')->getWhere(['parent_org_satu' =>  $id]);
            $query          = $builder->getResult();
            if ($userid != 0) {
                $dapeg = $this->users->where('user_id', $userid)->first();

                $data['dapeg'] = $dapeg;
                $data['org_satu']   = $query;

                $msg  = view('master/form_org_satu', $data);
                echo json_encode($msg);
            } else {
                $data['org_satu']   = $query;

                $msg  = view('master/form_org_satu_add', $data);
                echo json_encode($msg);
            }
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function get_org_dua($id, $userid = null)
    {

        if ($this->request->isAJAX()) {
            $builder        = $this->db->table('tb_org_dua')->getWhere(['parent_org_dua' =>  $id]);
            $query          = $builder->getResult();
            if ($userid != 0) {
                $dapeg = $this->users->where('user_id', $userid)->first();
                $data['dapeg'] = $dapeg;
                $data['org_dua']   = $query;

                $msg  = view('master/form_org_dua', $data);
                echo json_encode($msg);
            } else {
                $data['org_dua']   = $query;

                $msg  = view('master/form_org_dua_add', $data);
                echo json_encode($msg);
            }
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function get_org_tiga($id, $userid = null)
    {

        if ($this->request->isAJAX()) {
            $builder        = $this->db->table('tb_org_tiga')->getWhere(['parent_org_tiga' =>  $id]);
            $query          = $builder->getResult();
            if ($userid != 0) {
                $dapeg = $this->users->where('user_id', $userid)->first();
                $data['dapeg'] = $dapeg;
                $data['org_tiga']   = $query;

                $msg  = view('master/form_org_tiga', $data);
                echo json_encode($msg);
            } else {
                $data['org_tiga']   = $query;

                $msg  = view('master/form_org_tiga_add', $data);
                echo json_encode($msg);
            }
        } else {
            exit('Data tidak ditemukan');
        }
    }

    public function addpeg()
    {

        if (!$this->validate([
            'nip' => [
                'rules'     => 'required|is_unique[user.nip]',
                'errors'    => [
                    'required'      => '{field} harus diisi.',
                    'is_unique'     => '{field} sudah dipakai',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();

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
            $data['validation'] = $validation;
            return view('master/formaddpeg', $data);
        } else {
            $password2  = $this->request->getPost('tgl_lahir');
            $password = sha1($password2);

            $email0 =   $this->request->getPost('email_korpo');
            $email  = $email0 . '@pln.co.id';

            echo $this->request->getVar('htd_area');

            if ($this->request->getVar('role_htd') != 4 && $this->request->getVar('role_komite') != null) {
                $data = [
                    'nip'                   => $this->request->getVar('nip'),
                    'password'              => $password,
                    'nama_user'             => $this->request->getVar('nama_user'),
                    'tgl_lahir'             => $this->request->getVar('tgl_lahir'),
                    'email_korpo'           => $email,
                    'no_hp'                 => $this->request->getVar('no_hp'),
                    'htd_area'              => $this->request->getVar('htd_area'),
                    'unit_induk'            => $this->request->getVar('unit_induk'),
                    'unit_pelaksana'        => $this->request->getVar('unit_pelaksana'),
                    'sub_unit_pelaksana'    => $this->request->getVar('sub_unit_pelaksana'),
                    'role_htd'              => $this->request->getVar('role_htd'),
                    'role_admin'            => $this->request->getVar('role_admin'),
                    'role_komite'           => $this->request->getVar('role_komite'),
                    'role_adm_acc'          => $this->request->getVar('role_adm_acc'),
                    'role_adm_eclinic'      => $this->request->getVar('role_adm_eclinic'),
                    'role_adm_hi'           => $this->request->getVar('role_adm_hi'),
                    'role_adm_org'          => $this->request->getVar('role_adm_org'),
                    'role_adm_kinerja'      => $this->request->getVar('role_adm_kinerja'),
                    'role_adm_diklat'       => $this->request->getVar('role_adm_diklat'),
                    'role_adm_sertifikasi'  => $this->request->getVar('role_adm_sertifikasi'),

                ];

                $this->users->insert($data);
                return redirect()->to(site_url('masterdata'))->with('success', 'Data Berhasil Disimpan');
            } else {
                $data = [
                    'nip'                   => $this->request->getVar('nip'),
                    'password'              => $password,
                    'nama_user'             => $this->request->getVar('nama_user'),
                    'tgl_lahir'             => $this->request->getVar('tgl_lahir'),
                    'email_korpo'           => $email,
                    'no_hp'                 => $this->request->getVar('no_hp'),
                    'htd_area'              => $this->request->getVar('htd_area'),
                    'unit_induk'            => $this->request->getVar('unit_induk'),
                    'unit_pelaksana'        => $this->request->getVar('unit_pelaksana'),
                    'sub_unit_pelaksana'    => $this->request->getVar('sub_unit_pelaksana'),
                    'role_htd'              => $this->request->getVar('role_htd'),

                ];

                $this->users->insert($data);
                return redirect()->to(site_url('masterdata'))->with('success', 'Data Berhasil Disimpan');
            }
        }
    }

    // public function addformdapeg()
    // {
    //     if ($this->request->isAJAX()) {
    //         $msg    = [
    //             'data'  => view('master/addmodaldapeg')
    //         ];
    //         echo json_encode($msg);
    //     } else {
    //         exit('Proses tidak bisa dilanjutkan');
    //     }
    // }

    public function editdapeg($id = null)
    {
        $builder            = $this->db->table('tb_org_htd');
        $query              = $builder->get()->getResult();
        $builder2            = $this->db->table('tb_org_satu');
        $query2              = $builder2->get()->getResult();
        $builder3            = $this->db->table('tb_org_dua');
        $query3             = $builder3->get()->getResult();
        $builder4            = $this->db->table('tb_org_tiga');
        $query4             = $builder4->get()->getResult();
        $dapeg = $this->users->where('nip', $id)->first();
        if (is_object($dapeg)) {
            $data['dapeg']      = $dapeg;
            $data['org_htd']    = $query;
            $data['org_satu']    = $query2;
            $data['org_dua']    = $query3;
            $data['org_tiga']    = $query4;
            return view('master/formeditpeg', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function proseseditdapeg($id = null)
    {
        $email =   $this->request->getPost('email_korpo');
        if ($this->request->getVar('role_htd') != 4 && $this->request->getVar('role_komite') != null) {
            $data = [
                'nama_user'             => $this->request->getVar('nama_user'),
                'tgl_lahir'             => $this->request->getVar('tgl_lahir'),
                'email_korpo'           => $email,
                'no_hp'                 => $this->request->getVar('no_hp'),
                'htd_area'              => $this->request->getVar('htd_area'),
                'unit_induk'            => $this->request->getVar('unit_induk'),
                'unit_pelaksana'        => $this->request->getVar('unit_pelaksana'),
                'sub_unit_pelaksana'    => $this->request->getVar('sub_unit_pelaksana'),
                'role_htd'              => $this->request->getVar('role_htd'),
                'role_admin'            => $this->request->getVar('role_admin'),
                'role_komite'           => $this->request->getVar('role_komite'),
                'role_adm_acc'          => $this->request->getVar('role_adm_acc'),
                'role_adm_eclinic'      => $this->request->getVar('role_adm_eclinic'),
                'role_adm_hi'           => $this->request->getVar('role_adm_hi'),
                'role_adm_org'          => $this->request->getVar('role_adm_org'),
                'role_adm_kinerja'      => $this->request->getVar('role_adm_kinerja'),
                'role_adm_diklat'       => $this->request->getVar('role_adm_diklat'),
                'role_adm_sertifikasi'  => $this->request->getVar('role_adm_sertifikasi'),

            ];

            if ($this->request->getPost('ket_aktif') == 0) {
                $password2  = $this->request->getPost('tgl_lahir');
                $password   = sha1($password2);

                $data['password'] = $password;
            }

            $this->users->update($id, $data);
            return redirect()->to(site_url('masterdata'))->with('success', 'Data Berhasil Diupdate');
        } elseif ($this->request->getVar('role_htd') == 4 && $this->request->getVar('role_komite') != null) {
            $data = [

                'nama_user'             => $this->request->getVar('nama_user'),
                'tgl_lahir'             => $this->request->getVar('tgl_lahir'),
                'email_korpo'           => $email,
                'role_komite'           => $this->request->getVar('role_komite'),
                'no_hp'                 => $this->request->getVar('no_hp'),
                'htd_area'              => $this->request->getVar('htd_area'),
                'unit_induk'            => $this->request->getVar('unit_induk'),
                'unit_pelaksana'        => $this->request->getVar('unit_pelaksana'),
                'sub_unit_pelaksana'    => $this->request->getVar('sub_unit_pelaksana'),
                'role_htd'              => $this->request->getVar('role_htd'),
                'role_admin'            => $this->request->getVar('role_admin'),
                'role_adm_acc'          => $this->request->getVar('role_adm_acc'),
                'role_adm_eclinic'      => $this->request->getVar('role_adm_eclinic'),
                'role_adm_hi'           => $this->request->getVar('role_adm_hi'),
                'role_adm_org'          => $this->request->getVar('role_adm_org'),
                'role_adm_kinerja'      => $this->request->getVar('role_adm_kinerja'),
                'role_adm_diklat'       => $this->request->getVar('role_adm_diklat'),
                'role_adm_sertifikasi'  => $this->request->getVar('role_adm_sertifikasi'),

            ];
            if ($this->request->getPost('ket_aktif') == 0) {
                $password2  = $this->request->getPost('tgl_lahir');
                $password   = sha1($password2);

                $data['password'] = $password;
            }
            $this->users->update($id, $data);
            return redirect()->to(site_url('masterdata'))->with('success', 'Data Berhasil Diupdate');
        } elseif ($this->request->getVar('role_htd') != 4 && $this->request->getVar('role_komite') == null) {
            $data = [

                'nama_user'             => $this->request->getVar('nama_user'),
                'tgl_lahir'             => $this->request->getVar('tgl_lahir'),
                'email_korpo'           => $email,
                'no_hp'                 => $this->request->getVar('no_hp'),
                'htd_area'              => $this->request->getVar('htd_area'),
                'unit_induk'            => $this->request->getVar('unit_induk'),
                'unit_pelaksana'        => $this->request->getVar('unit_pelaksana'),
                'sub_unit_pelaksana'    => $this->request->getVar('sub_unit_pelaksana'),
                'role_htd'              => $this->request->getVar('role_htd'),
                'role_admin'            => $this->request->getVar('role_admin'),
                'role_adm_acc'          => $this->request->getVar('role_adm_acc'),
                'role_adm_eclinic'      => $this->request->getVar('role_adm_eclinic'),
                'role_adm_hi'           => $this->request->getVar('role_adm_hi'),
                'role_adm_org'          => $this->request->getVar('role_adm_org'),
                'role_adm_kinerja'      => $this->request->getVar('role_adm_kinerja'),
                'role_adm_diklat'       => $this->request->getVar('role_adm_diklat'),
                'role_adm_sertifikasi'  => $this->request->getVar('role_adm_sertifikasi'),

            ];
            if ($this->request->getPost('ket_aktif') == 0) {
                $password2  = $this->request->getPost('tgl_lahir');
                $password   = sha1($password2);

                $data['password'] = $password;
            }
            $this->users->update($id, $data);
            return redirect()->to(site_url('masterdata'))->with('success', 'Data Berhasil Diupdate');
        } elseif ($this->request->getVar('role_htd') == 4 && $this->request->getVar('role_komite') == null) {
            $data = [

                'nama_user'             => $this->request->getVar('nama_user'),
                'tgl_lahir'             => $this->request->getVar('tgl_lahir'),
                'email_korpo'           => $email,
                'no_hp'                 => $this->request->getVar('no_hp'),
                'htd_area'              => $this->request->getVar('htd_area'),
                'unit_induk'            => $this->request->getVar('unit_induk'),
                'unit_pelaksana'        => $this->request->getVar('unit_pelaksana'),
                'sub_unit_pelaksana'    => $this->request->getVar('sub_unit_pelaksana'),
                'role_htd'              => $this->request->getVar('role_htd'),
                'role_admin'            => $this->request->getVar('role_admin'),
                'role_adm_acc'          => $this->request->getVar('role_adm_acc'),
                'role_adm_eclinic'      => $this->request->getVar('role_adm_eclinic'),
                'role_adm_hi'           => $this->request->getVar('role_adm_hi'),
                'role_adm_org'          => $this->request->getVar('role_adm_org'),
                'role_adm_kinerja'      => $this->request->getVar('role_adm_kinerja'),
                'role_adm_diklat'       => $this->request->getVar('role_adm_diklat'),
                'role_adm_sertifikasi'  => $this->request->getVar('role_adm_sertifikasi'),

            ];
            if ($this->request->getPost('ket_aktif') == 0) {
                $password2  = $this->request->getPost('tgl_lahir');
                $password   = sha1($password2);

                $data['password'] = $password;
            }
            $this->users->update($id, $data);
            return redirect()->to(site_url('masterdata'))->with('success', 'Data Berhasil Diupdate');
        } else {
            $data = [

                'nama_user'             => $this->request->getVar('nama_user'),
                'tgl_lahir'             => $this->request->getVar('tgl_lahir'),
                'email_korpo'           => $email,
                'no_hp'                 => $this->request->getVar('no_hp'),
                'htd_area'              => $this->request->getVar('htd_area'),
                'unit_induk'            => $this->request->getVar('unit_induk'),
                'unit_pelaksana'        => $this->request->getVar('unit_pelaksana'),
                'sub_unit_pelaksana'    => $this->request->getVar('sub_unit_pelaksana'),
                'role_htd'              => $this->request->getVar('role_htd'),

            ];
            if ($this->request->getPost('ket_aktif') == 0) {
                $password2  = $this->request->getPost('tgl_lahir');
                $password   = sha1($password2);

                $data['password'] = $password;
            }
            $this->users->update($id, $data);
            return redirect()->to(site_url('masterdata'))->with('success', 'Data Berhasil Diupdate');
        }
    }

    public function del_dapeg($id = null)
    {
        // $this->users->where('user_id', $id)->delete();
        $this->users->delete($id);
        return redirect()->to(site_url('masterdata'))->with('success', 'Data Berhasil Dihapus');
    }

    public function del_rjab($id = null)
    {
        // $this->users->where('user_id', $id)->delete();
        $this->rjab->delete($id);
        return redirect()->to(site_url('masterdata/rjab'))->with('success', 'Data Berhasil Dihapus');
    }

    public function detaildapeg($id = null)
    {

        $dapeg = $this->users->getDetail($id);
        $rjab = $this->rjab->get($id);
        $rpend = $this->rpend->get($id);
        $rsert = $this->rsert->get($id);
        $kode_nip = $dapeg->nip;
        $kode_org_unit = $dapeg->kode_org_unit;
        $kode_org_tiga = $dapeg->sub_unit_pelaksana;
        $jenjab = $dapeg->jenjab;
        $sql = "SELECT SUM(datediff(end_date, start_date)) AS jumlah\n"
            . "FROM tb_riwayat_jabatan\n"
            . "WHERE kode_nip = '$kode_nip' AND kode_riwayat_org_unit = '$kode_org_unit' AND kode_riwayat_org_tiga = '$kode_org_tiga' AND jenjang_jabatan = '$jenjab' AND end_date != '9999-12-31';";
        $jumlah = $this->db->query($sql)->getRow();
        if ($dapeg) {
            $data['dapeg']      = $dapeg;
            $data['rjab']      = $rjab;
            $data['rpend']      = $rpend;
            $data['rsert']      = $rsert;
            $data['jumlah']     = $jumlah;
            return view('master/detaildapeg', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    // bagian untuk master data sertifikasi
    public function sertifikasi()
    {
        // $builder        = $this->users;
        // $query          = $builder->getAll();
        // $data['user']   = $query;

        $data['rsert']   = $this->rsert->getAll();

        return view('master/sertifikasi', $data);
    }
}
