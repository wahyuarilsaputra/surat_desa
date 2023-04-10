<?php

namespace App\Controllers;
use App\Models\M_Skk;
use App\Models\M_Form;

class Skk extends BaseController
{
    public function index()
    {
        $Skk_Model = new M_Skk();
        // $data = $Skk_Model->count_data();
        $data['tampil'] = $Skk_Model->view_data();

        return view('skk', $data);
    }
    public function hapus_skk($kode_surat)
    {
        $Skk_Model = new M_Skk();
        if ($Skk_Model->delete_data($kode_surat)) {
            return redirect()->to('Skk/index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('Skk/skk')->with('error', 'Data gagal dihapus');
        }
        // $Skk_Model->delete($id_surat);
        // redirect()
        return view('form/skk');
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
        return redirect()->to('Warga/index');
    }
}

