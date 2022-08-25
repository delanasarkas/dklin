<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_pembayaran',
        'nama_pembayaran',
        'tipe_pembayaran',
    ];
}