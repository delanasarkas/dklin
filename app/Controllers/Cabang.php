<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\CabangModel;

class Cabang extends BaseController
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
            $modelCabang = new CabangModel();

            $dataGeneral = $modelGeneral->findAll();
            $dataCabang = $modelCabang->findAll();

            $data = [
                "title" => "Cabang",
                "data_general" => $dataGeneral,
                "data_table" => $dataCabang,
            ];
    
            return view('dashboard_admin\cabang\cabang', $data);
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
            $dataGeneral = $modelGeneral->findAll();

            $data = [
                "title" => "Tambah Cabang",
                "data_general" => $dataGeneral,
            ];
    
            return view('dashboard_admin\cabang\tambah_cabang', $data);
        }
    }

    public function tambah_proses()
    {
        $modelCabang = new CabangModel();

        // GET FIELD VALUE
        $nama_cabang = $this->request->getVar('nama_cabang');
        $alamat_cabang = $this->request->getVar('alamat_cabang');

        $modelCabang->save([
            'nama_cabang' => $nama_cabang,
            'alamat_cabang' => $alamat_cabang,
        ]);

        session()->setFlashdata('success', 'Tambah cabang berhasil');
        return redirect()->to('/cabang');
    }

    public function detail($id)
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/auth/login');
        } else {
            if(session()->get('role') != 'owner') {
                return redirect()->back();
            }
            
            $modelCabang = new CabangModel();
            $modelGeneral = new GeneralModel();

            $dataCabang = $modelCabang->find($id);
            $dataGeneral = $modelGeneral->findAll();

            $data = [
                'title' => 'Ubah Cabang',
                'data_detail' => $dataCabang,
                "data_general" => $dataGeneral,
            ];

			return view('dashboard_admin\cabang\ubah_cabang', $data);
		}

    }

    public function ubah($id)
    {
        $modelCabang = new CabangModel();

        // GET FIELD VALUE
        $nama_cabang = $this->request->getVar('nama_cabang');
        $alamat_cabang = $this->request->getVar('alamat_cabang');

        $modelCabang->update($id, [
            'nama_cabang' => $nama_cabang,
            'alamat_cabang' => $alamat_cabang,
        ]);

        session()->setFlashdata('success', 'Cabang berhasil di ubah');
        return redirect()->to('/cabang');
    }

    public function hapus($id)
    {
        $modelCabang = new CabangModel();

        $modelCabang->delete($id);

        session()->setFlashdata('success', 'Cabang berhasil di hapus');
        return redirect()->to('/cabang');
    }
}
