<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\PembayaranModel;

class Pembayaran extends BaseController
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
            $modelPembayaran = new PembayaranModel();

            $dataGeneral = $modelGeneral->findAll();
            $dataPembayaran = $modelPembayaran->findAll();

            $data = [
                "title" => "Pembayaran",
                "data_general" => $dataGeneral,
                "data_table" => $dataPembayaran,
            ];
    
            return view('dashboard_admin\pembayaran\pembayaran', $data);
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
                "title" => "Tambah Pembayaran",
                "data_general" => $dataGeneral,
            ];
    
            return view('dashboard_admin\pembayaran\tambah_pembayaran', $data);
        }
    }

    public function tambah_proses()
    {
        $modelPembayaran = new PembayaranModel();

        // GET FIELD VALUE
        $nama_pembayaran = $this->request->getVar('nama_pembayaran');
        $tipe_pembayaran = $this->request->getVar('tipe_pembayaran');

        $modelPembayaran->save([
            'nama_pembayaran' => $nama_pembayaran,
            'tipe_pembayaran' => $tipe_pembayaran,
        ]);

        session()->setFlashdata('success', 'Tambah pembayaran berhasil');
        return redirect()->to('/pembayaran');
    }

    public function detail($id)
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/auth/login');
        } else {
            if(session()->get('role') != 'owner') {
                return redirect()->back();
            }
            
            $modelPembayaran = new PembayaranModel();
            $modelGeneral = new GeneralModel();

            $dataPembayaran = $modelPembayaran->find($id);
            $dataGeneral = $modelGeneral->findAll();

            $data = [
                'title' => 'Ubah Pembayaran',
                'data_detail' => $dataPembayaran,
                "data_general" => $dataGeneral,
            ];

			return view('dashboard_admin\pembayaran\ubah_pembayaran', $data);
		}

    }

    public function ubah($id)
    {
        $modelPembayaran = new PembayaranModel();

        // GET FIELD VALUE
        $nama_pembayaran = $this->request->getVar('nama_pembayaran');
        $tipe_pembayaran = $this->request->getVar('tipe_pembayaran');

        $modelPembayaran->update($id, [
            'nama_pembayaran' => $nama_pembayaran,
            'tipe_pembayaran' => $tipe_pembayaran,
        ]);

        session()->setFlashdata('success', 'Pembayaran berhasil di ubah');
        return redirect()->to('/pembayaran');
    }

    public function hapus($id)
    {
        $modelPembayaran = new PembayaranModel();

        $modelPembayaran->delete($id);

        session()->setFlashdata('success', 'Pembayaran berhasil di hapus');
        return redirect()->to('/pembayaran');
    }
}
