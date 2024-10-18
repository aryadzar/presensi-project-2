<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\SetRole;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Validator; // Add this line

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

    public function storeUser(Request $request){
        $request->validate([
            'NPM' => 'required|numeric|unique:users,NPM',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
            'asal_instansi' => 'required|string|max:255',
        ],
        ["NPM.unique" => "NPM/NIK/NIS sudah terdaftar pada absensi"]
    );

        $data = User::create([
            "NPM" => $request->NPM,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "password" => bcrypt("password"),
            "no_telepon" => $request->no_telepon,
            "asal_instansi" => $request->asal_instansi,
            "soft_delete" => 0
        ]);

        $data->save();

        return redirect()->route('administratif.daftarpegawai')->with('success', 'User Berhasil Ditambah');
    }

    public function show_user_info($id){
        $data = User::find($id);

        return view("dashboard_admin.edit_user.index", compact("data"));
    }

    public function edit_user_info(Request $request,$id){
        $request->validate([
            'NPM' => 'required|numeric|',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
            'asal_instansi' => 'required|string|max:255',
        ],
        ["NPM.unique" => "NPM/NIK/NIS sudah terdaftar pada absensi"]
        );

        $data = User::find($id);

        $data->update([
            "NPM" => $request->NPM,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "password" => bcrypt("password"),
            "no_telepon" => $request->no_telepon,
            "asal_instansi" => $request->asal_instansi,
            "soft_delete" => 0
        ]);

        $data->save();


        return redirect()->route('administratif.daftarpegawai')->with('success', 'User Berhasil Diedit');

    }

    public function delete_user($id){
        $data = User::find($id);

        $data->delete();

        return redirect()->route('administratif.daftarpegawai')->with('success', 'User Berhasil Dihapus');

    }

    public function editRole(User $user)
    {
        $roles = Role::all();
        $units = UnitKerja::all();

        return view('dashboard_admin.kelola_role.index', compact('user', 'roles', 'units'));
    }

    public function addUserRole(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'unit_kerja_id' => 'nullable|exists:unit_kerjas,id',
        ]);

        $user->setRoles()->create([
            'role_id' => $request->role_id,
            'unit_kerja_id' => $request->unit_kerja_id
        ]);

        return redirect()->route('edit.role', $user->id)->with('success', 'Role berhasil ditambahkan.');
    }

    public function editUserRole(User $user, $setRoleId)
    {
        $setRole = SetRole::findOrFail($setRoleId);
        $roles = Role::all();
        $units = UnitKerja::all();

        return view('edit_role.edit_role', compact('setRole', 'roles', 'units'));
    }

    public function updateUserRole(Request $request, User $user, $setRoleId)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'unit_kerja_id' => 'nullable|exists:unit_kerjas,id',
        ]);

        $setRole = SetRole::findOrFail($setRoleId);
        $setRole->update([
            'role_id' => $request->role_id,
            'unit_kerja_id' => $request->unit_kerja_id
        ]);

        return redirect()->route('edit.role', $user->id)->with('success', 'Role berhasil diperbarui.');
    }

    public function deleteUserRole(User $user, $setRoleId)
    {
        $setRole = SetRole::findOrFail($setRoleId);
        $setRole->delete();

        return redirect()->route('edit.role', $user->id)->with('success', 'Role berhasil dihapus.');
    }

}
