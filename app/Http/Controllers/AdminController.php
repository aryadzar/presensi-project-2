<?php

namespace App\Http\Controllers;

use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $breadcrumbs = Breadcrumbs::generate("Home");
        return view('dashboard_admin.index', compact('breadcrumbs'));
    }
}
