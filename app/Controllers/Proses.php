<?php

namespace App\Controllers;

class Proses extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Proses",
        ];

        return view('dashboard\proses\proses', $data);
    }
}
