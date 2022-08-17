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
    public function tambah()
    {
        $data = [
            "title" => "Tambah Karyawan",
        ];

        return view('dashboard_admin\data_karyawan\tambah_karyawan', $data);
    }
}
