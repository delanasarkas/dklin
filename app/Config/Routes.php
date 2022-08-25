<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Dashboard
$routes->get('/', 'Dashboard::index');

// auth
$routes->get('/login', 'Login::index');
$routes->post('/login/proses', 'Login::submit_login');
$routes->get('/logout', 'Login::logout');
// Account
$routes->get('/account', 'Account::index');
$routes->add('/ubah-profile/(:segment)', 'Account::ubah_profile/$1');
$routes->add('/ubah-password/(:segment)', 'Account::ubah_password/$1');

// $routes->get('/register', 'Register::index');
$routes->post('/register/proses', 'Register::submit_register');

// Order Customer
$routes->get('/order-customer', 'OrderCustomer::index');
$routes->get('/tambah-nota', 'OrderCustomer::tambah');
$routes->get('/view-kwitansi/(:segment)', 'OrderCustomer::kwitansi/$1');
$routes->post('/tambah-customer', 'OrderCustomer::tambah_customer');
$routes->post('/tambah-deposit', 'OrderCustomer::tambah_deposit');
$routes->post('/tambah-order', 'OrderCustomer::tambah_order');
$routes->add('/ubah-order/(:segment)', 'OrderCustomer::ubah_order/$1');
$routes->add('/lunas-order/(:segment)', 'OrderCustomer::lunas_order/$1');
$routes->get('/detail-nota/(:segment)', 'OrderCustomer::detail/$1');

// Data TF/Uang Kas
$routes->get('/data-tf','DataTf::index');

// Pengeluaran
$routes->get('/pengeluaran','Pengeluaran::index');
$routes->post('/tambah-pengeluaran','Pengeluaran::tambah');
$routes->add('/ubah-pengeluaran/(:segment)','Pengeluaran::ubah/$1');
$routes->get('/hapus-pengeluaran/(:segment)','Pengeluaran::delete/$1');

// Proses
$routes->get('/proses', 'Proses::index');
$routes->add('/ubah-proses/(:segment)', 'Proses::ubah/$1');

// Paket Member
$routes->get('/paket-member', 'PaketMember::index');

// Laporan
$routes->get('/laporan', 'Laporan::index');

// Dashboard Admin
$routes->get('/dashboard-admin', 'DashboardAdmin::index');
$routes->post('/dashboard-admin-filter', 'DashboardAdmin::filter');

// Stock Opname
$routes->get('/stock-opname', 'StockOpname::index');
$routes->post('/stock-opname-filter', 'StockOpname::filter');

// Data Customer
$routes->get('/data-customer', 'DataCustomer::index');
$routes->add('/ubah-customer/(:segment)', 'DataCustomer::ubah/$1');

// Data Karyawan
$routes->get('/data-karyawan', 'DataKaryawan::index');
$routes->get('/data-karyawan/(:segment)', 'DataKaryawan::detail/$1');
$routes->get('/tambah-karyawan', 'DataKaryawan::tambah');
$routes->post('/tambah-karyawan/proses', 'DataKaryawan::tambah_proses');
$routes->add('/ubah-karyawan/(:segment)', 'DataKaryawan::ubah/$1');
$routes->get('/hapus-karyawan/(:segment)', 'DataKaryawan::hapus/$1');

// Settings
$routes->get('/settings', 'General::index');
$routes->add('/settings-ubah/(:segment)', 'General::ubah/$1');

// Paket Layanan
$routes->get('/paket-layanan', 'PaketLayanan::index');
$routes->get('/tambah-layanan', 'PaketLayanan::tambah_layanan');
$routes->post('/tambah-layanan/proses', 'PaketLayanan::tambah_proses');
$routes->get('/paket-layanan/(:segment)', 'PaketLayanan::detail/$1');
$routes->add('/ubah-layanan/(:segment)', 'PaketLayanan::ubah/$1');
$routes->get('/hapus-layanan/(:segment)', 'PaketLayanan::hapus/$1');

// Jenis Pakaian
$routes->get('/jenis-pakaian', 'JenisPakaian::index');
$routes->get('/tambah-jenis', 'JenisPakaian::tambah');
$routes->post('/tambah-jenis/proses', 'JenisPakaian::tambah_proses');
$routes->get('/jenis-pakaian/(:segment)', 'JenisPakaian::detail/$1');
$routes->add('/ubah-jenis/(:segment)', 'JenisPakaian::ubah/$1');
$routes->get('/hapus-jenis/(:segment)', 'JenisPakaian::hapus/$1');

// Pembayaran
$routes->get('/pembayaran', 'Pembayaran::index');
$routes->get('/tambah-pembayaran', 'Pembayaran::tambah');
$routes->post('/tambah-pembayaran/proses', 'Pembayaran::tambah_proses');
$routes->get('/pembayaran/(:segment)', 'Pembayaran::detail/$1');
$routes->add('/ubah-pembayaran/(:segment)', 'Pembayaran::ubah/$1');
$routes->get('/hapus-pembayaran/(:segment)', 'Pembayaran::hapus/$1');

// Cabang
$routes->get('/cabang', 'Cabang::index');
$routes->get('/tambah-cabang', 'Cabang::tambah');
$routes->post('/tambah-cabang/proses', 'Cabang::tambah_proses');
$routes->get('/cabang/(:segment)', 'Cabang::detail/$1');
$routes->add('/ubah-cabang/(:segment)', 'Cabang::ubah/$1');
$routes->get('/hapus-cabang/(:segment)', 'Cabang::hapus/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
