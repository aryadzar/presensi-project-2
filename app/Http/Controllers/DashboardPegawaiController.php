<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Diglactic\Breadcrumbs\Breadcrumbs;

class DashboardPegawaiController extends Controller
{
    public function home(){
            $breadcrumbs = Breadcrumbs::generate('Home');
            return view('dashboard_pegawai.index', compact('breadcrumbs'));

    }
}
