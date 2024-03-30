<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        return view('admin.dashboard', compact('data'));
    }

    public function admin_logout()
    {
        Auth::logout();
        return redirect('admin/login')->with('logout_success', 'Logout successfully');
    }
    
}
