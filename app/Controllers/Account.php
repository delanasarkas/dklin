<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\UsersModel;

class Account extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            $id_users = session()->get('id_users');
            $modelGeneral = new GeneralModel();
            $modelUsers = new UsersModel();

            $dataGeneral = $modelGeneral->findAll();
            $dataUsers = $modelUsers->find($id_users);

            $data = [
                "title" => "Account",
                "data_general" => $dataGeneral,
                "data_detail" => $dataUsers,
            ];
    
            return view('auth\account', $data);
        }
    }

    public function ubah_profile($id)
    {
        $userModel = new UsersModel();

        // GET FIELD VALUE
        $username = $this->request->getVar('username');
        $no_telepon = $this->request->getVar('telepon');

        $userModel->update($id, [
            'username' => $username,
            'no_telepon' => $no_telepon,
        ]);

        session()->setFlashdata('success', 'Akun profile di ubah');
        return redirect()->to('/account');
    }

    public function ubah_password($id)
    {
        
        // GET FIELD VALUE
        $new_password = $this->request->getVar('new_password');
        $confirm_new_password = $this->request->getVar('confirm_new_password');
        
        if($new_password != $confirm_new_password) {
            session()->setFlashdata('error', 'Password dan konfirmasi password tidak sama');
            return redirect()->to('/account');
        } else {
            $userModel = new UsersModel();

            $userModel->update($id, [
                'password' => md5($confirm_new_password)
            ]);
    
            session()->setFlashdata('success', 'Password profile di ubah');
            return redirect()->to('/account');
        }
    }
}
