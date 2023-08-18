<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Slider;
use Illuminate\Support\Facades\Redirect;

session_start();
class CheckoutController extends Controller
{
    public function login_checkout(){
        //
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view("pages.checkout.login_checkout")->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
    }

    public function add_customer(Request $request){
        // lay du lieu tu form
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name',  $request->customer_name);

        return Redirect('/checkout');
    }

    public function checkout(){
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view("pages.checkout.show_checkout")->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
    
    }

    public function save_checkout_customer(Request $request){
        // lay du lieu tu form
        $data = array();
        $data['customer_sex'] = $request->customer_sex;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shop_note'] = $request->shop_note;
        $data['delivery_note'] = $request->delivery_note;
        $data['recipients_name'] = $request->recipients_name;
        $data['recipients_sex'] = $request->recipients_sex;
        $data['recipients_address'] = $request->recipients_address;
        $data['recipients_phone'] = $request->recipients_phone;
        // $data['shop_note'] = $request->shop_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);
        // Session::put('customer_name',  $request->customer_name);

        return Redirect('/payment');
    }

    public function payment(){
        
        // $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        // $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        // return view("pages.checkout.show_checkout")->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
        echo "Hello shipping";
    }
}
