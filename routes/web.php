<?php

use SSO\SSO;
use App\Models\User;
use App\Models\Logbook;
use App\Models\Presensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PresensiController;

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

Route::get('/barcode_generate', [PresensiController::class, "barcode_generator"])->name('barcode_generate');


Route::get('/logout', [LoginController::class, "logout"])->name("logout");

// , 'CheckRole:Admin'


Route::group(['middleware' => ['auth', 'CheckRole:Admin']], function(){

    /* ADMIN SIDE BAR */
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');


    // Administratif Routes
    Route::prefix('admin/')->group(function () {
        Route::get('/data_master', [AdminController::class, 'read_daftar_pegawai'])->name('administratif.daftarpegawai');

        Route::post('/add_unit_kerja', [AdminController::class, "add_unit_kerja"])->name("admin.add_unit_kerja");
        Route::put('/edit_unit_kerja/{id}', [AdminController::class, "update_unit_kerja"])->name('admin.update_unit_kerja');
        Route::delete('/delete_unit_kerja/{id}', [AdminController::class, "delete_unit_kerja"])->name("admin.delete_unit_kerja");

        Route::get('/add_user', [AdminController::class, 'add_user'])->name('add_user');
        Route::post('/store_user', [AdminController::class, 'storeUser'])->name('admin.store_user');
        Route::get('/user_info/{id}', [AdminController::class, 'show_user_info'])->name('show_user_info');
        Route::patch('/user_info/{id}', [AdminController::class, 'edit_user_info'])->name('edit_user_info');
        Route::delete('/user_delete/{id}', [AdminController::class, 'delete_user'])->name('delete_user');


        Route::get('/edit-role/{user}', [AdminController::class, 'editRole'])->name('edit.role');
        Route::post('/add-role/{user}', [AdminController::class, 'addUserRole'])->name('add.user.role');
        Route::put('/update-role/{user}/{set_role}', [AdminController::class, 'updateUserRole'])->name('update.user.role');
        Route::delete('/delete-role/{user}/{set_role}', [AdminController::class, 'deleteUserRole'])->name('delete.user.role');
        Route::get('/edit-user-role/{user}/{set_role}', [AdminController::class, 'editUserRole'])->name('edit.user.role');


        Route::get('/history', function () {
            $breadcrumbs = Breadcrumbs::generate('Riwayat');
            $data = Presensi::all();
            return view('dashboard_admin.riwayat.index', compact('breadcrumbs', 'data'));
        })->name('riwayatadmin');


        Route::get('/validasisurat', function () {
            $breadcrumbs = Breadcrumbs::generate('Validasi Surat');
            return view('dashboard_admin.validasisurat.index', compact('breadcrumbs'));
        })->name('administratif.validasisurat');
    });

});
Route::group(['middleware' => ['auth', 'CheckRole:Operator']], function(){


    Route::get('/operator', function () {
        dd("Ini Halaman Operator", "Nama User : ". Auth::user()->nama, "Unit Kerja saat ini". session("id_unit_kerja") );
    })->name('operator.dashboard');

});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/role', [LoginController::class, "selectRole"])->name("role");
    Route::post('/set_role', [LoginController::class, 'setRole'])->name('set_role');
});



Route::group(['middleware' => ['auth', 'CheckRole:Karyawan']], function(){
    Route::get('/scan_barcode', function () {
        $breadcrumbs = Breadcrumbs::generate('Scan Barcode');
        return view('dashboard_pegawai.scan_barcode.index', compact('breadcrumbs'));
    })->name("presensi.barcode");

    Route::post('/presensi/check-in', [PresensiController::class, 'set_presensi']);


    Route::get('/karyawan', [PegawaiController::class, 'home'])->name('karyawan.dashboard');

    Route::get('/set_izin', function () {
        $breadcrumbs = Breadcrumbs::generate('Surat Izin');
        return view('dashboard_pegawai.surat_izin.index', compact("breadcrumbs"));
    })->name("presensi.surat_izin");

    Route::get('/history', function () {
        $data = Auth::user()->presensi()->get();
        return view('dashboard_pegawai.riwayat.index', compact('data'));
    })->name("riwayat");

    Route::get('/log_book', function () {
        $user = Auth::user();
        $data = Logbook::whereHas('presensi', function($query) use ($user) {
            $query->where('id_user', $user->id);
        })->get();        return view('dashboard_pegawai.logbook.index', compact('data'));
    })->name("presensi.log_book");

    Route::get('/log_book/{id}', [PegawaiController::class, 'show_logbook'])->name('presensi.isi_logbook');
    Route::post('/log_book/{id}', [PegawaiController::class, 'store_logbook'])->name('presensi.store_logbook');

});






















Route::get('barcode', function () {
    return view('barcode.index');
})->name("barcode");

Route::get('profile', function () {
    return view('profile.index');
})->name("profile");




Route::get('/list_user', [PresensiController::class, 'read_daftar_pegawai']);






// /*OPERATOR SIDE BAR*/

// Route::get('operator', function () {
//     $breadcrumbs = Breadcrumbs::generate('Dashboard');
//     return view('dashboard_operator.index', compact('breadcrumbs'));
// })->name("operator.dashboard");

// // Administrasi - Kelola Karyawan Magang/PKL route
// Route::get('operator/daftarkaryawan', function () {
//     $breadcrumbs = Breadcrumbs::generate('Kelola Karyawan');
//     return view('dashboard_operator.daftarkaryawan.index', compact('breadcrumbs'));
// })->name("operator.daftarkaryawan");

// // Administrasi - Validasi Surat Izin route
// Route::get('operator/validasisurat', function () {
//     $breadcrumbs = Breadcrumbs::generate('Validasi Surat Izin');
//     return view('dashboard_operator.validasisurat.index', compact('breadcrumbs'));
// })->name("operator.validasisurat");

// // Administrasi - Perangkat Karyawan route
// Route::get('operator/devicekaryawan', function () {
//     $breadcrumbs = Breadcrumbs::generate('Perangkat Karyawan');
//     return view('dashboard_operator.devicekaryawan.index', compact('breadcrumbs'));
// })->name("operator.devicekaryawan");

// // Riwayat Hadir Karyawan route
// Route::get('operator/riwayat', function () {
//     $breadcrumbs = Breadcrumbs::generate('Riwayat'); // Breadcrumbs for Riwayat
//     return view('dashboard_operator.riwayat.index', compact('breadcrumbs')); // Assuming the view is 'index' under 'riwayat'
// })->name("riwayatoperator");
