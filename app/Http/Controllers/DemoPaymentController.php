<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoPaymentController extends Controller
{
    // get data
    public function getData(){
        //get Data from DB
    }
    
    public function index(){
        return view('payment_demo.sandbox');
    }
}
