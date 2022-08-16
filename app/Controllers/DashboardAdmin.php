<?php

namespace App\Controllers;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
        ];

        if(session()->get('role') === 'kasir') {
            return view('dashboard\dashboard', $data);
        } else {
            return view('dashboard_admin\dashboard_admin', $data);
        }
    }
}
