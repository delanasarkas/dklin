<?php

namespace App\Controllers;

class PaketMember extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Paket Member",
        ];

        return view('dashboard\paket_member\paket_member', $data);
    }
}
