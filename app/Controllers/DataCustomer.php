<?php

namespace App\Controllers;

class DataCustomer extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Data Customer",
        ];

        return view('dashboard_admin\data_customer\data_customer', $data);
    }
}
