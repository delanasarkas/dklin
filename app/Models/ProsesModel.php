<?php

namespace App\Models;

use CodeIgniter\Model;

class ProsesModel extends Model
{
    protected $table = 'proses';
    protected $primaryKey = 'id_proses';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_proses',
        'rinci',
        'cuci',
        'setrika',
        'packing',
        'delivery',
    ];
}