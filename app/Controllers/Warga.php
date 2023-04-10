<?php

namespace App\Controllers;
use App\Models\M_Admin;
use App\Models\M_Login;
use App\Models\M_Form;

class Warga extends BaseController
{
    public function index()
    {
        return view('warga');
    }

}
