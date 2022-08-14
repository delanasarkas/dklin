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
}
