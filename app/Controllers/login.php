<?php

namespace App\Controllers;
use App\Models\M_Admin;
use App\Models\M_Login;
use App\Models\M_Form;

class Login extends BaseController
{
    public function login()
    {
        $data = [
            'validation' => \config\Services::validation(),
            'error' => 'Username or password is incorrect'
        ];
        return view('index', $data);
    }
    public function validasi_login(){
            if (! $this->validate([
                'Username' => 'required',
                'Password'  => 'required',
            ])) {
                $data['validation'] = $this->validator;
                return view('index', $data);
            } else{
            $Login_Model = new M_Login();
            $username = $this->request->getVar('Username');
            $password = $this->request->getVar('Password');
            $user = $Login_Model->validateLogin($username, $password);
            if ($user) {
                // username ditemukan, lakukan validasi password
                $session = session();
                if ($user['role_user'] == 'Admin') {
                $sessionData = [
                  'nik' => $user['nik'],
                  'username' => $user['username'],
                  'isLoggedIn' => true,
                  'isAdmin' => true
                ];
                $session->set($sessionData);
                return redirect()->to('Admin/index');
                } else {
                $sessionData = [
                  'nik' => $user['nik'],
                  'username' => $user['username'],
                  'isLoggedIn' => true,
                  'isAdmin' => false
                ];
                $session->set($sessionData);
                return redirect()->to('Warga/index');
                }
            } else {
                return redirect()->to('Login/login')->with('error', 'Username or password is incorrect');
                // username tidak ditemukan
            }
        }
    }
}
