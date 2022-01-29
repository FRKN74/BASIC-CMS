<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {   
        return view('login');
    }
    public function loginPost(Request $request)
    {   
        if(Auth::attempt(['email' => $request->email,'password' => $request->pass])) {
            
            toastr()->success('Hoşgeldiniz. '.Auth::user()->name);
            return redirect()->route('create');
        }else{
            toastr()->warning('Giriş hatalı.');
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
