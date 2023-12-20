<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class AdminController extends Controller
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
    public function login ()
    {
        // echo 'test';
        return view('admin.auth.admin_login');
    }

    public function show_dashboard ()
    {
        // echo 'test';
        $this->AuthLogin(); 
        return view('admin.admin_dashboard');
    }

    public function dashboard (Request $request)
    {
        // echo 'test';
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            // return Redirect::to('/admin-dashboard');
            return view('admin.admin_dashboard');
        }
        else{
            Session::put('message','Vui lòng đăng nhập lại. Lỗi sai thông tin đăng nhập');
            // return view('admin.auth.admin_login');
            return Redirect::to('/admin-login');
        }
        
    }

    public function logout ()
    {
        // echo 'oke';
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return view('admin.auth.admin_login');
    }
}
