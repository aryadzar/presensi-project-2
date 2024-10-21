<?php

namespace App\Http\Controllers;

use SSO\SSO;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function loginView(){
        Session::forget(keys: 'id_unit_kerja');

        return view(view: 'login');
    }


    public function login_sso(){
        if(SSO::authenticate()){
            $check = User::where('NPM', SSO::getUser()->nip)->first(); //mengecek apakah pengguna SSO memiliki username yang sama dengan database aplikasi
            if(SSO::check()){
                Auth::loginUsingId($check->id);
                $user = Auth::user();

                $roles = $user->setRoles()->with('role')->get();

                if ($roles->count() > 1) {
                    return redirect()->route('role');
                }

                $roleName = $roles->first()->role->nama_role;

                if ($roleName === 'Admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($roleName === 'Operator') {
                    return redirect()->route('operator.dashboard');
                } else {
                    return redirect()->route('karyawan.dashboard');
                }
            }
        }
    }
    public function selectRole(){
        $user = Auth::user();

        Session::forget("id_unit_kerja");

        // Ambil semua role user
        $roles = $user->setRoles()->with(['role', 'unitKerja'])->get()->sortDesc();
        return view('ganti_role.index', compact('roles'));
    }

    public function setRole(Request $request){
        $roleId = $request->input('role_id');
        $unitKerjaId = $request->input('unit_kerja_id');
        $user = Auth::user();

        Session::forget("id_unit_kerja");
        // Cek apakah user memiliki role yang dipilih

        if ($user->setRoles()->where(['id_role' => $roleId, 'id_unit_kerja' => $unitKerjaId])) {
            $setRole = $user->setRoles()->where('id_role', $roleId)->first();
            $role = $setRole->role->nama_role;
            $idUnitKerja = $setRole->id_unit_kerja;

        // Simpan id_unit_kerja ke session
            // $request->session()->put('id_unit_kerja', $idUnitKerja);
            Session::put('id_unit_kerja', $unitKerjaId);
            // Simpan id_unit_kerja ke dalam session
            // Redirect ke halaman dashboard sesuai role
            if ($role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'Operator') {
                return redirect()->route('operator.dashboard');
            } else {
                return redirect()->route('karyawan.dashboard');
            }
        }
    }

    public function loginAction(Request $request){
        $credentials = $request->validate([
            'NPM' => 'required',
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            Session::forget('id_unit_kerja');

            $roles = $user->setRoles()->with('role')->get();

            if ($roles->count() > 1) {

                return redirect()->route('role');
            }
            // Jika hanya memiliki satu role, simpan id_unit_kerja ke session
            $setRole = $roles->first();
            $roleName = $setRole->role->nama_role;
            $unitKerjaId = $setRole->id_unit_kerja;

            // Simpan id_unit_kerja ke session
            Session::put('id_unit_kerja', $unitKerjaId);

            if ($roleName === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($roleName === 'Operator') {
                return redirect()->route('operator.dashboard');
            } else {
                return redirect()->route('karyawan.dashboard');
            }
        }

        return back()->withErrors([
            'login' => 'NPM/NIK atau password salah ! ',
        ])->onlyInput('NPM');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        if(SSO::check()){
            SSO::logout(url(route('login')));
        }
        return redirect('/');
    }

    private function jangan_diotak_atik(){
        // BAGIAN lOGIN_ACTION
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     $user = Auth::user();

        //     $roles = $user->setRoles()->with('role')->get();

        //     if ($roles->count() > 1) {
        //         return redirect()->route('role');
        //     }

        //     $roleName = $roles->first()->role->nama_role;

        //     if ($roleName === 'Admin') {
        //         return redirect()->route('admin.dashboard');
        //     } elseif ($roleName === 'Operator') {
        //         return redirect()->route('operator.dashboard');
        //     } else {
        //         return redirect()->route('karyawan.dashboard');
        //     }
        // }

        // BAGIAN LOGIN_SSO
        // if(SSO::authenticate()){
        //     $check = User::where('NPM', SSO::getUser()->nip)->first(); //mengecek apakah pengguna SSO memiliki username yang sama dengan database aplikasi
        //     if(SSO::check()){
        //         Auth::loginUsingId($check->id);
        //         $user = Auth::user();

        //         $roles = $user->setRoles()->with('role')->get();

        //         if ($roles->count() > 1) {
        //             return redirect()->route('role');
        //         }

        //         $roleName = $roles->first()->role->nama_role;

        //         if ($roleName === 'Admin') {
        //             return redirect()->route('admin.dashboard');
        //         } elseif ($roleName === 'Operator') {
        //             return redirect()->route('operator.dashboard');
        //         } else {
        //             return redirect()->route('karyawan.dashboard');
        //         }
        //     }
        // }
    }
}
