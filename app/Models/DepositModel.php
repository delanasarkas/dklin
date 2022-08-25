<?php

namespace App\Models;

use CodeIgniter\Model;

class DepositModel extends Model
{
    protected $table = 'deposit';
    protected $primaryKey = 'id_deposit';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_deposit',
        'id_users',
        'id_customer',
        'id_pembayaran',
        'id_layanan',
        'tgl_deposit',
    ];
}