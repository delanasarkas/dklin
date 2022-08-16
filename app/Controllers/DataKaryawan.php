<?php

namespace App\Controllers;

class DataKaryawan extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Data Karyawan",
        ];

        return view('dashboard_admin\data_karyawan\data_karyawan', $data);
    }
}
