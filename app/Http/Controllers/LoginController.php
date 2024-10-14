<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView(){
        return view('login');
    }

    public function loginAction(Request $request){
        $credentials = $request->validate([
            'NPM' => 'required',
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'login' => 'NIP wajib diisi',
        ])->onlyInput('email');
    }
}
