<?php

namespace App\Controllers;
use App\Models\GeneralModel;

class Laporan extends BaseController
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
            $kasTunai = $db->query("SELECT SUM(a.total_order) as total FROM orders a, pembayaran b WHERE a.id_pembayaran = b.id_pembayaran AND b.tipe_pembayaran = 'cash' AND a.status = 'lunas' AND DATE(a.created_at) = DATE(CURRENT_DATE())")->getResult('array');
            $pengeluaran = $db->query("SELECT SUM(jumlah_pengeluaran) as pengeluaran FROM pengeluaran WHERE DATE(tgl_pengeluaran) = DATE(CURRENT_DATE())")->getResult('array');
            $transfer = $db->query("SELECT SUM(a.total_order) as total FROM orders a, pembayaran b WHERE a.id_pembayaran = b.id_pembayaran AND b.tipe_pembayaran = 'transfer' AND a.status = 'lunas' AND DATE(a.created_at) = DATE(CURRENT_DATE())")->getResult('array');
            $debit = $db->query("SELECT SUM(a.total_order) as total FROM orders a, pembayaran b WHERE a.id_pembayaran = b.id_pembayaran AND b.tipe_pembayaran = 'debit' AND a.status = 'lunas' AND DATE(a.created_at) = DATE(CURRENT_DATE())")->getResult('array');
            $jumlah_nota = $db->query("SELECT * FROM orders WHERE DATE(created_at) = DATE(CURRENT_DATE())")->getNumRows();
            $jumlah_kg = $db->query("SELECT SUM(a.berat) as berat FROM orders a, layanan b WHERE a.id_layanan = b.id_layanan AND b.tipe_layanan = 'kg' AND DATE(a.created_at) = DATE(CURRENT_DATE())")->getResult('array');
            $jumlah_satuan = $db->query("SELECT SUM(a.berat) as berat FROM orders a, layanan b WHERE a.id_layanan = b.id_layanan AND b.tipe_layanan = 'satuan' AND DATE(a.created_at) = DATE(CURRENT_DATE())")->getResult('array');
            $jumlah_order = $db->query("SELECT SUM(total_order) as total FROM orders WHERE DATE(created_at) = DATE(CURRENT_DATE())")->getResult('array');
            $jumlah_order_ofday = $db->query("SELECT SUM(total_order) as total FROM orders WHERE (created_at BETWEEN DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() )")->getResult('array');
            
            $data = [
                "title" => "Laporan",
                "data_general" => $dataGeneral,
                "kas_tunai" => $kasTunai,
                "pengeluaran" => $pengeluaran,
                "transfer" => $transfer,
                "debit" => $debit,
                "jumlah_nota" => $jumlah_nota,
                "jumlah_kg" => $jumlah_kg,
                "jumlah_satuan" => $jumlah_satuan,
                "jumlah_order" => $jumlah_order,
                "jumlah_order_ofday" => $jumlah_order_ofday,
            ];
    
            return view('dashboard\laporan\laporan', $data);
        }
    }
}
