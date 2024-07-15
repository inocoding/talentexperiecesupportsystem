<?php

function userLogin()
{
    
    $db   = \Config\Database::connect();
    $builder    = $db->table('user');
        $builder->join('tb_org_htd', 'tb_org_htd.kode_org_htd = user.htd_area');
        $builder->join('tb_org_satu', 'tb_org_satu.kode_org_satu = user.unit_induk');
        $builder->join('tb_org_dua', 'tb_org_dua.kode_org_dua = user.unit_pelaksana');
        $builder->join('tb_org_tiga', 'tb_org_tiga.kode_org_tiga = user.sub_unit_pelaksana');
    $query      = $builder->where('nip', session('user_id'))->get();
    return $query->getRow();
    // return $db->table('user')->where('nip', session('user_id'))->get()->getRow();
}
