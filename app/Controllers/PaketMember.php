<?php

namespace App\Controllers;
use App\Models\GeneralModel;

class PaketMember extends BaseController
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

            $id_users = session()->get('id_users');
            $dataGeneral = $modelGeneral->findAll();
            $dataTable = $db->query("SELECT a.no_nota, a.created_at, a.berat, a.tgl_selesai, b.nama_customer, b.deposit_customer FROM orders a, customer b WHERE a.id_customer = b.id_customer AND MONTH(a.created_at) = MONTH(CURRENT_DATE()) AND a.id_users = $id_users AND (a.id_pembayaran = 4 OR a.id_pembayaran = 6) ORDER BY a.id_order DESC")->getResult('array');

            $data = [
                "title" => "Paket Member",
                "data_general" => $dataGeneral,
                "data_table" => $dataTable
            ];
    
            return view('dashboard\paket_member\paket_member', $data);
        }
    }
}
