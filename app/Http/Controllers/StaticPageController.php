<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function van_chuyen(Request $request){
        //
        return view('pages.static.vanchuyen');
    }

    public function index (Request $request){
        //
        return view('staticLayout');
    }
}
