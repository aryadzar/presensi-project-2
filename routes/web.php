<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('dashboard/set_absen', function () {
    return view('dashboard.set_absen.index');
})->name("set_absen");

Route::get('dashboard/history', function () {
    return view('dashboard.riwayat.index');
})->name("riwayat");
