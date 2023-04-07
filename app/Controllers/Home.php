<?php

namespace App\Controllers;
use App\Models\M_Admin;
use App\Models\M_Login;
use App\Models\M_Form;

class Home extends BaseController
{
    public function index()
    {
        $Admin_Model = new M_Admin();

        $data = $Admin_Model->count_data();
        $data['tampil'] = $Admin_Model->view_data();
        //Pagination
        // $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        // $data['result'] = $Admin_Model->paginate(10, 'group1');
        // $data['pager'] = $Admin_Model->pager;
        // $data['currentPage'] = $currentPage;

        return view('admin', $data);
    }
    public function warga()
    {
        return view('warga');
    }
    public function skk()
    {
        return view('form/skk');
    }
    public function login(){
        return view('index');
    }
    public function validasi_login(){
        $Login_Model = new M_Login();
        $username = $this->request->getVar('Username');
        $password = $this->request->getVar('Password');
        // echo $password;
        $user = $Login_Model->validateLogin($username, $password);
        // $user = $Login_Model->where('username', $username)->first();
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
            return redirect()->to('Home/index');
        } else {
            $sessionData = [
              'nik' => $user['nik'],
              'username' => $user['username'],
              'isLoggedIn' => true,
              'isAdmin' => false
            ];
            $session->set($sessionData);
            return redirect()->to('Home/warga');
            }
        } else {
            return redirect()->to('Home/login')->with('error', 'Username or password is incorrect');
            // username tidak ditemukan
        }
    }
    public function form_skk(){
        $data = [
            'nama_skk' => $this->request->getPost('nama'),
            'tempat_lahir_skk' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir_skk' => $this->request->getPost('tgl_lahir'),
            'gender_skk' => $this->request->getPost('gender'),
            'pekerjaan_skk' => $this->request->getPost('pekerjaan'),
            'alamat_skk' => $this->request->getPost('alamat'),
            'hari_meninggal_skk' => $this->request->getPost('hari_meninggal'),
            'tgl_meninggal_skk' => $this->request->getPost('tgl_meninggal'),
            'penyebab_skk' => $this->request->getPost('penyebab'),
            'umur_skk' => $this->request->getPost('umur'),
        ];
        $formModel = new M_Form();
        $formModel->insert($data);
        return redirect()->to('Home/warga');
    }
}
