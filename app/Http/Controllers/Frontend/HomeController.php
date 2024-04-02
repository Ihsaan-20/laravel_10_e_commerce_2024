<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function wishlist()
    {
        return 'wishlist';
    }
    public function contact()
    {
        return 'contact';
    }
    public function about()
    {
        return 'about';
    }
    
}
