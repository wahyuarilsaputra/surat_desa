<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Admin extends Model
{
    protected $tb_user = 'tb_user';
    protected $tb_pengajuan = 'tb_pengajuan';
    protected $tb_surat = 'tb_surat';
    protected $tb_skk = 'tb_skk';
    // protected $pager;
    protected $db;
    public function count_data()
    {
        $db = \Config\Database::connect();
        $count_sktm = $db->table('tb_sktm')->countAllResults();
        $count_spa = $db->table('tb_spa')->countAllResults();
        $count_skk = $db->table('tb_skm')->countAllResults();
        $count_spk = $db->table('tb_spk')->countAllResults();
        $count_skm = $db->table('tb_skm')->countAllResults();
        $count_slainnya = $db->table('tb_sl')->countAllResults();
        // $count_skeluar = $db->table('tb_arsip_surat')->countAllResults();
        $count_spengajuan = $db->table('tb_pengajuan')->countAllResults();
        return [
            'count_sktm' => $count_sktm,
            'count_spa' => $count_spa,
            'count_skk' => $count_skk,
            'count_spk' => $count_spk,
            'count_skm' => $count_skm,
            'count_slainnya' => $count_slainnya,
            // 'count_skeluar' => $count_skeluar,
            'count_spengajuan' => $count_spengajuan
        ];
    }
    public function view_data()
    {
        // $query = $this->db->table($this->tb_user)->join($this->tb_pengajuan, $this->tb_user.'.NIK = '.$this->tb_pengajuan.'.NIK')->join($this->tb_surat, $this->tb_pengajuan.'.kode_surat = '.$this->tb_surat.'.kode_surat')->get();
        $query = $this->db->table($this->tb_skk)->get();
        return $query->getResult();
    }
    // public function pagination(){
    //     $this->pager = \Config\Services::pager();
    //     return $this->findAll();
    // }
}
