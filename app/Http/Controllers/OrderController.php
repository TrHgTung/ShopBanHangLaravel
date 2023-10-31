<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
// use Controller\AdminController;

session_start();

class OrderController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){ // neu có admin login vào
            return Redirect::to('/admin-dashboard');
            // return view('admin.admin_dashboard');
        }
        else{
            // return Redirect::to('admin')->send();
            return Redirect::to('/admin-login')->send();
            // return view('admin.auth.admin_login');
        }
    }

    public function all_order(Request $request)
    {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')->get();
        // dd($all_order);

        return view('admin_layout')->with('admin.all_order', $all_order);
    }
}
