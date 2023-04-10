<?php

namespace App\Controllers;
use App\Models\M_Admin;
use App\Models\M_Login;
use App\Models\M_Form;

class Logout extends BaseController
{
    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('Login/login');
    }
}
