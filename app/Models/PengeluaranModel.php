<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_pengeluaran',
        'id_users',
        'nama_pengeluaran',
        'jumlah_pengeluaran',
        'tgl_pengeluaran',
    ];
}