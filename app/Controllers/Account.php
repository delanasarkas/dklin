<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Account",
        ];

        return view('auth\account', $data);
    }
}
