<?php

namespace App\Controllers;
use App\Models\GeneralModel;

class General extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            if(session()->get('role') != 'owner') {
                return redirect()->back();
            }
            
            $modelGeneral = new GeneralModel();
            $dataGeneral = $modelGeneral->findAll();

            $data = [
                "title" => "Settings",
                "data_general" => $dataGeneral
            ];
    
            return view('dashboard_admin\settings\settings', $data);
        }
    }

    public function ubah($id)
    {
        $modelGeneral = new GeneralModel();

        // GET FIELD VALUE
        $nama_general = $this->request->getVar('nama_general');
        $contact_general = $this->request->getVar('contact_general');
        $alamat_general = $this->request->getVar('alamat_general');

        $modelGeneral->update($id, [
            'nama_general' => $nama_general,
            'contact_general' => $contact_general,
            'alamat_general' => $alamat_general,
        ]);

        session()->setFlashdata('success', 'General berhasil di ubah');
        return redirect()->to('/settings');
    }
}
