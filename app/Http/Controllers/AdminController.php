<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Diglactic\Breadcrumbs\Breadcrumbs;

class AdminController extends Controller
{
    public function index(){
        $breadcrumbs = Breadcrumbs::generate("Home");
        return view('dashboard_admin.index', compact('breadcrumbs'));
    }

    public function read_daftar_pegawai(){
        $breadcrumbs = Breadcrumbs::generate('Daftar Pegawai');
        $unit_kerja = UnitKerja::all();
        $users = User::all();
        return view('dashboard_admin.daftarpegawai.index', compact('breadcrumbs', 'unit_kerja', 'users'));
    }

    public function add_unit_kerja(Request $request){
        $request->validate([
            "nama_unit" =>[ "required",],
        ], [
            "nama_unit.required" => "Nama Unit Harus Diisi"
        ]);

        $data = UnitKerja::create($request->all());
        $data->save();

        return redirect()->route('administratif.daftarpegawai')->with('success', "Unit Kerja Berhasil Ditambahkan");
    }

    public function update_unit_kerja(Request $request, $id){
        $data = UnitKerja::find($id);
        $request->validate([
            "nama_unit" => "required",
        ], [
            "nama_unit.required" => "Nama Unit Harus Diisi"
        ]);

        $data->update($request->all());

        return redirect()->route('administratif.daftarpegawai')->with('success', "Unit Kerja Berhasil Diperbarui");
    }
    public function delete_unit_kerja($id){
        $data = UnitKerja::find($id);

        $data->delete();

        return redirect()->route('administratif.daftarpegawai')->with('success', "Unit Kerja Berhasil Dihapus");

    }

    public function add_user(){
        $breadcrumbs = Breadcrumbs::generate("Tambah User");
        return view('dashboard_admin.tambah_user.index', compact('breadcrumbs'));
    }

}
