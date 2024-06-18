<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\User;

use Illuminate\Support\Facades\Auth;
use \App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {



        if (Auth::id()) {
            $products = Product::get();

            $userType = Auth()->user()->user_type;

            if ($userType == 'user') {
                return view('dashboard');
            } else if ($userType == 'admin') {
                return view('admin.adminhome', compact('products'));
            }
        }
    }

    public function post()
    {
        return view('admin.post');
    }
}
