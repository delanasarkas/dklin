<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_order',
        'id_users',
        'id_customer',
        'id_layanan',
        'id_jenis_pakaian',
        'id_pembayaran',
        'id_proses',
        'no_nota',
        'berat',
        'tgl_selesai',
        'tgl_lunas',
        'total_order',
        'total_bayar',
        'status',
        'created_at',
    ];
}