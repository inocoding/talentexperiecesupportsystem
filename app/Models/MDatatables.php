<?php

namespace App\Models;

use CodeIgniter\Model;

class MDatatables extends Model
{

    var $column_order = array('nip', 'nama_user', 'tgl_lahir', 'email_korpo', 'email_non', 'no_hp', 'ket_aktif');
    var $order = array('nip' => 'asc');

    function get_datatables()
    {

        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = "nip LIKE '%$search%' OR nama_user LIKE '%$search%' OR tgl_lahir LIKE '%$search%' OR email_korpo LIKE '%$search%' OR email_non LIKE '%$search%'";
        } else {
            $kondisi_search = "user_id != ''";
        }

        // order
        if ($_POST['order']) {
            $result_order = $this->column_order[$_POST['order']['0']['column']];
            $result_dir = $_POST['order']['0']['dir'];
        } else if ($this->order) {
            $order = $this->order;
            $result_order = key($order);
            $result_dir = $order[key($order)];
        }


        // if ($_POST['length'] != -1);
        $db = db_connect();
        $builder = $db->table('user');
        $query = $builder->select('*')
            ->where($kondisi_search)
            ->orderBy($result_order, $result_dir)
            ->limit($_POST['length'], $_POST['start'])
            ->get();
        return $query->getResult();
    }


    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(user_id) as jml FROM user";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {
        // kondisi_search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = " AND (nip LIKE '%$search%' OR nama_user LIKE '%$search%' OR tgl_lahir LIKE '%$search%' OR email_korpo LIKE '%$search%' OR email_non LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }
        $sQuery = "SELECT COUNT(user_id) as jml FROM user WHERE user_id != '' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }
}
