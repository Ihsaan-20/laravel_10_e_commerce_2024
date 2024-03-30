<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function admin_login()
    {
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1)
        {
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }
    public function admin_login_process(Request $request)
    {
        // dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt([
            'email' => $request->email,
             'password' => $request->password,
              'is_admin' => 1,
              'status' => 1,
              'is_deleted' => 0,
            ], $remember))
        {
            return redirect('admin/dashboard');
        }else
        {
            return redirect()->back()->with('incorrect_password', 'Email or password is incorrect');
        }
    }

    
}
