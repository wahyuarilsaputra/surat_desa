<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Skk extends Model
{
    protected $tb_skk = 'tb_skk';
    // protected $pager;
    protected $db;
    public function view_data()
    {
        $query = $this->db->table($this->tb_skk)->get();
        return $query->getResult();
    }
    public function delete_data($kode_surat)
    {
        return $this->where('kode_surat', $kode_surat)->delete();
    }
    // public function pagination(){
    //     $this->pager = \Config\Services::pager();
    //     return $this->findAll();
    // }
}
