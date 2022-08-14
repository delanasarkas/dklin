<?php

namespace App\Controllers;

class DataTf extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Total Transfer",
        ];
        
        return view('dashboard\data_tf\data_tf', $data);
    }
}
