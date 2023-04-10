<?php

namespace App\Controllers;
use App\Models\M_Skm;
use App\Models\M_Form;

class Skm extends BaseController
{
    public function index()
    {
        $Skm_Model = new M_Skm();
        // $data = $Skm_Model->count_data();
        $data['tampil'] = $Skm_Model->view_data();

        return view('skm', $data);
    }
    public function skk()
    {
        return view('form/skk');
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
