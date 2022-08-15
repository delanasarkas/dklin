<?php

namespace App\Controllers;

class OrderCustomer extends BaseController
{
    public function index()
    {
        $data = [
                "title" => "Order Customer",
        ];

        return view('dashboard\order_customer\order_customer', $data);
    }

    public function tambah()
    {
        $data = [
            "title" => "Tambah Nota",
        ];

        return view('dashboard\order_customer\tambah_nota', $data);
    }
}
