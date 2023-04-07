<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Form extends Model
{
    protected $table      = 'tb_skk';
    protected $primaryKey = 'id_pengajuan_skk';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_skk', 'tempat_lahir_skk', 'tgl_lahir_skk','gender_skk','pekerjaan_skk','alamat_skk','hari_meninggal_skk','tgl_meninggal_skk','penyebab_skk','umur_skk'];
}