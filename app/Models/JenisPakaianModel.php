<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisPakaianModel extends Model
{
    protected $table = 'jenis_pakaian';
    protected $primaryKey = 'id_jenis_pakaian';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_jenis_pakaian',
        'nama_jenis_pakaian',
        'keterangan_jenis_pakaian',
    ];
}