<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('back.auth.login');
    }

    public function loginPost(Request $request) {
        //dd($request->post());
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            if(Auth::user()->status) {
                toastr()->success(' Hoşgeldin ' . Auth::user()->name . ' bremin :)');
                return redirect()->route('admin.dashboard');
            }
            else {
                return view('back.auth.login')->withErrors('Hesap aktif değil. Yönetici ile iletişime geçiniz.');
            }
        }
        return redirect()->route('admin.login')->withErrors('Bak yanlış yapıyosuun.');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
