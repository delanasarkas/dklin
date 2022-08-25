<?php

namespace App\Controllers;
use App\Models\GeneralModel;
use App\Models\CustomerModel;
use App\Models\JenisPakaianModel;
use App\Models\LayananModel;
use App\Models\PembayaranModel;
use App\Models\DepositModel;
use App\Models\ProsesModel;
use App\Models\OrderModel;
use App\Models\UsersModel;

class OrderCustomer extends BaseController
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
            
            $dataTable = $db->query("SELECT a.id_order, a.no_nota, a.berat, a.total_order, a.total_bayar, a.status, b.nama_customer, b.telp_customer, b.deposit_customer, c.nama_layanan, c.tipe_layanan, d.nama_pembayaran, d.tipe_pembayaran FROM orders a, customer b, layanan c, pembayaran d WHERE a.id_customer = b.id_customer AND a.id_layanan = c.id_layanan AND a.id_pembayaran = d.id_pembayaran AND a.id_users = $id_users ORDER BY a.id_order DESC")->getResult('array');

            $data = [
                "title" => "Order Customer",
                "data_general" => $dataGeneral,
                "data_table" => $dataTable
            ];
    
            return view('dashboard\order_customer\order_customer', $data);
        }
    }

    public function kwitansi($id)
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            if(session()->get('role') != 'kasir') {
                return redirect()->back();
            }

            $modelGeneral = new GeneralModel();
            $modelLayanan = new LayananModel();
            $db = \Config\Database::connect();

            $dataGeneral = $modelGeneral->findAll();
            $dataLayanan = $modelLayanan->where('tipe_layanan !=', 'member')->findAll();

            $dataTable = $db->query("SELECT a.id_order, a.id_layanan, a.no_nota, a.berat, a.total_order, a.total_bayar, a.status, a.tgl_selesai, a.created_at, b.nama_customer, b.telp_customer, c.nama_layanan, c.harga_layanan, c.tipe_layanan, d.nama_pembayaran, e.username FROM orders a, customer b, layanan c, pembayaran d, users e WHERE a.id_customer = b.id_customer AND a.id_layanan = c.id_layanan AND a.id_pembayaran = d.id_pembayaran AND a.id_users = e.id_users AND a.id_order = $id")->getResult('array');

            $data = [
                "title" => "Kwitansi",
                "data_table" => $dataTable,
                "data_general" => $dataGeneral,
                "data_layanan" => $dataLayanan,
            ];
    
            return view('dashboard\order_customer\order_kwitansi', $data);
        }
    }

    public function tambah()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            if(session()->get('role') != 'kasir') {
                return redirect()->back();
            }
            
            $modelGeneral = new GeneralModel();
            $modelCustomer = new CustomerModel();
            $modelJenisPakaian = new JenisPakaianModel();
            $modelLayanan = new LayananModel();
            $modelPembayaran = new PembayaranModel();

            $dataCustomer = $modelCustomer->findAll();
            $dataGeneral = $modelGeneral->findAll();
            $dataJenisPakaian = $modelJenisPakaian->findAll();
            $dataPembayaran = $modelPembayaran->orderBy('nama_pembayaran')->findAll();
            $dataLayanan = $modelLayanan->where('tipe_layanan !=', 'member')->findAll();
            $dataLayananMember = $modelLayanan->where('tipe_layanan', 'member')->findAll();

            $data = [
                "title" => "Tambah Nota",
                "data_general" => $dataGeneral,
                "data_customer" => $dataCustomer,
                "data_jenis" => $dataJenisPakaian,
                "data_layanan" => $dataLayanan,
                "data_layanan_member" => $dataLayananMember,
                "data_pembayaran" => $dataPembayaran,
            ];
    
            return view('dashboard\order_customer\tambah_nota', $data);
        }
    }

    public function tambah_customer()
    {
        $modelCustomer = new CustomerModel();
        $modelDeposit = new DepositModel();

        // GET FIELD VALUE
        $nama_customer = $this->request->getVar('nama_customer');
        $telp_customer = $this->request->getVar('telp_customer');
        $alamat_customer = $this->request->getVar('alamat_customer');

        $modelCustomer->save([
            'id_users' => session()->get('id_users'),
            'nama_customer' => $nama_customer,
            'telp_customer' => $telp_customer,
            'alamat_customer' => $alamat_customer,
            'tgl_gabung' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('success', 'Tambah customer berhasil');
        return redirect()->to('/tambah-nota');
    }

    public function tambah_deposit()
    {
        $modelDeposit = new DepositModel();
        $modelCustomer = new CustomerModel();
        $modelLayanan = new LayananModel();

        // GET FIELD VALUE
        $customer = $this->request->getVar('customer');
        $pembayaran = $this->request->getVar('tipe_pembayaran');
        $layanan = $this->request->getVar('deposit_customer');

        $getDataLayananById = $modelLayanan->find($layanan);
        $getDataCustomerById = $modelCustomer->find($customer);

        $modelDeposit->save([
            'id_users' => session()->get('id_users'),
            'id_customer' => $customer,
            'id_pembayaran' => $pembayaran,
            'id_layanan' => $layanan,
            'tgl_deposit' => date("Y-m-d H:i:s"),
        ]);

        $modelCustomer->update($customer, [
            'deposit_customer' => (int) $getDataCustomerById['deposit_customer'] + (int) $getDataLayananById['berat_layanan'],
        ]);

        session()->setFlashdata('success', 'Isi deposit berhasil');
        return redirect()->to('/tambah-nota');
    }

    public function tambah_order()
    {
        $modelCustomer = new CustomerModel();
        $modelOrder = new OrderModel();
        $modelProses = new ProsesModel();
        $modelLayanan = new LayananModel();
        $modelPembayaran = new PembayaranModel();
        $modelUsers = new UsersModel();

        // GET FIELD VALUE
        $customer = $this->request->getVar('customer');
        $jenis = $this->request->getVar('jenis');
        $layanan = $this->request->getVar('layanan');
        $berat = $this->request->getVar('berat');
        $pcs = $this->request->getVar('pcs');
        $tgl_selesai = $this->request->getVar('tgl_selesai');
        $tipe_pembayaran = $this->request->getVar('tipe_pembayaran');
        $status_pembayaran = $this->request->getVar('status_pembayaran');

        $getUsersById = $modelUsers->find(session()->get('id_users'));
        $getLayananById = $modelLayanan->find($layanan);
        $getCustomerById = $modelCustomer->find($customer);
        $getPembayaranById = $modelPembayaran->find($tipe_pembayaran);

        if($getPembayaranById['tipe_pembayaran'] == 'saldo' && (int) $getCustomerById['deposit_customer'] < (int) $berat) {
            session()->setFlashdata('saldo-gagal', 'Saldo tidak mencukupi!');
            return redirect()->to('/tambah-nota');
        } 

        if(
            ($getPembayaranById['tipe_pembayaran'] == 'saldo' && $getLayananById['tipe_layanan'] == 'satuan') || 
            ($getPembayaranById['tipe_pembayaran'] == 'saldo' && (int) $getCustomerById['deposit_customer'] == 0) ||
            ($getPembayaranById['tipe_pembayaran'] == 'multi' && (int) $getCustomerById['deposit_customer'] == 0)
        ) {
            session()->setFlashdata('saldo-gagal', 'Tipe pembayaran tidak sesuai!');
            return redirect()->to('/tambah-nota');
        }

        if($getPembayaranById['tipe_pembayaran'] == 'multi' && (int) $getCustomerById['deposit_customer'] >= (int) $berat) {
            session()->setFlashdata('saldo-gagal', 'Multipayment gagal, saldo deposit masih mencukupi!');
            return redirect()->to('/tambah-nota');
        } 

        if(($getPembayaranById['tipe_pembayaran'] == 'multi' && $status_pembayaran == 'belum_lunas') || ($getPembayaranById['tipe_pembayaran'] == 'saldo' && $status_pembayaran == 'belum_lunas')) {
            session()->setFlashdata('saldo-gagal', 'Order gagal, jika tipe pembayaran saldo deposit / multipayment silakan pilih status pembayaran lunas!');
            return redirect()->to('/tambah-nota');
        }

        $modelProses->save([
            'rinci' => $getUsersById['username']
        ]);

        $modelCustomer->update($customer, [
            'tgl_terakhir_laundry' => date("Y-m-d H:i:s")
        ]);

        $modelOrder->save([
            'id_users' => session()->get('id_users'),
            'id_customer' => $customer,
            'id_layanan' => $layanan,
            'id_jenis_pakaian' => $jenis,
            'id_pembayaran' => $tipe_pembayaran,
            'id_proses' => $modelProses->insertID,
            'no_nota' => 'KW-'.date("dmYHi"),
            'berat' => $getLayananById['tipe_layanan'] == 'kg' ? $berat : $pcs,
            'tgl_selesai' => $tgl_selesai,
            'tgl_lunas' => $status_pembayaran == 'lunas' ? $tgl_selesai : null,
            'total_order' => (int) $getLayananById['harga_layanan'] * (int) $berat,
            'total_bayar' => $status_pembayaran == 'lunas' ? (int) $getLayananById['harga_layanan'] * (int) $berat : 0,
            'status' => $status_pembayaran == 'lunas' ? 'lunas' : 'belum lunas',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        if($getPembayaranById['tipe_pembayaran'] == 'saldo') {
            $modelCustomer->update($customer, [
                'deposit_customer' => $getPembayaranById['tipe_pembayaran'] == 'multi' ? 0 : (int) $getCustomerById['deposit_customer'] - (int) $berat
            ]);
        }

        session()->setFlashdata('success', 'Tambah order berhasil');
        return redirect()->to('/order-customer');
    }

    public function ubah_order($id)
    {
        $modelCustomer = new CustomerModel();
        $modelOrder = new OrderModel();
        $modelProses = new ProsesModel();
        $modelLayanan = new LayananModel();
        $modelPembayaran = new PembayaranModel();
        $modelUsers = new UsersModel();

        // GET FIELD VALUE
        $customer = $this->request->getVar('customer');
        $jenis = $this->request->getVar('jenis');
        $layanan = $this->request->getVar('layanan');
        $berat = $this->request->getVar('berat');
        $pcs = $this->request->getVar('pcs');
        $tgl_selesai = $this->request->getVar('tgl_selesai');
        $tipe_pembayaran = $this->request->getVar('tipe_pembayaran');
        $status_pembayaran = $this->request->getVar('status_pembayaran');

        $getUsersById = $modelUsers->find(session()->get('id_users'));
        $getLayananById = $modelLayanan->find($layanan);
        $getCustomerById = $modelCustomer->find($customer);
        $getPembayaranById = $modelPembayaran->find($tipe_pembayaran);

        if($getPembayaranById['tipe_pembayaran'] == 'saldo' && (int) $getCustomerById['deposit_customer'] < (int) $berat) {
            session()->setFlashdata('saldo-gagal', 'Saldo tidak mencukupi!');
            return redirect()->to('/ubah-nota');
        } 

        if(
            ($getPembayaranById['tipe_pembayaran'] == 'saldo' && $getLayananById['tipe_layanan'] == 'satuan') || 
            ($getPembayaranById['tipe_pembayaran'] == 'saldo' && (int) $getCustomerById['deposit_customer'] == 0) ||
            ($getPembayaranById['tipe_pembayaran'] == 'multi' && (int) $getCustomerById['deposit_customer'] == 0)
        ) {
            session()->setFlashdata('saldo-gagal', 'Tipe pembayaran tidak sesuai!');
            return redirect()->to('/ubah-nota');
        }

        if($getPembayaranById['tipe_pembayaran'] == 'multi' && (int) $getCustomerById['deposit_customer'] >= (int) $berat) {
            session()->setFlashdata('saldo-gagal', 'Multipayment gagal, saldo deposit masih mencukupi!');
            return redirect()->to('/ubah-nota');
        } 

        if(($getPembayaranById['tipe_pembayaran'] == 'multi' && $status_pembayaran == 'belum lunas') || ($getPembayaranById['tipe_pembayaran'] == 'saldo' && $status_pembayaran == 'belum lunas')) {
            session()->setFlashdata('saldo-gagal', 'Order gagal, jika tipe pembayaran saldo deposit / multipayment silakan pilih status pembayaran lunas!');
            return redirect()->to('/ubah-nota');
        }

        $modelOrder->update($id, [
            'id_customer' => $customer,
            'id_layanan' => $layanan,
            'id_jenis_pakaian' => $jenis,
            'id_pembayaran' => $tipe_pembayaran,
            'berat' => $getLayananById['tipe_layanan'] == 'kg' ? $berat : $pcs,
            'tgl_selesai' => $tgl_selesai,
            'total_order' => (int) $getLayananById['harga_layanan'] * (int) $berat,
            'total_bayar' => $status_pembayaran == 'lunas' ? (int) $getLayananById['harga_layanan'] * (int) $berat : 0,
        ]);

        if($getPembayaranById['tipe_pembayaran'] == 'saldo') {
            $modelCustomer->update($customer, [
                'deposit_customer' => $getPembayaranById['tipe_pembayaran'] == 'multi' ? 0 : (int) $getCustomerById['deposit_customer'] - (int) $berat
            ]);
        }

        session()->setFlashdata('success', 'Ubah order berhasil');
        return redirect()->to('/order-customer');
    }

    public function detail($id)
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            if(session()->get('role') != 'kasir') {
                return redirect()->back();
            }
            
            $modelGeneral = new GeneralModel();
            $modelCustomer = new CustomerModel();
            $modelJenisPakaian = new JenisPakaianModel();
            $modelLayanan = new LayananModel();
            $modelPembayaran = new PembayaranModel();
            $db = \Config\Database::connect();
            
            $dataCustomer = $modelCustomer->findAll();
            $dataGeneral = $modelGeneral->findAll();
            $dataJenisPakaian = $modelJenisPakaian->findAll();
            $dataPembayaran = $modelPembayaran->orderBy('nama_pembayaran')->findAll();
            $dataLayanan = $modelLayanan->where('tipe_layanan !=', 'member')->findAll();
            $dataLayananMember = $modelLayanan->where('tipe_layanan', 'member')->findAll();
            $dataOrder = $db->query("SELECT a.id_order, a.id_layanan, a.no_nota, a.berat, a.total_order, a.total_bayar, a.status, a.tgl_selesai, a.created_at, b.id_customer, b.nama_customer, b.telp_customer, c.id_layanan, c.nama_layanan, c.harga_layanan, c.tipe_layanan, d.id_pembayaran, d.nama_pembayaran, e.username, f.id_jenis_pakaian FROM orders a, customer b, layanan c, pembayaran d, users e, jenis_pakaian f WHERE a.id_customer = b.id_customer AND a.id_layanan = c.id_layanan AND a.id_pembayaran = d.id_pembayaran AND a.id_users = e.id_users AND a.id_jenis_pakaian = f.id_jenis_pakaian AND a.id_order = $id")->getResult('array');

            $data = [
                "title" => "Ubah Nota",
                "data_general" => $dataGeneral,
                "data_customer" => $dataCustomer,
                "data_jenis" => $dataJenisPakaian,
                "data_layanan" => $dataLayanan,
                "data_layanan_member" => $dataLayananMember,
                "data_pembayaran" => $dataPembayaran,
                "data_order" => $dataOrder,
            ];
    
            return view('dashboard\order_customer\ubah_nota', $data);
        }
    }

    public function lunas_order($id)
    {
        $modelOrder = new OrderModel();

        // GET FIELD VALUE
        $dataOrder = $modelOrder->find($id);

        $modelOrder->update($id, [
            'tgl_lunas' => date("Y-m-d H:i:s"),
            'total_bayar' => $dataOrder['total_order'],
            'status' => 'lunas'
        ]);

        session()->setFlashdata('success', 'Order berhasil dilunasi');
        return redirect()->to('/order-customer');
    }
}
