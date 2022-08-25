<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\JenisPakaianModel;

class JenisPakaian extends BaseController
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
            $modelJenisPakaian = new JenisPakaianModel();

            $dataGeneral = $modelGeneral->findAll();
            $dataJenisPakaian = $modelJenisPakaian->findAll();

            $data = [
                "title" => "Jenis Pakaian",
                "data_general" => $dataGeneral,
                "data_table" => $dataJenisPakaian,
            ];
    
            return view('dashboard_admin\jenis_pakaian\jenis_pakaian', $data);
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
                "title" => "Tambah Jenis Pakaian",
                "data_general" => $dataGeneral,
            ];
    
            return view('dashboard_admin\jenis_pakaian\tambah_jenis', $data);
        }
    }

    public function tambah_proses()
    {
        $modelJenisPakaian = new JenisPakaianModel();

        // GET FIELD VALUE
        $nama_jenis = $this->request->getVar('nama_jenis');
        $keterangan_jenis = $this->request->getVar('keterangan_jenis');

        $modelJenisPakaian->save([
            'nama_jenis_pakaian' => $nama_jenis,
            'keterangan_jenis_pakaian' => $keterangan_jenis,
        ]);

        session()->setFlashdata('success', 'Tambah jenis pakaian berhasil');
        return redirect()->to('/jenis-pakaian');
    }

    public function detail($id)
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/auth/login');
        } else {
            if(session()->get('role') != 'owner') {
                return redirect()->back();
            }
            
            $modelJenisPakaian = new JenisPakaianModel();
            $modelGeneral = new GeneralModel();

            $dataJenisPakaian = $modelJenisPakaian->find($id);
            $dataGeneral = $modelGeneral->findAll();

            $data = [
                'title' => 'Ubah Jenis Pakaian',
                'data_detail' => $dataJenisPakaian,
                "data_general" => $dataGeneral,
            ];

			return view('dashboard_admin\jenis_pakaian\ubah_jenis', $data);
		}

    }

    public function ubah($id)
    {
        $modelJenisPakaian = new JenisPakaianModel();

        // GET FIELD VALUE
        $nama_jenis = $this->request->getVar('nama_jenis');
        $keterangan_jenis = $this->request->getVar('keterangan_jenis');

        $modelJenisPakaian->update($id, [
            'nama_jenis_pakaian' => $nama_jenis,
            'keterangan_jenis_pakaian' => $keterangan_jenis,
        ]);

        session()->setFlashdata('success', 'Jenis pakaian berhasil di ubah');
        return redirect()->to('/jenis-pakaian');
    }

    public function hapus($id)
    {
        $modelJenisPakaian = new JenisPakaianModel();

        $modelJenisPakaian->delete($id);

        session()->setFlashdata('success', 'Jenis pakaian berhasil di hapus');
        return redirect()->to('/jenis-pakaian');
    }
}
