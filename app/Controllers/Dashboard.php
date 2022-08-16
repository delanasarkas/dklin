<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
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
}
