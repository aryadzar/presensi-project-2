<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator; // Add this line
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

    public function storeUser(Request $request)
{
    // Validasi data permintaan yang masuk
    $validator = Validator::make($request->all(), [
        'NPM' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_telepon' => 'required|string|max:15',
        'asal_instansi' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }


    $data = User::create([
        'NPM' => $request->NPM,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'no_telepon' => $request->no_telepon,
        'asal_instansi' => $request->asal_instansi,
        'soft_delete' => "0", // Menetapkan nilai default 0 jika belum diatur
    ]);

    $data->save();


    return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
}

}
