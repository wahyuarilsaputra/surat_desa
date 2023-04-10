<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Login extends Model
{
//     protected $table = 'tb_user';
//     protected $allowedFields = ['username', 'password', 'role_user'];

//     public function getUserByUsername($username)
//     {
//         return $this->where('username', $username)->first();
//     }
// }

    protected $db;
    protected $tabel = 'tb_user';
    protected $allowedFields = ['username', 'password','role_user'];
    // protected $allowedFields = ['user', 'password','role_user'];
    public function validateLogin($username, $password){
        $user = $this->db->table('tb_user')->where(['username' => $username,'password' => $password])->get()->getRowArray();
        return $user;
    }

}
