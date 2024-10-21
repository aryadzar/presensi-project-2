<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Diglactic\Breadcrumbs\Breadcrumbs;

class PegawaiController extends Controller
{
    public function home(){
        $breadcrumbs = Breadcrumbs::generate('Home');
        return view('dashboard_pegawai.index', compact('breadcrumbs'));

    }

    public function show_logbook(Logbook $id){
        return view('dashboard_pegawai.hal_logbook.index', compact('id'));
    }

    public function store_logbook(Request $request, Logbook $id){
        $request->validate([
            "isi_logbook" => "required"
        ]
        );

        // dd($request->all());
        $data = Logbook::find($id->id);
        $data->update([
            "isi_logbook" => $request->isi_logbook
        ]);

        $data->save();

        return redirect()->route('presensi.log_book')->with('success', "Logbook Berhasil Diisi");
    }
}
