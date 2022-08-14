<?php

namespace App\Controllers;

class OrderCustomer extends BaseController
{
    public function index()
    {
        return view('dashboard\order_customer\order_customer');
    }
}
