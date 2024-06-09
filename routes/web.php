<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;
use Illuminate\Support\Facades\Artisan;
//config-clear


// use name

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
* @superadmin
* Route untuk role superadmin
*/
//route cache clear


Route::middleware(['role:superadmin'])->prefix('superadmin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('superadmin.dashboard');
    Route::get('/', [HomeController::class, 'adminHome'])->name('superadmin.home');

    // profile
    Route::get('/profile/{id}', 'App\Http\Controllers\Admin\SuperadminProfileController@index')->name('superadmin.profile');
    Route::get('/edit/{id}', 'App\Http\Controllers\Admin\SuperadminProfileController@edit')->name('superadmin.edit.profile');
    Route::PUT('/update/{id}', 'App\Http\Controllers\Admin\SuperadminProfileController@update')->name('superadmin.update.profile');

    //customers
    Route::resource('superadmin-customers', 'App\Http\Controllers\Admin\CustomerController');
    Route::delete('/customers/destroy/{customer}', 'App\Http\Controllers\Admin\CustomerController@destroy');
    // Search berdasarkan kota
    Route::get('superadmin-customersSearch', 'App\Http\Controllers\Admin\CustomerController@search')->name('superadmin.customer.search');
    // customer/uploadFoto
    Route::post('/superadmin-customers/upload', 'App\Http\Controllers\Admin\CustomerController@uploadImage');
    // terapis/uploadKtp
    Route::post('/superadmin-customers/uploadKtp', 'App\Http\Controllers\Admin\CustomerController@uploadKtp');

    //fitur terapis
    Route::resource('superadmin-terapis', 'App\Http\Controllers\Admin\TerapisController');
    Route::delete('/superadmin-terapis/destroy/{id}', 'App\Http\Controllers\Admin\TerapisController@destroy');
    // terapis/uploadFoto
    Route::post('/superadmin-terapis/upload', 'App\Http\Controllers\Admin\TerapisController@uploadImage');
    // terapis/uploadKtp
    Route::post('/superadmin-terapis/uploadKtp', 'App\Http\Controllers\Admin\TerapisController@uploadKtp');
    //seacrh perwilayah

    // fitur admin
    Route::resource('superadmin-admin', 'App\Http\Controllers\Admin\AdminController');
    Route::POST('superadmin-admin-update', 'App\Http\Controllers\Admin\AdminController@update');
    Route::delete('/superadmin-admin/destroy/{id}', 'App\Http\Controllers\Admin\AdminController@destroy');

    Route::POST('superadmin-admin-update', 'App\Http\Controllers\Admin\AdminController@update');
    Route::delete('/superadmin-admin/destroy/{id}', 'App\Http\Controllers\Admin\AdminController@destroy');

    // search admin
    Route::get('superadmin-adminSearch', 'App\Http\Controllers\Admin\AdminController@search')->name('superadmin.admin.search');
    // customer/uploadFoto
    Route::post('/superadmin-admin/upload', 'App\Http\Controllers\Admin\AdminController@uploadImage');
    // terapis/uploadKtp
    Route::post('/superadmin-admin/uploadKtp', 'App\Http\Controllers\Admin\AdminController@uploadKtp');

    Route::get('/superadmin-terapisSearch', 'App\Http\Controllers\Admin\TerapisController@searchTerapis')->name('superadmin.terapis.search');
    //finance
    Route::resource('superadmin-finance', 'App\Http\Controllers\Admin\FinanceController');
    Route::POST('superadmin-finance-update', 'App\Http\Controllers\Admin\FinanceController@update');
    //delete
    Route::delete('/superadmin-finance/destroy/{id}', 'App\Http\Controllers\Admin\FinanceController@destroy');
    //bank finance
    Route::resource('superadmin-bank-finance', 'App\Http\Controllers\Admin\FinanceBankController');
    Route::POST('superadmin-bank-finance-update', 'App\Http\Controllers\Admin\FinanceBankController@update');
    Route::delete('superadmin-bank-finance/destroy/{id}', 'App\Http\Controllers\Admin\FinanceBankController@destroy');

    // order
    Route::get('superadmin-orders', 'App\Http\Controllers\Admin\PemesananController@indexSuperAdmin')->name('superadmin.orders');
    // reviews
    Route::resource('superadmin-reviews', 'App\Http\Controllers\Admin\ReviewsController');
    // unsuspend
    Route::resource('superadmin-aduan', 'App\Http\Controllers\Admin\UnsuspendController');
    // {{url('superadmin/super-admin/unsuspend/update-status')}}
    Route::post('/superadmin-aduan/update-status', 'App\Http\Controllers\Admin\UnsuspendController@updateStatus')->name('superadmin.unsuspend.updateStatus');
    // register
    Route::resource('superadmin-registered', 'App\Http\Controllers\Admin\RegisterController');
    // superadmin/superadmin-register/interview
    Route::get('/superadmin-register/interview', 'App\Http\Controllers\Admin\RegisterController@interview')->name('superadmin.register.interview');
    //pendaftaran
    Route::get('/superadmin-register/pendaftaran', 'App\Http\Controllers\Admin\RegisterController@pendaftaran')->name('superadmin.register.pendaftaran');
    // reports
    Route::resource('superadmin-reports', 'App\Http\Controllers\Admin\ReportController');
    Route::resource('superadmin-layanan', 'App\Http\Controllers\Admin\LayananController');
    Route::get('/superadmin-pesanan', 'App\Http\Controllers\Admin\PesananController@index')->name('superadmin.pesanan');

    Route::get('/superadmin-cabang', 'App\Http\Controllers\Admin\CabangController@index')->name('superadmin.cabang');
    // route get penangguhan
    Route::get('/superadmin-aduan', 'App\Http\Controllers\Admin\PenangguhanController@aduanPengguna')->name('superadmin.aduan');
    Route::get('/superadmin-aduan/detail/{id}', 'App\Http\Controllers\Admin\PenangguhanController@detail');


    //Route Mengambil data wilayah indonesia
    Route::get('/getProvinsi', 'App\Http\Controllers\ApiWilayahController@getProvinsi')->name('superadmin.getProvinsi');
    Route::get('/getKota/{id}', 'App\Http\Controllers\ApiWilayahController@getKota')->name('superadmin.getKota');
    Route::get('/getKecamatan/{id}', 'App\Http\Controllers\ApiWilayahController@getKecamatan')->name('superadmin.getKecamatan');
    Route::get('/getKelurahan/{id}', 'App\Http\Controllers\ApiWilayahController@getKelurahan')->name('superadmin.getKelurahan');
});

/*
* @admin
* Route untuk role admin
*/
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');

    // route admin profile
    Route::get('/profile/{id}', 'App\Http\Controllers\Admin\AdminProfileController@index')->name('admin.profile');
    Route::get('/lengkapi', 'App\Http\Controllers\Admin\AdminProfileController@lengkapi_data')->name('admin.lengkapi');
    Route::get('/edit/{id}', 'App\Http\Controllers\Admin\AdminProfileController@edit')->name('edit.profile');
    Route::PUT('/update/{id}', 'App\Http\Controllers\Admin\AdminProfileController@update')->name('update.profile');
    Route::get('/validasi/{id}', 'App\Http\Controllers\Admin\AdminProfileController@validasi')->name('admin.validasi');

    Route::resource('admin-terapis', 'App\Http\Controllers\Admin\TerapisController');
    // order
    Route::get('admin-orders', 'App\Http\Controllers\Admin\PemesananController@indexAdmin')->name('admin.orders');
    // unsuspend
    Route::resource('admin-aduan', 'App\Http\Controllers\Admin\UnsuspendController');
    Route::post('/admin-aduan/update-status', 'App\Http\Controllers\Admin\UnsuspendController@updateStatus')->name('admin.aduan.updateStatus');
    //route registered
    Route::resource('admin-register', 'App\Http\Controllers\Admin\RegisterController');
    // interview
    Route::get('/admin-register-Interview', 'App\Http\Controllers\Admin\RegisterController@interview')->name('admin.register.interview');
    //pendaftaran
    Route::get('/admin-register-Pendaftaran', 'App\Http\Controllers\Admin\RegisterController@pendaftaran')->name('admin.register.pendaftaran');

    Route::resource('admin-layanan', 'App\Http\Controllers\Admin\LayananController');

    // route customer

    Route::resource('admin-customers', 'App\Http\Controllers\Admin\CustomerController');
    Route::get('admin-customers-verif', 'App\Http\Controllers\Admin\CustomerController@index_verifikasi')->name('admin.customers-verif');
    Route::get('/admin-customers-verif-detail/{id}', 'App\Http\Controllers\Admin\CustomerController@verifikasi')->name('admin.customer-verif-detail');

    Route::delete('/customers/destroy/{customer}', 'App\Http\Controllers\Admin\CustomerController@destroy');
    // customer/uploadFoto
    Route::post('/admin-customers/upload', 'App\Http\Controllers\Admin\CustomerController@uploadImage');
    // customer/uploadKtp
    Route::post('/admin-customers/uploadKtp', 'App\Http\Controllers\Admin\CustomerController@uploadKtp');

    //route terapis
    Route::resource('admin-terapis', 'App\Http\Controllers\Admin\TerapisController');
    Route::get('admin-terapis-verif', 'App\Http\Controllers\Admin\TerapisController@index_verifikasi')->name('admin.terapis-verif');
    Route::get('/admin-terapis-verif-detail/{id}', 'App\Http\Controllers\Admin\TerapisController@verifikasi')->name('admin.terapis-verif-detail');

    Route::delete('/admin-terapis/destroy/{id}', 'App\Http\Controllers\Admin\TerapisController@destroy');
    // terapis/uploadFoto
    Route::post('/admin-terapis/upload', 'App\Http\Controllers\Admin\TerapisController@uploadImage');
    // terapis/uploadKtp
    Route::post('/admin-terapis/uploadKtp', 'App\Http\Controllers\Admin\TerapisController@uploadKtp');

    //Route Mengambil data wilayah indonesia
    Route::get('/getProvinsi', 'App\Http\Controllers\ApiWilayahController@getProvinsi')->name('admin.getProvinsi');
    Route::get('/getKota/{id}', 'App\Http\Controllers\ApiWilayahController@getKota')->name('admin.getKota');
    Route::get('/getKecamatan/{id}', 'App\Http\Controllers\ApiWilayahController@getKecamatan')->name('admin.getKecamatan');
    Route::get('/getKelurahan/{id}', 'App\Http\Controllers\ApiWilayahController@getKelurahan')->name('admin.getKelurahan');
});

/*
* @finance
* Route untuk role finance
*/

//Login & Logout
Route::get('/finance/login', 'App\Http\Controllers\Auth\FinanceAuthController@showLoginForm')->name('finance.login');
Route::post('/finance/login', 'App\Http\Controllers\Auth\FinanceAuthController@login');
Route::get('/finance/logout', 'App\Http\Controllers\Auth\FinanceAuthController@logout')->name('finance.logout');

Route::middleware(['finance.auth'])->prefix('finance')->group(function () {

    //FINANCE HOME
    Route::get('/dashboard', 'App\Http\Controllers\Finance\HomeController@index')->name('finance.dashboard');
    // Chart Dashboard
    Route::get('/dashboard/pie', 'App\Http\Controllers\Finance\HomeController@pieChart')->name('finance.dashboard.pie');
    Route::get('/dashboard/line', 'App\Http\Controllers\Finance\HomeController@lineChart')->name('finance.dashboard.line');
    Route::get('/dashboard/mixed', 'App\Http\Controllers\Finance\HomeController@mixedChart')->name('finance.dashboard.mixed');

    //Halaman Customer ( transer, cash, cancel, detail, update detail )
    Route::get('/transfer', 'App\Http\Controllers\Finance\CustomerController@indexTransfer')->name('transfer');
    Route::get('/cash', 'App\Http\Controllers\Finance\CustomerController@indexCash')->name('cash');
    Route::get('/cancel', 'App\Http\Controllers\Finance\CustomerController@cancel')->name('cancel');
    Route::get('/customer/detail/{id}', 'App\Http\Controllers\Finance\CustomerController@detail')->name('detail.customer');
    Route::put('/customer/detail/{id}', 'App\Http\Controllers\Finance\CustomerController@updateDetail')->name('detailUpdate.customer');
    // Searching transaksi customer
    Route::get('/transaksi-customer/search', 'App\Http\Controllers\Finance\CustomerController@search')->name('finance.customer-transaksi.search');
    //Export data Transaksi Customer to Excel
    Route::get('/cash/export', 'App\Http\Controllers\Finance\CustomerController@transaksiCustomerCash')->name('export.customer.cash');
    Route::get('/transfer/export', 'App\Http\Controllers\Finance\CustomerController@transaksiCustomerTransfer')->name('export.customer.transfer');
    Route::get('/cancel/export', 'App\Http\Controllers\Finance\CustomerController@transaksiCustomerCancel')->name('export.customer.cancel');

    //Halaman Terapis ( terapis, cash, member, detail, saldo)
    Route::get('/terapis/nama', 'App\Http\Controllers\Finance\TerapisController@member')->name('nama');
    Route::get('/terapis', 'App\Http\Controllers\Finance\TerapisController@index')->name('terapis');
    Route::get('/terapis/detail/{id}', 'App\Http\Controllers\Finance\TerapisController@detail')->name('detail.terapis');
    //Export data Transaksi terapis to Excel
    Route::get('/terapis/export', 'App\Http\Controllers\Finance\TerapisController@transaksiTerapis')->name('export.transaksi.terapis');
    Route::get('/terapis/nama/export', 'App\Http\Controllers\Finance\TerapisController@memberTerapis')->name('export.member.terapis');
    Route::get('/terapis/detail/{id}/export', 'App\Http\Controllers\Finance\TerapisController@exportDetailTerapis')->name('export.detail.terapis');

    //Penegembalian Dana (cashback , detail)
    Route::get('/cashback', 'App\Http\Controllers\Finance\TransaksiController@refund')->name('cashback');
    Route::get('/cashback/detail/{id}', 'App\Http\Controllers\Finance\TransaksiController@detail')->name('detail.cashback');

    //Halaman Transaksi Keseluruhan
    Route::get('/transaksi', 'App\Http\Controllers\Finance\TransaksiController@index')->name('transaksi');
    Route::get('/transaksi/{tipe}/{id}', 'App\Http\Controllers\Finance\TransaksiController@detail')->name('detail.transaksi.keseluruhan');
    Route::get('/deposit/detail/{id}', 'App\Http\Controllers\Finance\TransaksiController@depositDetail')->name('deposit.detail');


    //Pengembalian Dana (cashback , detail, export)
    Route::get('/refund', 'App\Http\Controllers\Finance\RefundController@index')->name('refund');
    Route::get('/refund/detail/{id}', 'App\Http\Controllers\Finance\RefundController@refundDetail')->name('detail.refund');
    Route::get('/refund/konfirmasi/{id}', 'App\Http\Controllers\Finance\RefundController@refundKonfirmasi')->name('detail.refund.konfirmasi');
    //Export data Refund terapis to Excel
    Route::get('/refund/export', 'App\Http\Controllers\Finance\RefundController@export_excel')->name('export.refund');


    //Penarikan Saldo
    Route::get('/withdrawal', 'App\Http\Controllers\Finance\WithdrawalController@index')->name('withdrawal');
    Route::get('/withdrawal/detail/{id}', 'App\Http\Controllers\Finance\WithdrawalController@withdrawalDetail')->name('withdrawal.detail');
    Route::get('/withdrawal/konfirmasi/{id}', 'App\Http\Controllers\Finance\WithdrawalController@withdrawalKonfirmasi')->name('withdrawal.konfirmasi');
    //Export data  terapis to Excel
    Route::get('/refund/export', 'App\Http\Controllers\Finance\WithdrawalController@export_withdrawal_excel')->name('export.withdrawal');


    // Halaman pengaturan ( index, bank)
    Route::get('/setting', 'App\Http\Controllers\Finance\SettingController@index')->name('setting');
    Route::get('/setting/rekening', 'App\Http\Controllers\Finance\SettingController@bank')->name('setting.rekening');
    Route::get('/setting/reset', 'App\Http\Controllers\Auth\ResetPasswordController@index')->name('setting.reset');

    Route::get('/terapis/detail/detailriwayat', function () {
        return view('keuangan.terapis.detailtransaksi');
    })->name('detailtransaksiterapis');

    // Halaman pengaturan
    Route::get('/setting', 'App\Http\Controllers\Finance\SettingController@index')->name('setting');
});

/*
* @customer
* Route untuk role customer
*/

//customers front end
Route::get('/home', function () {
    return view('customer.customers-splash');
})->name('customers.splash');

Route::get('/customers', 'App\Http\Controllers\Customer\HomeController@index')->name('customers.home');
Route::get('/customers/login', 'App\Http\Controllers\Auth\CustomersAuthController@showLoginForm')->name('customers.login');
Route::post('/customers/login', 'App\Http\Controllers\Auth\CustomersAuthController@login');
Route::get('/customers/logout', 'App\Http\Controllers\Auth\CustomersAuthController@logout')->name('customers.logout');

//proses register terapis dan customers
//get daftar{customer}
Route::get('/register/{customer}', 'App\Http\Controllers\Auth\CustomersAuthController@RegisterCustomer')->name('RegisterCustomer');
Route::post('/register/{customer}', 'App\Http\Controllers\Auth\CustomersAuthController@RegisterCustomerPost')->name('RegisterCustomerPost');
Route::get('/verification', 'App\Http\Controllers\HomeController@verification')->name('verification');
Route::post('/verification', 'App\Http\Controllers\HomeController@postVerification')->name('postVerification');
// resend-verification-code
Route::get('/resend-verification-code', 'App\Http\Controllers\HomeController@resendVerificationCode')->name('resendVerificationCode');

// /pendaftaran terapis
Route::get('/daftar/{terapis}', 'App\Http\Controllers\Auth\CustomersAuthController@RegisterTerapis')->name('RegisterTerapis');
Route::post('/daftar/{terapis}', 'App\Http\Controllers\Auth\CustomersAuthController@RegisterTerapisPost')->name('RegisterTerapisPost');
Route::get('/verification-terapis', 'App\Http\Controllers\HomeController@verification')->name('verificationTerapis');
Route::post('/verification-terapis', 'App\Http\Controllers\HomeController@postVerification')->name('postVerificationTerapis');
Route::post('/resend-verification-code-terapis', 'App\Http\Controllers\HomeController@resendVerificationCodeTerapis')->name('resendVerificationCodeTerapis');


//customers.pilihrole
Route::get('/customers/pilih-role', 'App\Http\Controllers\Auth\CustomersAuthController@pilihRole')->name('customers.pilihrole');
//method post


Route::middleware(['auth', 'role:customer'])->prefix('customers')->group(function () {
    // home
    Route::get('/home', 'App\Http\Controllers\Customer\HomeController@index')->name('customers.dashboard');
    //notifikasi

    //layanan
    Route::get('/layanan', 'App\Http\Controllers\Customer\PemesananController@layanan')->name('customers.layanan');
    // layanan/detail 
    Route::get('/layanan/pesan/{id}', 'App\Http\Controllers\Customer\PemesananController@detailLayanan')->name('customers.detailLayanan');
    //post pemesanan
    Route::get('/layanan/pesan/{id}/detailPemesan', 'App\Http\Controllers\Customer\PemesananController@detailPemesan')->name('customers.detailPemesan');
    Route::post('/layanan/pesan/{id}/detailPemesan', 'App\Http\Controllers\Customer\PemesananController@simpanDetailPemesan')->name('customers.simpanDetailPemesan');
    //post detailPemesan-pencarian-terapis setelah mengisi nama pemesan
    Route::get('/layanan/pesan/{id}/detailPemesan/{id_pemesanan}/pencarian-terapis', 'App\Http\Controllers\Customer\PemesananController@detailPemesanPencarianTerapis')->name('customers.detailPemesanPencarianTerapis');
    // detailPemesanPencarianTerapisSimpan
    Route::post('/layanan/pesan/{id}/detailPemesan/{id_pemesanan}/pencarian-terapis', 'App\Http\Controllers\Customer\PemesananController@detailPemesanPencarianTerapisSimpan')->name('customers.detailPemesanPencarianTerapisSimpan');
    // detailPemesanPencarianTerapisSimpan redirect layanan pesanan
    Route::get('/layanan/pesan/{id}/detailPemesan/{id_pemesanan}/pencarian-terapis/{id_terapis}', 'App\Http\Controllers\Customer\PemesananController@detailPemesanPencarianTerapisID')->name('customers.detailPemesanPencarianTerapisID');
    // layanan/pesan/{id}/detailPemesan/{id_pemesanan}/pencarian-terapis/{id_terapis}/pesan
    Route::post('/layanan/pesan/{id}/detailPemesan/{id_pemesanan}/pencarian-terapis/{id_terapis}/pesan', 'App\Http\Controllers\Customer\PemesananController@detailPemesanPencarianTerapisIDPost')->name('customers.detailPemesanPencarianTerapisIDPost');
    // /layanan/pesan/{id}/detailPemesan{id_pemesanan)
    Route::get('/layanan/pesan/{id}/detailPemesan/{id_pemesanan}', 'App\Http\Controllers\Customer\PemesananController@detailPemesanID')->name('customers.detailPemesanID');
    //post pemesanan-pencarian-therapis
    Route::get('/layanan/pesan/{id}/pencarian-terapis', 'App\Http\Controllers\Customer\PemesananController@pencarianTerapis')->name('customers.pencarianTerapis');
    // pencarianTerapisJson
    Route::get('/layanan/pesan/{id}/pencarian-terapis-json', 'App\Http\Controllers\Customer\PemesananController@pencarianTerapisJson')->name('customers.pencarianTerapisJson');
    // detailTerapis
    Route::get('/layanan/pesan/{id}/detail-terapis/{id_terapis}', 'App\Http\Controllers\Customer\PemesananController@detailTerapis')->name('customers.detailTerapis');
    Route::post('/layanan/pesan/{id}/pencarian-terapis', 'App\Http\Controllers\Customer\PemesananController@SimpanpencarianTerapis')->name('customers.SimpanpencarianTerapis');

    Route::post('/layanan/pesan/{id}', 'App\Http\Controllers\Customer\PemesananController@postPemesanan')->name('customers.postPemesanan');
    // riwayat
    Route::get('/riwayat', 'App\Http\Controllers\Customer\RiwayatController@index')->name('customers.riwayat');
    //riwayat dijadwalkan
    Route::get('/riwayat/dijadwalkan', 'App\Http\Controllers\Customer\RiwayatController@riwayatDijadwalkan')->name('customers.riwayat-dijadwalkan');
    //riwayat/dijadwalkan/{id_pemesanan}
    Route::get('/riwayat/dijadwalkan/{id_pemesanan}', 'App\Http\Controllers\Customer\RiwayatController@riwayatDijadwalkanID')->name('customers.riwayat-dijadwalkanID');
    //riwayat selesai
    Route::get('/riwayat/selesai', 'App\Http\Controllers\Customer\RiwayatController@riwayatSelesai')->name('customers.riwayat-selesai');
    //id
    Route::get('/riwayat/selesai/{id_pemesanan}', 'App\Http\Controllers\Customer\RiwayatController@riwayatSelesaiID')->name('customers.riwayat-selesaiID');
    //riwayat dibatalkan
    Route::get('/riwayat/dibatalkan', 'App\Http\Controllers\Customer\RiwayatController@riwayatDibatalkan')->name('customers.riwayat-dibatalkan');
    //id
    Route::get('/riwayat/dibatalkan/{id_pemesanan}', 'App\Http\Controllers\Customer\RiwayatController@riwayatDibatalkanID')->name('customers.riwayat-dibatalkanID');


    //profile
    Route::resource('profile', 'App\Http\Controllers\Customer\ProfileController');
    Route::get('/profile/{id}/alamat', 'App\Http\Controllers\Customer\ProfileController@alamat')->name('customers.alamat');
    //hapus alamat post
    Route::post('/profile/{id}/alamat/hapus', 'App\Http\Controllers\Customer\ProfileController@hapusAlamat')->name('customers.hapusAlamat');
    //tambah alamat
    Route::get('/profile/{id}/alamat/tambah', 'App\Http\Controllers\Customer\ProfileController@tambahAlamat')->name('customers.tambahAlamat');
    Route::get('/profile/{id}/alamat/carilokasi', 'App\Http\Controllers\Customer\ProfileController@cariLokasi')->name('customers.cariLokasi');
    Route::get('/profile/{id}/alamat/carilokasi/getProvinsi', 'App\Http\Controllers\Customer\ProfileController@provinsi')->name('customers.provinsi');
    Route::get('/profile/{id}/alamat/carilokasi/city', 'App\Http\Controllers\Customer\ProfileController@city')->name('customers.city');
    Route::get('/profile/{id}/alamat/carilokasi/district', 'App\Http\Controllers\Customer\ProfileController@district')->name('customers.district');
    Route::get('/profile/{id}/alamat/carilokasi/village', 'App\Http\Controllers\Customer\ProfileController@village')->name('customers.village');
    Route::post('/profile/{id}/alamat/carilokasi', 'App\Http\Controllers\Customer\ProfileController@postCariLokasi')->name('customers.postCariLokasi');
    //editAlamat dan update  alamat
    Route::get('/profile/{id}/alamat/edit/{id_alamat}', 'App\Http\Controllers\Customer\ProfileController@editAlamat')->name('customers.editAlamat');
    Route::put('/profile/{id}/alamat/update/{id_alamat}', 'App\Http\Controllers\Customer\ProfileController@updateAlamat')->name('customers.updateAlamat');
    //reset alamat
    Route::post('/profile/{id}/alamat/edit/{id_alamat}/carilokasi', 'App\Http\Controllers\Customer\ProfileController@resetCariLokasi')->name('customers.resetCariLokasi');
    //update Edit carilokasi daerah provinsi,kota,dll
    Route::get('/profile/{id}/alamat/edit/{id_alamat}/carilokasi', 'App\Http\Controllers\Customer\ProfileController@editCariLokasi')->name('customers.editCariLokasi');
    Route::put('/profile/{id}/alamat/edit/{id_alamat}/carilokasi', 'App\Http\Controllers\Customer\ProfileController@updateCariLokasi')->name('customers.updateCariLokasi');


    Route::get('/profile/{id}/detail-ktp', 'App\Http\Controllers\Customer\ProfileController@detailKtp')->name('customers.detailKtp');
    //post
    Route::post('/profile/{id}/detail-ktp', 'App\Http\Controllers\Customer\ProfileController@postDetailKtp')->name('customers.postDetailKtp');
    //alamat
    //notifikasi
    // Route::get('/notifikasi', 'App\Http\Controllers\Customer\HomeController@notifikasi')->name('customers.notifikasi');
    Route::get('/notifikasi', 'App\Http\Controllers\Customer\NotifikasiController@index')->name('customers.notifikasi');
    Route::get('/notifikasi/detail/{id}', 'App\Http\Controllers\Customer\NotifikasiController@detail')->name('customers.notifikasi.detail');
    //cashback
    Route::get('/notifikasi/cashback', 'App\Http\Controllers\Customer\HomeController@cashback')->name('customers.cashback');

    Route::get('/detaillayanan', 'App\Http\Controllers\Customer\HomeController@detaillayanan')->name('customers.detaillayanan');
});

/*
* @terapis
* Route untuk role terapis
*/
Route::get('/terapis', 'App\Http\Controllers\Terapis\HomeController@loginIndex')->name('terapis.login');
Route::get('/terapis/logout', 'App\Http\Controllers\Auth\TerapisAuthController@logout')->name('terapis.logout');

Route::middleware(['auth', 'role:terapis'])->prefix('terapis')->group(function () {
    Route::get('/home', 'App\Http\Controllers\Terapis\HomeController@index')->name('terapis.dashboard');
    //terapis update status penerimaan pesananan
    Route::post('/home/update-status', 'App\Http\Controllers\Terapis\HomeController@updateStatus')->name('terapis.updateStatus');
    Route::get('/riwayat', 'App\Http\Controllers\Terapis\RiwayatController@index')->name('terapis.riwayat');
    //riwayat dijadwalkan
    Route::get('/riwayat/dijadwalkan', 'App\Http\Controllers\Terapis\RiwayatController@riwayatDijadwalkan')->name('terapis.riwayat-dijadwalkan');
    //detail/id
    Route::get('/riwayat/dijadwalkan/detail/{id}', 'App\Http\Controllers\Terapis\RiwayatController@detailRiwayatDijadwalkan')->name('terapis.detailRiwayatDijadwalkan');
    // riwayat/dijadwalkan/detail{id} post 
    Route::post('/riwayat/dijadwalkan/detail/{id}', 'App\Http\Controllers\Terapis\RiwayatController@postDetailRiwayatDijadwalkan')->name('terapis.postDetailRiwayatDijadwalkan');
    //riwayat selesai
    Route::get('/riwayat/selesai', 'App\Http\Controllers\Terapis\RiwayatController@riwayatSelesai')->name('terapis.riwayat-selesai');
    //detail/id
    Route::get('/riwayat/selesai/detail/{id}', 'App\Http\Controllers\Terapis\RiwayatController@detailRiwayatSelesai')->name('terapis.detailRiwayatSelesai');
    //tolak
    // terapis.riwayat-ditolak
    Route::get('/riwayat/ditolak', 'App\Http\Controllers\Terapis\RiwayatController@riwayatDitolak')->name('terapis.riwayat-ditolak');
    //detail/id
    Route::get('/riwayat/ditolak/detail/{id}', 'App\Http\Controllers\Terapis\RiwayatController@detailRiwayatDitolak')->name('terapis.detailRiwayatDitolak');
    //profiles
    Route::resource('terapis-profile', 'App\Http\Controllers\Terapis\ProfileController');
    // -terapis-profile/update-foto
    Route::post('/terapis-profile/update-foto/{id}', 'App\Http\Controllers\Terapis\ProfileController@updateFoto')->name('terapis.updateFoto');
    //alamat
    Route::get('/terapis-profile/alamat/{id}', 'App\Http\Controllers\Terapis\ProfileController@alamat')->name('terapis.alamat');
    //hapusalamat
    Route::post('/terapis-profile/alamat/{id}/hapus', 'App\Http\Controllers\Terapis\ProfileController@hapusAlamat')->name('terapis.hapusAlamat');
    //editAlamat dan update  alamat
    Route::get('/terapis-profile/alamat/{id}/edit/{id_alamat}', 'App\Http\Controllers\Terapis\ProfileController@editAlamat')->name('terapis.editAlamat');
    Route::put('/terapis-profile/alamat/{id}/update/{id_alamat}', 'App\Http\Controllers\Terapis\ProfileController@updateAlamat')->name('terapis.updateAlamat');
    //update Edit carilokasi daerah provinsi,kota,dll
    Route::get('/terapis-profile/alamat/{id}/edit/{id_alamat}/carilokasi', 'App\Http\Controllers\Terapis\ProfileController@editCariLokasi')->name('terapis.editCariLokasi');
    // updateCariLokasi
    Route::post('/terapis-profile/alamat/{id}/edit/{id_alamat}/carilokasi', 'App\Http\Controllers\Terapis\ProfileController@resetCariLokasi')->name('terapis.resetCariLokasi');
    Route::put('/terapis-profile/alamat/{id}/edit/{id_alamat}/carilokasi', 'App\Http\Controllers\Terapis\ProfileController@updateCariLokasi')->name('terapis.updateCariLokasi');

    //alamat/{id}/tambah
    Route::get('/terapis-profile/alamat/{id}/tambah', 'App\Http\Controllers\Terapis\ProfileController@tambahAlamat')->name('terapis.tambahAlamat');
    // profile-carilokasi
    Route::get('/terapis-profile/alamat/{id}/carilokasi', 'App\Http\Controllers\Terapis\ProfileController@cariLokasi')->name('terapis.cariLokasi');
    Route::get('/terapis-profile/alamat/{id}/carilokasi/getProvinsi', 'App\Http\Controllers\Terapis\ProfileController@provinsi')->name('terapis.provinsi');
    Route::get('/terapis-profile/alamat/{id}/carilokasi/city', 'App\Http\Controllers\Terapis\ProfileController@city')->name('terapis.city');
    Route::get('/terapis-profile/alamat/{id}/carilokasi/district', 'App\Http\Controllers\Terapis\ProfileController@district')->name('terapis.district');
    Route::get('/terapis-profile/alamat/{id}/carilokasi/village', 'App\Http\Controllers\Terapis\ProfileController@village')->name('terapis.village');
    //post 
    Route::post('/terapis-profile/alamat/{id}/carilokasi', 'App\Http\Controllers\Terapis\ProfileController@postCariLokasi')->name('terapis.postCariLokasi');
    //fitur skck
    Route::get('/terapis-profile/skck/{id}', 'App\Http\Controllers\Terapis\ProfileController@skck')->name('terapis.skck');
    //rekening terapis
    Route::get('/terapis-profile/rekening/{id}', 'App\Http\Controllers\Terapis\RekeningController@index')->name('terapis.rekening');
    Route::get('/terapis-profile/rekening/{id}/tambah', 'App\Http\Controllers\Terapis\RekeningController@tambah')->name('terapis.rekening.tambah');
    //post('/tambah/
    Route::post('/terapis-profile/rekening/{id}/tambah_post', 'App\Http\Controllers\Terapis\RekeningController@tambah_post')->name('terapis.rekening.tambah.post');
    Route::get('/terapis-profile/rekening/{id}/edit/{id_rekening}', 'App\Http\Controllers\Terapis\RekeningController@editRekening')->name('terapis.rekening.edit');
    Route::get('/terapis-profile/rekening/{id}/delete/{id_rekening}', 'App\Http\Controllers\Terapis\RekeningController@deleteRekening')->name('terapis.rekening.delete');
    // PUT 
    Route::PUT('/terapis-profile/rekening/{id}/update/{id_rekening}', 'App\Http\Controllers\Terapis\RekeningController@updateRekening')->name('terapis.rekening.update');
    //layanan
    Route::get('/terapis-profile/layanan/{id}', 'App\Http\Controllers\Terapis\LayananController@index')->name('terapis.layanan');
    Route::get('/terapis-profile/layanan/{id}/tambah', 'App\Http\Controllers\Terapis\LayananController@tambahLayanan')->name('terapis.layanan.tambah');
    Route::get('/terapis-profile/layanan/{id}/tambah/getLayanan', 'App\Http\Controllers\Terapis\LayananController@getLayanan')->name('terapis.layanan.getLayanan');
    //terapis.getLayanan/6
    Route::get('/terapis-profile/layanan/{id}/tambah/getLayanan/{id_layanan}', 'App\Http\Controllers\Terapis\LayananController@getLayananID')->name('terapis.layanan.getLayananID');
    Route::post('/terapis-profile/layanan/{id}/tambah', 'App\Http\Controllers\Terapis\LayananController@tambahLayananPost')->name('terapis.layanan.tambahPost');
    //    /terapis-pemesanan
    Route::get('/terapis-pemesanan', 'App\Http\Controllers\Terapis\PemesananController@index')->name('terapis.pemesanan');
    //terima-pemesanan
    Route::get('/terapis-pemesanan/konfirmasi/{id}', 'App\Http\Controllers\Terapis\PemesananController@konfirmasi')->name('terapis.konfirmasi');
    //terapis-pemesanan/konfirmasi/{id}/konfirmasi
    Route::post('/terapis-pemesanan/konfirmasi/{id}/konfirmasi', 'App\Http\Controllers\Terapis\PemesananController@konfirmasiPost')->name('terapis.konfirmasiPost');



    //pendapatan
    Route::get('/terapis-pendapatan', 'App\Http\Controllers\Terapis\PendapatanController@index')->name('terapis.pendapatan');
    Route::get('/terapis-pendapatan/topup', 'App\Http\Controllers\Terapis\PendapatanController@topup')->name('terapis.topup');
    Route::post('/terapis-pendapatan/topup', 'App\Http\Controllers\Terapis\PendapatanController@topupPost')->name('terapis.topupPost');
    //topup/{nama_bank)
    Route::get('/terapis-pendapatan/topup/{nama_bank}', 'App\Http\Controllers\Terapis\PendapatanController@topup2')->name('terapis.topup2');
    Route::get('/terapis-pendapatan/topup/{nama_bank}/upload', 'App\Http\Controllers\Terapis\PendapatanController@topup3')->name('terapis.topup3');
    // upload_bukti_tf
    Route::post('/terapis-pendapatan/topup/{nama_bank}/upload', 'App\Http\Controllers\Terapis\PendapatanController@upload_bukti_tf')->name('terapis.upload_bukti_tf');
    Route::get('/terapis-profile/pengaturan/{id}', 'App\Http\Controllers\Terapis\SettingController@index')->name('terapis.pengaturan');
    //pin e-wallet
    Route::get('/terapis-profile/pengaturan/{id}/pin-e-wallet', 'App\Http\Controllers\Terapis\SettingController@pinEwallet')->name('terapis.pinEwallet');
    Route::post('/terapis-profile/pengaturan/{id}/pin-e-wallet', 'App\Http\Controllers\Terapis\SettingController@postPinEwallet')->name('terapis.postPinEwallet');
});
// ujicoba fron end /trp/pengaturan
Route::get('/terapis/pengaturan', function () {
    return view('terapis.profile-pengaturan');
});
//pendapatan
Route::get('/terapis/pendapatan', function () {
    return view('terapis.pendapatan');
});
Route::get('/terapis/topup', function () {
    return view('terapis.topup');
});
Route::get('/terapis/topup2', function () {
    return view('terapis.topup2');
});
Route::get('/terapis/topup3', function () {
    return view('terapis.topup3');
});
Route::get('/terapis/pin-e-wallet', function () {
    return view('terapis.pin-Ewallet');
});
Route::get('/terapis/ulangi-pin-e-wallet', function () {
    return view('terapis.ulangi-pin-Ewallet');
});
/*
* @tambahan
* Route untuk tambahan
*/
Auth::routes();

//verfikasi emai
Auth::routes(['verify' => true]);
// verification_code
// post_email_verified date data activation code

Route::get('/', function () {
    return view('index');
});
//pilihrole
Route::get('/customerOld/pilih-role', function () {
    return view('customer.pilihrole');
});
// /home

Route::get('/registerCustomer', function () {
    return view('customer.auth.register');
});

Route::get('/passwordBaru', function () {
    return view('customer.passwordBaru');
});

Route::get('/lupaKatasandi', function () {
    return view('customer.lupaKatasandi');
});

Route::get('/verifikasiCustomer', function () {
    return view('customer.verifikasi');
});

Route::get('/ubahKatasandi', function () {
    return view('customer.auth.ubahKatasandi');
});

Route::get('/pilihRole', function () {
    return view('customer.pilihRole');
});

Route::get('/ubahJadwal', function () {
    return view('customer.ubahJadwal');
});

Route::get('/kirimUlasan', function () {
    return view('customer.kirimUlasan');
});

Route::get('/laporan', function () {
    return view('customer.laporan');
});

Route::get('/simpanJadwal', function () {
    return view('customer.simpanJadwal');
})->name('simpanJadwal');

Route::get('/ladingPageTrapis', function () {
    return view('trapis');
});

//logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
//login
Route::get('/login', function () {
    return view('auth.login');
});
//post login
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');



// Halaman Transaksi Customer
Route::get('/mail', function () {
    return view('customer.email');
})->name('emailjadwal');

Route::get('/splash', function () {
    return view('customer.splash');
})->name('splash');

Route::get('/customer/riwayat(unlogin)', function () {
    return view('beforelogin.riwayat');
})->name('riwayatunlogin');

Route::get('/customer/notif(unlogin)', function () {
    return view('beforelogin.notif');
})->name('notifunlogin');

Route::get('/logincustomer', function () {
    return view('beforelogin.login');
})->name('logincustomer');

Route::get('/customer/notifikasi/pembayaran', function () {
    return view('customer.pembayaran');
})->name('bayarcustomer');

// Halaman Transaksi Customer


Route::get('/customer', 'App\Http\Controllers\Customer\HomeController@index')->name('homecustomer');

Route::get('/customer/layanan', function () {
    return view('customer.layanan');
})->name('layanan');

Route::get('/verifikasiCustomer', function () {
    return view('customer.verifikasi');
})->name('verifikasicustomer');

Route::get('/customer/riwayat', function () {
    return view('customer.riwayat');
})->name('riwayatcustomer');

Route::get('/customer/detailPemesanan', function () {
    return view('customer.detailPemesanan');
})->name('detailPemesanan');

Route::get('/customer/riwayat/detaildijadwalkan', function () {
    return view('customer.detailriwayat');
})->name('detaildijadwalkan');

Route::get('/customer/riwayat/detailselesai', function () {
    return view('customer.detailriwayatselesai');
})->name('detailselesai');

Route::get('/customer/riwayat/detailselesai/rate', function () {
    return view('customer.ulasan');
})->name('ulasancustomer');

Route::get('/customer/riwayat/detaildibatalkan', function () {
    return view('customer.detailriwayatdibatalkan');
})->name('detaildibatalkan');

Route::get('/customer/riwayat/detaildijadwalkan/pembatalan', function () {
    return view('customer.pembatalan');
})->name('ajukanpembatalan');

Route::get('/customer/notifikasi', function () {
    return view('customer.notif');
})->name('notifcustomer');

Route::get('/customer/notifikasi/cashback', function () {
    return view('customer.cashback');
})->name('cashbackcustomer');

Route::get('/depo', 'App\Http\Controllers\Terapis\DepositController@index')->name('depo');
Route::post('/depo', 'App\Http\Controllers\Terapis\DepositController@store')->name('depo.store');

Route::get('/customer/profile', function () {
    return view('customer.profile');
})->name('profilecustomer');

Route::get('/customer/profile/setting', function () {
    return view('customer.setting');
})->name('settingcustomer');

Route::get('/customer/profile/detailktp', function () {
    return view('customer.detailktp');
})->name('detailktp');

Route::get('/customer/profile/formdatadiri', function () {
    return view('customer.form');
})->name('formcustomer');

Route::get('/customer/profile/formdatadiri/addfoto', function () {
    return view('customer.addfoto');
})->name('tambahfoto');

Route::get('/customer/detaillayanan', function () {
    return view('customer.detaillayanan');
})->name('detaillayanan');


Route::get('/customer/detaillayanan/alamat', function () {
    return view('customer.alamat');
})->name('alamat');

Route::get('/customer/detaillayanan/tambahalamat', function () {
    return view('customer.tambahalamat');
})->name('tambahalamat');

Route::get('/wede', 'App\Http\Controllers\Terapis\WithdrawalController@index')->name('wede');
Route::post('/wede', 'App\Http\Controllers\Terapis\WithdrawalController@store')->name('wede.store');
Route::resource('bank-accounts', 'App\Http\Controllers\Terapis\BankAccountController');

// halaman Register terapis mobile
Route::get('/terapis/register-terapis', function () {
    return view('terapis.register-terapis');
})->name('register-terapis');

// Halaman Login terapis mobile
Route::get('/terapis/login-terapis', function () {
    return view('terapis.login-terapis');
})->name('login-terapis');

// Halaman verif email terapis mobile
Route::get('/terapis/verif-email', function () {
    return view('terapis.email-verif');
})->name('verif-email-terapis');

// Halaman ubah sandi terapis mobile
Route::get('/terapis/ubah-sandi', function () {
    return view('terapis.ubah-sandi');
})->name('ubah-sandi-terapis');

// Halaman ubah sandi2 terapis mobile2
Route::get('/terapis/ubah-sandi2', function () {
    return view('terapis.ubah-sandi2');
})->name('ubah-sandi-terapis2');

// Halaman ubah sandi3 terapis mobile3
Route::get('/terapis/ubah-sandi3', function () {
    return view('terapis.ubah-sandi3');
})->name('ubah-sandi-terapis3');

// Halaman Notifikasi terapis mobile
Route::get('/terapis/beranda/notifikasi', function () {
    return view('terapis.notif-terapis');
})->name('notif-terapis');

// Halaman Notifikasi order mobile
Route::get('/terapis/beranda/notifikasi-order', function () {
    return view('terapis.notif-order');
})->name('notif-order');

// Halaman TOLAK order mobile
Route::get('/terapis/beranda/notifikasi-TolakOrder', function () {
    return view('terapis.tolak-order');
})->name('tolak-order');

// Halaman terapis:riwayat-dijadwalkan mobile
Route::get('/terapis/riwayat-dijadwalkan', function () {
    return view('terapis.riwayat-dijadwalkan');
})->name('riwayat-dijadwalkan');

// Halaman terapis:riwayat-detail pesanan mobile
Route::get('/terapis/riwayat-detailorder', function () {
    return view('terapis.riwayat-detail-order');
})->name('riwayat-detailorder');

// Halaman terapis:riwayat-detail pesanan selesai mobile
Route::get('/terapis/riwayat-detailorder-selesai', function () {
    return view('terapis.riwayat-detail-order-selesai');
})->name('riwayat-detailorder-selesai');

Route::get('/terapis/riwayat-detailorder-diterima', function () {
    return view('terapis.riwayat-detail-order-diterima');
})->name('riwayat-detailorder-diterima');


// Halaman terapis:riwayat-pesanan ditolak mobile
Route::get('/terapis/riwayat-orderditolak', function () {
    return view('terapis.riwayat-order-ditolak');
})->name('riwayat-orderditolak');

// Halaman terapis:riwayat-detail pesanan ditolak mobile
Route::get('/terapis/riwayat-detailorder-ditolak', function () {
    return view('terapis.riwayat-detail-order-ditolak');
})->name('riwayat-detailorder-ditolak');

// Halaman terapis:riwayat-detail laporkan customer mobile
Route::get('/terapis/riwayat-laporkan-customer', function () {
    return view('terapis.riwayat-detail-laporkan-customer');
})->name('riwayat-laporkan-customer');

// Halaman terapis:riwayat-chat ke customer
Route::get('/terapis/riwayat/chat', function () {
    return view('terapis.riwayat-chat');
})->name('riwayat-chat');

// Halaman terapis:Beranda final
Route::get('/terapis/beranda-order', function () {
    return view('terapis.beranda-final');
})->name('beranda-final');

// Halaman terapis:Profile
Route::get('/terapis/profile', function () {
    return view('terapis.profile-therapist');
})->name('profile-therapist');

// Halaman terapis:KTP & SKCK
Route::get('/terapis/ktp-skck', function () {
    return view('terapis.ktp-therapist');
})->name('ktp-therapist');

// Halaman terapis:edit profile
Route::get('/terapis/edit-profile', function () {
    return view('terapis.edit-profile');
})->name('edit-profile');

Route::get('/terapis/lupa-sandi', function () {
    return view('terapis.lupa-sandi');
})->name('lupa-sandi');

// Halaman terapis: lupa sandi
Route::get('/terapis/lupa-sandi2', function () {
    return view('terapis.lupa-sandi2');
})->name('lupa-sandi2');

// Halaman terapis: lupa sandi
Route::get('/terapis/lupa-sandi3', function () {
    return view('terapis.lupa-sandi3');
})->name('lupa-sandi3');

// Halaman terapis: profile/lokasi
Route::get('/terapis/profile-lokasi', function () {
    return view('terapis.profile-lokasi');
})->name('profile-lokasi');

// Halaman terapis: profile/alamat baru
Route::get('/terapis/profile-alamatbaru', function () {
    return view('terapis.profile-alamatbaru');
})->name('profile-alamatbaru');

// Halaman terapis: profile/alamat baru-cari lokasi
Route::get('/terapis/profile-carilokasi', function () {
    return view('terapis.profile-carilokasi');
})->name('profile-carilokasi');

// Halaman terapis: profile/alamat baru-cari lokasi2
Route::get('/terapis/profile-carilokasi2', function () {
    return view('terapis.profile-carilokasi2');
})->name('profile-carilokasi2');

// Halaman terapis: profile/alamat baru-cari lokasi3
Route::get('/terapis/profile-carilokasi3', function () {
    return view('terapis.profile-carilokasi3');
})->name('profile-carilokasi3');

// Halaman terapis: profile/alamat baru-cari lokasi4
Route::get('/terapis/profile-carilokasi4', function () {
    return view('terapis.profile-carilokasi4');
})->name('profile-carilokasi4');

// Halaman terapis: profile/rekening
Route::get('/terapis/profile-rekening', function () {
    return view('terapis.profile-rekening');
})->name('profile-rekening');

// Halaman terapis: profile/rekening2
Route::get('/terapis/profile-rekening2', function () {
    return view('terapis.profile-rekening2');
})->name('profile-rekening2');

// Halaman terapis: profile/rekening3
Route::get('/terapis/profile-rekening3', function () {
    return view('terapis.profile-rekening3');
})->name('profile-rekening3');

// Halaman terapis: profile/setting
Route::get('/terapis/profile-setting', function () {
    return view('terapis.profile-setting');
})->name('profile-setting');

// Halaman terapis: profile/setting/bantuan
Route::get('/terapis/setting-bantuan', function () {
    return view('terapis.setting-bantuan');
})->name('setting-bantuan');

// Halaman terapis: profile/setting/bantuan-chat
Route::get('/terapis/setting-bantuanchat', function () {
    return view('terapis.setting-bantuanchat');
})->name('setting-bantuanchat');

// Halaman terapis: pendapatan
Route::get('/terapis/pendapatan2', function () {
    return view('terapis.pendapatan-therapist');
})->name('pendapatan-therapist');

// Halaman terapis: pendapatan/TOPUP
Route::get('/terapis/pendapatan-topup', function () {
    return view('terapis.pendapatan-topup');
})->name('pendapatan-topup');

Route::get('/terapis/notifikasi', function () {
    return view('terapis.notifikasi');
})->name('terapis.notifikasi');

// Halaman terapis: pendapatan/TOPUP2
Route::get('/terapis/pendapatan-topup2', function () {
    return view('terapis.pendapatan-topup2');
})->name('pendapatan-topup2');

// Halaman terapis: pendapatan/TOPUP3
Route::get('/terapis/pendapatan-topup3', function () {
    return view('terapis.pendapatan-topup3');
})->name('pendapatan-topup3');

// Halaman terapis: pendapatan/riwayat
Route::get('/terapis/pendapatan-riwayat', function () {
    return view('terapis.pendapatan-riwayat');
})->name('pendapatan-riwayat');

// Halaman terapis: pendapatan/tarik
Route::get('/terapis/pendapatan-tarik', function () {
    return view('terapis.pendapatan-tarik');
})->name('pendapatan-tarik');

// Halaman terapis: pendapatan/verif
Route::get('/terapis/pendapatan-verif', function () {
    return view('terapis.pendapatan-verif');
})->name('pendapatan-verif');

Route::get('/transaksi_test', 'App\Http\Controllers\Transaksi\TransaksiController@index')->name('transaksi_test');
Route::post('/transaksi_test', 'App\Http\Controllers\Transaksi\TransaksiController@store')->name('transaksi_test.store');
