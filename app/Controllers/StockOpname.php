<?php

namespace App\Controllers;

class StockOpname extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Stock Opname",
        ];

        return view('dashboard_admin\stock_opname\stock_opname', $data);
    }
}
