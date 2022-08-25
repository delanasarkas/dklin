<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\CabangModel;

class DashboardAdmin extends BaseController
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
            $modelCabang = new CabangModel();
            $db = \Config\Database::connect();

            $dataGeneral = $modelGeneral->findAll();
            $dataCabang = $modelCabang->findAll();
            $grafik = $db->query("SELECT 
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 1) as januari, 
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 2) as februari,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 3) as maret,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 4) as april,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 5) as mei,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 6) as juni,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 7) as juli,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 8) as agustus,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 9) as september,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 10) as oktober,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 11) as november,
            (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 12) as desember
            FROM orders a, users b
            WHERE a.id_users = b.id_users
            AND b.id_cabang = 2
            AND YEAR(a.created_at) = YEAR(CURRENT_DATE())")->getResult('array');

            $omset = $db->query("SELECT 
            (SELECT SUM(a.total_order) WHERE DATE(a.created_at) = CURRENT_DATE()) as omset,
            (SELECT SUM(a.total_order) DIV 1 WHERE DATE(a.created_at) = CURRENT_DATE()) as rata
            FROM orders a, users b
            WHERE a.id_users = b.id_users
            AND b.id_cabang = 2")->getResult('array');

            $grade = $db->query("SELECT 
            a.nama_layanan, 
            COUNT(a.nama_layanan) as count
            FROM layanan a, orders b, users c
            WHERE a.id_layanan = b.id_layanan 
            AND b.id_users = c.id_users
            AND DATE(b.created_at) = CURRENT_DATE()
            AND c.id_cabang = 2
            GROUP BY a.nama_layanan
            ORDER BY count desc")->getResult('array');

            $data = [
                "title" => "Dashboard",
                "data_general" => $dataGeneral,
                "data_cabang" => $dataCabang,
                "grafik" => $grafik,
                "omset" => $omset,
                "grade" => $grade,
                "id_cabang" => 2,
                "tgl_awal" => date('Y-m-d'),
                "tgl_akhir" => date('Y-m-d'),
            ];
    
            if(session()->get('role') === 'kasir') {
                return view('dashboard\dashboard', $data);
            } else {
                return view('dashboard_admin\dashboard_admin', $data);
            }
        }
    }

    public function filter()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            $cabang = $this->request->getVar('cabang');
            $tanggal_awal = $this->request->getVar('tanggal_awal');
            $tanggal_akhir = $this->request->getVar('tanggal_akhir');
            
            if($cabang != null) {
                $modelGeneral = new GeneralModel();
                $modelCabang = new CabangModel();
                $db = \Config\Database::connect();
    
                $dataGeneral = $modelGeneral->findAll();
                $dataCabang = $modelCabang->findAll();
                $grafik = $db->query("SELECT 
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 1) as januari, 
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 2) as februari,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 3) as maret,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 4) as april,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 5) as mei,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 6) as juni,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 7) as juli,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 8) as agustus,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 9) as september,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 10) as oktober,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 11) as november,
                (SELECT SUM(a.total_order) WHERE MONTH(a.created_at) = 12) as desember
                FROM orders a, users b
                WHERE a.id_users = b.id_users
                AND b.id_cabang = $cabang
                AND YEAR(a.created_at) = YEAR(CURRENT_DATE())")->getResult('array');

                $omset = $db->query("SELECT 
                (SELECT SUM(a.total_order)) as omset,
                (SELECT SUM(a.total_order) DIV COUNT(a.created_at BETWEEN '$tanggal_awal' AND '$tanggal_akhir')) as rata
                FROM orders a, users b
                WHERE a.id_users = b.id_users
                AND b.id_cabang = $cabang
                AND DATE(a.created_at) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->getResult('array');

                $grade = $db->query("SELECT 
                a.nama_layanan, 
                COUNT(a.nama_layanan) as count
                FROM layanan a, orders b, users c
                WHERE a.id_layanan = b.id_layanan 
                AND b.id_users = c.id_users
                AND DATE(b.created_at) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                AND c.id_cabang = $cabang
                GROUP BY a.nama_layanan
                ORDER BY count desc")->getResult('array');
    
                $data = [
                    "title" => "Dashboard",
                    "data_general" => $dataGeneral,
                    "data_cabang" => $dataCabang,
                    "grafik" => $grafik,
                    "omset" => $omset,
                    "grade" => $grade,
                    "id_cabang" => $cabang,
                    "tgl_awal" => $tanggal_awal,
                    "tgl_akhir" => $tanggal_akhir,
                ];
        
                if(session()->get('role') === 'kasir') {
                    return view('dashboard\dashboard', $data);
                } else {
                    return view('dashboard_admin\dashboard_admin', $data);
                }
            } else {
                return redirect()->back();
            }
        }
    }
}
