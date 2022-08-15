<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Laporan",
        ];

        return view('dashboard\laporan\laporan', $data);
    }
}
