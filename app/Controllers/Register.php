<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Register extends BaseController
{
    public function index()
    {
        if(session()->get('logged_in')){
            return redirect()->back();
        } else {
            return view('auth\register');
        }
    }

    public function submit_register()
	{   
		$userModel = new UsersModel();

        // GET FIELD VALUE
        $username = $this->request->getVar('username');
        $no_telepon = $this->request->getVar('no_telepon');
        $password = $this->request->getVar('password');

        $userModel->save([
            'username' => $username,
            'no_telepon' => $no_telepon,
            'password' => md5($password),
            'role' => 'kasir',
        ]);

        session()->setFlashdata('success', 'Daftar akun berhasil');
        return redirect()->to('/login');
	}
}
