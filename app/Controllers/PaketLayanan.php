<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\LayananModel;

class PaketLayanan extends BaseController
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
            $modelLayanan = new LayananModel();

            $dataGeneral = $modelGeneral->findAll();
            $dataLayanan = $modelLayanan->findAll();

            $data = [
                "title" => "Paket Layanan",
                "data_general" => $dataGeneral,
                "data_table" => $dataLayanan,
            ];
    
            return view('dashboard_admin\paket_layanan\paket_layanan', $data);
        }
    }

    public function tambah_layanan()
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
                "title" => "Tambah Layanan",
                "data_general" => $dataGeneral,
            ];
    
            return view('dashboard_admin\paket_layanan\tambah_layanan', $data);
        }
    }

    public function tambah_proses()
    {
        $modelLayanan = new LayananModel();

        // GET FIELD VALUE
        $nama_layanan = $this->request->getVar('nama_layanan');
        $tipe_layanan = $this->request->getVar('tipe_layanan');
        $berat_layanan = $this->request->getVar('berat_layanan');
        $harga_layanan = $this->request->getVar('harga_layanan');

        if($tipe_layanan == 'member') {
            $modelLayanan->save([
                'nama_layanan' => $nama_layanan,
                'tipe_layanan' => $tipe_layanan,
                'berat_layanan' => $berat_layanan,
                'harga_layanan' => $harga_layanan,
            ]);
        } else {
            $modelLayanan->save([
                'nama_layanan' => $nama_layanan,
                'tipe_layanan' => $tipe_layanan,
                'harga_layanan' => $harga_layanan,
            ]);
        }

        session()->setFlashdata('success', 'Tambah layanan berhasil');
        return redirect()->to('/paket-layanan');
    }

    public function detail($id)
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/auth/login');
        } else {
            if(session()->get('role') != 'owner') {
                return redirect()->back();
            }
            
            $modelGeneral = new GeneralModel();
            $modelLayanan = new LayananModel();

            $dataLayanan = $modelLayanan->find($id);
            $dataGeneral = $modelGeneral->findAll();

            $data = [
                'title' => 'Ubah Layanan',
                'data_detail' => $dataLayanan,
                "data_general" => $dataGeneral,
            ];

			return view('dashboard_admin\paket_layanan\ubah_layanan', $data);
		}

    }

    public function ubah($id)
    {
        $modelLayanan = new LayananModel();

        // GET FIELD VALUE
        $nama_layanan = $this->request->getVar('nama_layanan');
        $tipe_layanan = $this->request->getVar('tipe_layanan');
        $berat_layanan = $this->request->getVar('berat_layanan');
        $harga_layanan = $this->request->getVar('harga_layanan');

        if($tipe_layanan == 'member') {
            $modelLayanan->update($id, [
                'nama_layanan' => $nama_layanan,
                'tipe_layanan' => $tipe_layanan,
                'berat_layanan' => $berat_layanan,
                'harga_layanan' => $harga_layanan,
            ]);
        } else {
            $modelLayanan->update($id, [
                'nama_layanan' => $nama_layanan,
                'tipe_layanan' => $tipe_layanan,
                'harga_layanan' => $harga_layanan,
            ]);
        }

        session()->setFlashdata('success', 'Layanan berhasil di ubah');
        return redirect()->to('/paket-layanan');
    }

    public function hapus($id)
    {
        $modelLayanan = new LayananModel();

        $modelLayanan->delete($id);

        session()->setFlashdata('success', 'Layanan berhasil di hapus');
        return redirect()->to('/paket-layanan');
    }
}
