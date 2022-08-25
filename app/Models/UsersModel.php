<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_users';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_users',
        'id_cabang',
        'username',
        'no_telepon',
        'tgl_daftar',
        'tgl_login',
        'password',
        'role',
    ];
}