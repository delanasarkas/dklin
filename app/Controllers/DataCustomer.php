<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\CustomerModel;

class DataCustomer extends BaseController
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
            $dataTable = $db->query("SELECT a.id_customer, a.nama_customer, a.telp_customer, a.alamat_customer, a.deposit_customer, a.tgl_gabung, a.tgl_terakhir_laundry, b.username, c.nama_cabang FROM customer a, users b, cabang c WHERE a.id_users = b.id_users AND b.id_cabang = c.id_cabang ORDER BY a.id_customer DESC")->getResult('array');

            $data = [
                "title" => "Data Customer",
                "data_general" => $dataGeneral,
                "data_table" => $dataTable,
            ];
    
            return view('dashboard_admin\data_customer\data_customer', $data);
        }
    }

    public function ubah($id)
    {
        $modelCustomer = new CustomerModel();

        // GET FIELD VALUE
        $nama_customer = $this->request->getVar('nama_customer');
        $telp_customer = $this->request->getVar('telp_customer');
        $alamat_customer = $this->request->getVar('alamat_customer');

        $modelCustomer->update($id, [
            'nama_customer' => $nama_customer,
            'telp_customer' => $telp_customer,
            'alamat_customer' => $alamat_customer,
        ]);

        session()->setFlashdata('success', 'Customer berhasil di ubah');
        return redirect()->to('/data-customer');
    }
}
