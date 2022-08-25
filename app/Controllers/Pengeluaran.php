<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\PengeluaranModel;

class Pengeluaran extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            if(session()->get('role') == 'kasir') {
                return redirect()->back();
            }
            
            $modelGeneral = new GeneralModel();
            $db = \Config\Database::connect();

            $dataGeneral = $modelGeneral->findAll();
            $dataPengeluaran = $db->query("SELECT a.id_pengeluaran, a.nama_pengeluaran, a.jumlah_pengeluaran, a.tgl_pengeluaran, b.id_users, b.username FROM pengeluaran a, users b WHERE a.id_users = b.id_users ORDER BY a.id_pengeluaran DESC")->getResult('array');

            $data = [
                "title" => "Pengeluaran",
                "data_general" => $dataGeneral,
                "data_table" => $dataPengeluaran,
            ];
    
            return view('dashboard_admin\pengeluaran\pengeluaran', $data);
        }
    }

    public function tambah()
    {
        $modelPengeluaran = new PengeluaranModel();

        // GET FIELD VALUE
        $nama_pengeluaran = $this->request->getVar('nama_pengeluaran');
        $jumlah_pengeluaran = $this->request->getVar('jumlah_pengeluaran');
        $id_users = session()->get('id_users');

        $modelPengeluaran->save([
            'id_users' => $id_users,
            'nama_pengeluaran' => $nama_pengeluaran,
            'jumlah_pengeluaran' => $jumlah_pengeluaran,
            'tgl_pengeluaran' => date('Y-m-d')
        ]);

        session()->setFlashdata('success', 'Pengeluaran berhasil di simpan');
        return redirect()->to('/pengeluaran');
    }

    public function ubah($id)
    {
        $modelPengeluaran = new PengeluaranModel();

        // GET FIELD VALUE
        $nama_pengeluaran = $this->request->getVar('nama_pengeluaran');
        $jumlah_pengeluaran = $this->request->getVar('jumlah_pengeluaran');

        $modelPengeluaran->update($id, [
            'nama_pengeluaran' => $nama_pengeluaran,
            'jumlah_pengeluaran' => $jumlah_pengeluaran,
        ]);

        session()->setFlashdata('success', 'Pengeluaran berhasil di ubah');
        return redirect()->to('/pengeluaran');
    }

    public function delete($id)
    {
        $modelPengeluaran = new PengeluaranModel();

        $modelPengeluaran->delete($id);

        session()->setFlashdata('success', 'Pengeluaran berhasil di hapus');
        return redirect()->to('/pengeluaran');
    }
}
