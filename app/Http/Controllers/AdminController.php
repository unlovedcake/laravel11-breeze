<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\User;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        if (Auth::id()) {
            $userType = Auth()->user()->user_type;

            if ($userType == 'user') {
                return view('dashboard');
            } else if ($userType == 'admin') {
                return view('admin.adminhome');
            }
        }
    }
}
