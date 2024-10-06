<?php

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

Route::get('/login', function () {

    return view('login');
})->name('login');

Route::get('/login/sso', function () {
    if(SSO::authenticate()) //mengecek apakah user telah login atau belum
    {
        if(SSO::check()) {
            return redirect()->route("dashboard");
        }
    } else {
        return redirect()->route('auth.logout'); //me-*redirect* user jika otentikasi SSO gagal, diarahkan untuk mengakhiri sesi login (jika ada)
    }
})->name('login.post');


Route::get('/dashboard', function () {
    $breadcrumbs = Breadcrumbs::generate('Home');
    return view('dashboard_pegawai.index', compact('breadcrumbs'));
})->name('dashboard');




Route::get('dashboard/presensi/scan_barcode', function () {
    return view('dashboard_pegawai.scan_barcode.index');
})->name("presensi.barcode");

Route::get('dashboard/presensi/set_izin', function () {
    $breadcrumbs = Breadcrumbs::generate('Surat Tugas');
    return view('dashboard_pegawai.surat_tugas.index', compact("breadcrumbs"));
})->name("presensi.surat_tugas");

Route::get('dashboard/presensi/set_cuti', function () {
    return view('dashboard_pegawai.cuti.index');
})->name("presensi.set_cuti");

Route::get('dashboard/history', function () {
    return view('dashboard_pegawai.riwayat.index');
})->name("riwayat");









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

Route::get("/testing", function(){
    return view('dashboard_pegawai.testing');
})->name("testing");
