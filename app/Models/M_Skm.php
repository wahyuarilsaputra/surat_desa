<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Skm extends Model
{
    protected $tb_skm = 'tb_skm';
    protected $db;
    public function view_data()
    {
        $query = $this->db->table($this->tb_skm)->get();
        return $query->getResult();
    }
}
