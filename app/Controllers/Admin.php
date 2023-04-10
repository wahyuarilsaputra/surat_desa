<?php

namespace App\Controllers;
use App\Models\M_Admin;
use App\Models\M_Login;
use App\Models\M_Form;

class Admin extends BaseController
{
    public function index()
    {
        $Admin_Model = new M_Admin();

        $data = $Admin_Model->count_data();
        $data['tampil'] = $Admin_Model->view_data();

        return view('admin', $data);
    }
}
