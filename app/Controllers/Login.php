<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        if(session()->get('logged_in')){
            return redirect()->back();
        } else {
            return view('auth\login');
        }
    }

    public function submit_login()
	{
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
            'password' => md5($password)
        ])->first();
        if ($dataUser) {
            session()->set([
                'id_users' => $dataUser['id_users'],
                'id_cabang' => $dataUser['id_cabang'],
                'username' => $dataUser['username'],
                'no_telepon' => $dataUser['no_telepon'],
                'role' => $dataUser['role'],
                'logged_in' => TRUE
            ]);

            // update login date
            $users->update($dataUser['id_users'], [
                'tgl_login' => date("Y-m-d H:i:s", time() + 86400)
            ]);

            session()->setFlashdata('success', 'Anda berhasil login');

            if($dataUser['role'] == 'admin' || $dataUser['role'] == 'owner') {
                return redirect()->to('/dashboard-admin');
            } else {
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('error', 'Email atau Password Salah');
            return redirect()->back();
        }
	}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
