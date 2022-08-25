<?php

namespace App\Models;

use CodeIgniter\Model;

class GeneralModel extends Model
{
    protected $table = 'general';
    protected $primaryKey = 'id_general';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_general',
        'nama_general',
        'contact_general',
        'alamat_general',
    ];
}