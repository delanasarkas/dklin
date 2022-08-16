<?php

namespace App\Controllers;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
        ];

        return view('dashboard_admin\dashboard_admin', $data);
    }
}
