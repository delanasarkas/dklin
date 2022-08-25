<?php

namespace App\Controllers;
use App\Models\GeneralModel;

class DataTf extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            $modelGeneral = new GeneralModel();
            $dataGeneral = $modelGeneral->findAll();

            $data = [
                "title" => "Total Transfer",
                "data_general" => $dataGeneral
            ];
            
            return view('dashboard\data_tf\data_tf', $data);
        }
    }
}
