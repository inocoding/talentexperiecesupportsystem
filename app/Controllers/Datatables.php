<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\MDatatables;

class Datatables extends BaseController
{

    public function table_data()
    {
        $model = new MDatatables();

        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->user_id;
            $row[] = $key->nip;
            $row[] = $key->nama_user;
            $row[] = $key->tgl_lahir;
            $row[] = $key->email_korpo;
            $row[] = $key->email_non;
            $row[] = $key->no_hp;
            $row[] = $key->ket_aktif;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $jumlah_semua->jml,
            "recordsFiltered" => $jumlah_filter->jml,
            "data" => $data
        );
        echo json_encode($output);
    }

    //--------------------------------------------------------------------

}
