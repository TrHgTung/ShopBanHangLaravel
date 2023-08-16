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
}
