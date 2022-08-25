<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\ProsesModel;

class Proses extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            if(session()->get('role') != 'kasir') {
                return redirect()->back();
            }
            
            $modelGeneral = new GeneralModel();
            $db = \Config\Database::connect();

            $dataGeneral = $modelGeneral->findAll();
            $id_users = session()->get('id_users');
            $dataOrder = $db->query("SELECT a.id_order, a.no_nota, a.berat, a.total_order, a.total_bayar, a.status, a.created_at, b.nama_customer, b.telp_customer, c.nama_layanan, c.tipe_layanan, d.nama_pembayaran, d.tipe_pembayaran, e.id_proses, e.rinci, e.cuci, e.setrika, e.packing, e.delivery FROM orders a, customer b, layanan c, pembayaran d, proses e WHERE a.id_customer = b.id_customer AND a.id_layanan = c.id_layanan AND a.id_pembayaran = d.id_pembayaran AND a.id_proses = e.id_proses AND a.id_users = $id_users AND MONTH(a.created_at) = MONTH(CURRENT_DATE()) ORDER BY a.id_order DESC")->getResult('array');

            $data = [
                "title" => "Proses",
                "data_general" => $dataGeneral,
                'data_order' => $dataOrder
            ];
    
            return view('dashboard\proses\proses', $data);
        }
    }

    public function ubah($id)
    {
        $modelProses = new ProsesModel();

        // GET FIELD VALUE
        $rinci = $this->request->getVar('rinci');
        $cuci = $this->request->getVar('cuci');
        $setrika = $this->request->getVar('setrika');
        $packing = $this->request->getVar('packing');
        $delivery = $this->request->getVar('delivery');

        $modelProses->update($id, [
            'rinci' => $rinci,
            'cuci' => $cuci,
            'setrika' => $setrika,
            'packing' => $packing,
            'delivery' => $delivery,
        ]);

        session()->setFlashdata('success', 'Ubah proses berhasil');
        return redirect()->to('/proses');
    }
}
