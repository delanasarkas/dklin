<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\CustomerModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            if(session()->get('role') == 'admin' || session()->get('role') == 'owner') {
                return redirect()->to('/dashboard-admin'); 
            }

            $modelGeneral = new GeneralModel();
            $modelCustomer = new CustomerModel();
            $db = \Config\Database::connect();
            
            $dataGeneral = $modelGeneral->findAll();
            $dataCustomer = $modelCustomer->countAllResults();
            $totalKg = $db->query("SELECT SUM(a.berat) as berat FROM orders a, layanan b WHERE a.id_layanan = b.id_layanan AND b.tipe_layanan = 'kg' AND DATE(a.created_at) = DATE(CURRENT_DATE())")->getResult('array');
            $totalOrderKg = $db->query("SELECT SUM(a.total_order) as total_kg FROM orders a, layanan b WHERE a.id_layanan = b.id_layanan AND b.tipe_layanan = 'kg' AND DATE(a.created_at) = DATE(CURRENT_DATE())")->getResult('array');
            $totalOrderSatuan = $db->query("SELECT SUM(a.total_order) as total_kg FROM orders a, layanan b WHERE a.id_layanan = b.id_layanan AND b.tipe_layanan = 'satuan' AND DATE(a.created_at) = DATE(CURRENT_DATE())")->getResult('array');
            $grafik = $db->query("SELECT DATE(created_at) as tgl, SUM(`total_order`) total FROM orders WHERE status = 'lunas' GROUP BY DATE(created_at)")->getResult('array');
            
            $data = [
                "title" => "Dashboard",
                "data_general" => $dataGeneral,
                "data_customer" => $dataCustomer,
                "total_kg" => $totalKg,
                "total_order_kg" => $totalOrderKg,
                "total_order_satuan" => $totalOrderSatuan,
                "grafik" => $grafik
            ];

            if(session()->get('role') === 'kasir') {
                return view('dashboard\dashboard', $data);
            } else {
                return view('dashboard_admin\dashboard_admin', $data);
            }
        }
    }
}
