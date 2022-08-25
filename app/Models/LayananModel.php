<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_layanan',
        'nama_layanan',
        'tipe_layanan',
        'berat_layanan',
        'harga_layanan',
    ];
}