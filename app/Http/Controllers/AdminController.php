<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login ()
    {
        // echo 'test';
        return view('admin.auth.admin_login');
    }

    // public function index ()
    // {
    //     // echo 'test';
    //     return view('admin.admin_layout');
    // }

    public function dashboard ()
    {
        // echo 'test';
        return view('admin.dashboard');
    }
}
