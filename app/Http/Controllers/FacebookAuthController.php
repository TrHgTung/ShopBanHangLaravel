<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use App\Slider;
use Illuminate\Support\Facades\Redirect;

session_start();

class FacebookAuthController extends Controller
{
    public function index(){
        return view('loginFB.index');
    }

    public function login_checkout(Request $request){
        //
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view("pages.checkout.login_checkout")->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
    }

    public function logout_checkout(){
        Session::flush();

        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);

        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();

        if($result){
            // Lấy dữ liệu từ các cột tương ứng
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            // Chuyển hướng tới trang
            return Redirect::to('/'); // login dung thi toi trang chu, voi session cua user
        }else{
            return Redirect::to('/login-checkout'); // login sai thi quay lai re-login check

        }
        
        // Session::put('customer_name',  $request->customer_name);

        
    }

}
