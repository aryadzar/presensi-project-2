<?php

namespace App\Http\Controllers;

use SSO\SSO;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView(){
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

        // Ambil semua role user
        $roles = $user->setRoles()->with(['role', 'unitKerja'])->get()->sortDesc();

        return view('ganti_role.index', compact('roles'));
    }

    public function setRole(Request $request){
        $roleId = $request->input('role_id');
        $user = Auth::user();

        // Cek apakah user memiliki role yang dipilih
        if ($user->setRoles()->where('id_role', $roleId)->exists()) {
            $role = $user->setRoles()->where('id_role', $roleId)->first()->role->nama_role;

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
