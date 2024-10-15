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
})->name('/');



Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [LoginController::class, 'loginView'])->name('login');
    Route::post('/login', [LoginController::class, 'loginAction'])->name('login_post');
    Route::get('/login/sso', [LoginController::class, 'login_sso'])->name('login_sso');
});

Route::get('/logout', [LoginController::class, "logout"])->name("logout");




Route::group(['middleware' => ['auth', 'CheckRole:Admin']], function(){



    // /* ADMIN SIDE BAR */
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin', function () {
        dd("Ini Halaman Admin");
    })->name('admin.dashboard');

    // // Administratif Routes
    // Route::prefix('admin/administrasi')->group(function () {
    //     Route::get('/daftar_pegawai', [AdminController::class, 'read_daftar_pegawai'])->name('administratif.daftarpegawai');

    //     Route::post('/add_unit_kerja', [AdminController::class, "add_unit_kerja"])->name("admin.add_unit_kerja");
    //     Route::put('/edit_unit_kerja/{id}', [AdminController::class, "update_unit_kerja"])->name('admin.update_unit_kerja');
    //     Route::delete('/delete_unit_kerja/{id}', [AdminController::class, "delete_unit_kerja"])->name("admin.delete_unit_kerja");


    //     Route::get('/validasisurat', function () {
    //         $breadcrumbs = Breadcrumbs::generate('Validasi Surat');
    //         return view('dashboard_admin.validasisurat.index', compact('breadcrumbs'));
    //     })->name('administratif.validasisurat');
    // });

});
Route::group(['middleware' => ['auth', 'CheckRole:Operator']], function(){


    Route::get('/operator', function () {
        dd("Ini Halaman Operator");
    })->name('operator.dashboard');

});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/role', [LoginController::class, "selectRole"])->name("role");
    Route::post('/set_role', [LoginController::class, 'setRole'])->name('set_role');
});



Route::group(['middleware' => ['auth', 'CheckRole:Karyawan']], function(){




    Route::get('/pegawai', function () {
        dd("Ini Halaman Karyawan");
    })->name('karyawan.dashboard');

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





Route::get('/dashboard/historyadmin', function () {
    $breadcrumbs = Breadcrumbs::generate('Riwayat');
    return view('dashboard_admin.riwayat.index', compact('breadcrumbs'));
})->name('riwayatadmin');





/*OPERATOR SIDE BAR*/

Route::get('operator', function () {
    $breadcrumbs = Breadcrumbs::generate('Dashboard');
    return view('dashboard_operator.index', compact('breadcrumbs'));
})->name("operator.dashboard");

// Administrasi - Kelola Karyawan Magang/PKL route
Route::get('operator/daftarkaryawan', function () {
    $breadcrumbs = Breadcrumbs::generate('Kelola Karyawan');
    return view('dashboard_operator.daftarkaryawan.index', compact('breadcrumbs'));
})->name("operator.daftarkaryawan");

// Administrasi - Validasi Surat Izin route
Route::get('operator/validasisurat', function () {
    $breadcrumbs = Breadcrumbs::generate('Validasi Surat Izin');
    return view('dashboard_operator.validasisurat.index', compact('breadcrumbs'));
})->name("operator.validasisurat");

// Administrasi - Perangkat Karyawan route
Route::get('operator/devicekaryawan', function () {
    $breadcrumbs = Breadcrumbs::generate('Perangkat Karyawan');
    return view('dashboard_operator.devicekaryawan.index', compact('breadcrumbs'));
})->name("operator.devicekaryawan");

// Riwayat Hadir Karyawan route
Route::get('operator/riwayat', function () {
    $breadcrumbs = Breadcrumbs::generate('Riwayat'); // Breadcrumbs for Riwayat
    return view('dashboard_operator.riwayat.index', compact('breadcrumbs')); // Assuming the view is 'index' under 'riwayat'
})->name("riwayatoperator");
