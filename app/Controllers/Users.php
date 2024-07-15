<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $modelName    = 'App\Models\UserModel';
    protected $format       = 'json';

    public function index()
    {
        $data   = $this->respond($this->model->findAll());
        return $data;
    }
}
