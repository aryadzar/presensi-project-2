<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use SSO\SSO;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (){
    return redirect()->route('login');
});



Route::group(['guest'], function(){
    Route::get('/login', [LoginController::class, 'loginView'])->name('login');
    Route::post('/login', [LoginController::class, 'loginAction'])->name('login_post');
    
});



/* ADMIN SIDE BAR */
Route::get('/dashboard_admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Administratif Routes
Route::prefix('dashboard_admin/administrasi')->group(function () {
    Route::get('/daftar_pegawai', [AdminController::class, 'read_daftar_pegawai'])->name('administratif.daftarpegawai');

    Route::get('/validasisurat', function () {
        $breadcrumbs = Breadcrumbs::generate('Validasi Surat');
        return view('dashboard_admin.validasisurat.index', compact('breadcrumbs'));
    })->name('administratif.validasisurat');
});










Route::get('/dashboard', function () {
    $breadcrumbs = Breadcrumbs::generate('Home');
    return view('dashboard_pegawai.index', compact('breadcrumbs'));
})->name('dashboard');

Route::get('dashboard/presensi/scan_barcode', function () {
    $breadcrumbs = Breadcrumbs::generate('Scan Barcode');
    return view('dashboard_pegawai.scan_barcode.index', compact('breadcrumbs'));
})->name("presensi.barcode");

Route::get('dashboard/presensi/set_izin', function () {
    $breadcrumbs = Breadcrumbs::generate('Surat Izin');
    return view('dashboard_pegawai.surat_izin.index', compact("breadcrumbs"));
})->name("presensi.surat_izin");

Route::get('dashboard/presensi/set_cuti', function () {
    return view('dashboard_pegawai.cuti.index');
})->name("presensi.set_cuti");

Route::get('dashboard/presensi/log_book', function () {
    return view('dashboard_pegawai.logbook.index');
})->name("presensi.log_book");

Route::get('dashboard/history', function () {
    return view('dashboard_pegawai.riwayat.index');
})->name("riwayat");

Route::get('barcode', function () {
    return view('barcode.index');
})->name("barcode");


Route::get('/logout', function () {
    if(SSO::check()) { //mengecek otentikasi pada aplikasi
        SSO::logout(url('/'));
        SSO::cookieClear(); //If destroy cookie laravel
        Session::flush(); //Destroy Session
        return redirect('login')->with('pesan', 'berhasil logout'); //Redirect to login page
    } else {
        return redirect('login'); //menampilkan halaman login
    }
})->name("logout");




Route::get('/dashboard/historyadmin', function () {
    $breadcrumbs = Breadcrumbs::generate('Riwayat');
    return view('dashboard_admin.riwayat.index', compact('breadcrumbs'));
})->name('riwayatadmin');

