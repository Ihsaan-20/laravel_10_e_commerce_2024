<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['meta_title'] = 'Home - E-commerce';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('home', compact('data'));
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
