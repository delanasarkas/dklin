<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\CabangModel;

class StockOpname extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            if(session()->get('role') != 'admin') {
                return redirect()->back();
            }

            $modelGeneral = new GeneralModel();
            $modelCabang = new CabangModel();
            $db = \Config\Database::connect();

            $dataGeneral = $modelGeneral->findAll();
            $dataCabang = $modelCabang->findAll();
            $dateNow = date("Y-m-d");
            $dataTable = $db->query("SELECT a.created_at, a.no_nota, a.total_order, a.total_bayar, b.nama_customer, c.nama_layanan 
            FROM orders a, customer b, layanan c, users d 
            WHERE a.id_customer = b.id_customer 
            AND a.id_layanan = c.id_layanan 
            AND a.id_users = d.id_users 
            AND d.id_cabang = 2
            AND a.status = 'belum lunas'
            AND DATE(a.created_at) BETWEEN '$dateNow' AND '$dateNow'")->getResult('array');

            $data = [
                "title" => "Stock Opname",
                "data_general" => $dataGeneral,
                "tgl_mulai" =>  date("Y-m-d"),
                "tgl_akhir" => date("Y-m-d"),
                "cabang" => 2,
                // "catatan" => null,
                "data_table" => $dataTable,
                "data_cabang" => $dataCabang,
                "data_cabang_name" => null,
            ];
    
            return view('dashboard_admin\stock_opname\stock_opname', $data);
        }
    }

    public function filter()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            // GET FIELD VALUE
            $tanggal_mulai = $this->request->getVar('tanggal_mulai');
            $tanggal_akhir = $this->request->getVar('tanggal_akhir');
            $cabang = $this->request->getVar('cabang');
            // $catatan = $this->request->getVar('catatan');
    
            $modelGeneral = new GeneralModel();
            $modelCabang = new CabangModel();
            $db = \Config\Database::connect();
            
            $dataCabang = $modelCabang->findAll();
            $dataCabangName = $modelCabang->find($cabang);
            $dataGeneral = $modelGeneral->findAll();
            $dataTable = $db->query("SELECT a.created_at, a.no_nota, a.total_order, a.total_bayar, b.nama_customer, c.nama_layanan 
            FROM orders a, customer b, layanan c, users d 
            WHERE a.id_customer = b.id_customer 
            AND a.id_layanan = c.id_layanan 
            AND a.id_users = d.id_users 
            AND d.id_cabang = $cabang
            AND a.status = 'belum lunas'
            AND DATE(a.created_at) BETWEEN '$tanggal_mulai' AND '$tanggal_akhir'")->getResult('array');
    
            $data = [
                "title" => "Stock Opname",
                "data_general" => $dataGeneral,
                "tgl_mulai" => $tanggal_mulai,
                "tgl_akhir" => $tanggal_akhir,
                "cabang" => $cabang,
                // "catatan" => $catatan,
                "data_table" => $dataTable,
                "data_cabang" => $dataCabang,
                "data_cabang_name" => $dataCabangName
            ];
    
            return view('dashboard_admin\stock_opname\stock_opname', $data);
        }
    }
}
