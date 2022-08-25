<?php

namespace App\Models;

use CodeIgniter\Model;

class CabangModel extends Model
{
    protected $table = 'cabang';
    protected $primaryKey = 'id_cabang';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_cabang',
        'nama_cabang',
        'alamat_cabang',
    ];
}