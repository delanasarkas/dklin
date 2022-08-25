<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_customer',
        'id_users',
        'id_cabang',
        'nama_customer',
        'alamat_customer',
        'telp_customer',
        'deposit_customer',
        'tgl_gabung',
        'tgl_terakhir_laundry',
    ];
}