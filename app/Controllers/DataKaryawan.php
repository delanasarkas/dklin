<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\CabangModel;
use App\Models\UsersModel;

class DataKaryawan extends BaseController
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
            $db = \Config\Database::connect();

            $dataGeneral = $modelGeneral->findAll();
            $dataTable = $db->query("SELECT a.id_users, a.username, a.no_telepon, a.role, a.tgl_daftar, a.tgl_login, b.nama_cabang FROM users a, cabang b WHERE a.id_cabang = b.id_cabang AND a.role != 'owner'")->getResult('array');

            $data = [
                "title" => "Data Karyawan",
                "data_general" => $dataGeneral,
                "data_table" => $dataTable,
            ];
    
            return view('dashboard_admin\data_karyawan\data_karyawan', $data);
        }
    }

    public function tambah()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            if(session()->get('role') != 'owner') {
                return redirect()->back();
            }

            $modelGeneral = new GeneralModel();
            $modelCabang = new CabangModel();

            $dataGeneral = $modelGeneral->findAll();
            $dataCabang = $modelCabang->findAll();

            $data = [
                "title" => "Tambah Karyawan",
                "data_general" => $dataGeneral,
                "data_cabang" => $dataCabang
            ];
    
            return view('dashboard_admin\data_karyawan\tambah_karyawan', $data);
        }
    }

    public function tambah_proses()
    {
		$userModel = new UsersModel();

        // GET FIELD VALUE
        $id_cabang = $this->request->getVar('cabang');
        $nama_lengkap = $this->request->getVar('nama_lengkap');
        $no_telepon = $this->request->getVar('no_telepon');
        $tgl_daftar = date("Y-m-d H:i:s", time() + 86400);
        $jabatan = $this->request->getVar('jabatan');
        $password = '123456';

        $userModel->save([
            'id_cabang' => $id_cabang,
            'username' => $nama_lengkap,
            'no_telepon' => $no_telepon,
            'tgl_daftar' => $tgl_daftar,
            'password' => md5($password),
            'role' => $jabatan,
        ]);

        session()->setFlashdata('success', 'Tambah karyawan berhasil');
        return redirect()->to('/data-karyawan');
    }

    public function detail($id)
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/auth/login');
        } else {
            if(session()->get('role') != 'owner') {
                return redirect()->back();
            }
            
            $db = \Config\Database::connect();
            $modelCabang = new CabangModel();
            $modelGeneral = new GeneralModel();

            $dataCabang = $modelCabang->findAll();
            $dataGeneral = $modelGeneral->findAll();
            $dataTable = $db->query("SELECT a.id_users, a.id_cabang as cabang, a.username, a.no_telepon, a.role, a.tgl_daftar, a.tgl_login, b.nama_cabang, b.id_cabang FROM users a, cabang b WHERE a.id_cabang = b.id_cabang AND a.id_users = $id")->getResult('array');

            $data = [
                'title' => 'Ubah Karyawan',
                'data_detail' => $dataTable,
                'data_cabang' => $dataCabang,
                "data_general" => $dataGeneral,
            ];

			return view('dashboard_admin\data_karyawan\ubah_karyawan', $data);
		}

    }

    public function ubah($id)
    {
        $userModel = new UsersModel();

        // GET FIELD VALUE
        $id_cabang = $this->request->getVar('cabang');
        $nama_lengkap = $this->request->getVar('nama_lengkap');
        $no_telepon = $this->request->getVar('no_telepon');
        $jabatan = $this->request->getVar('jabatan');

        $userModel->update($id, [
            'id_cabang' => $id_cabang,
            'username' => $nama_lengkap,
            'no_telepon' => $no_telepon,
            'role' => $jabatan,
        ]);

        session()->setFlashdata('success', 'Karyawan berhasil di ubah');
        return redirect()->to('/data-karyawan');
    }

    public function hapus($id)
    {
        $userModel = new UsersModel();

        $userModel->delete($id);

        session()->setFlashdata('success', 'Karyawan berhasil di hapus');
        return redirect()->to('/data-karyawan');
    }
}
