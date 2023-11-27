<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PreReleaseProductController extends Controller
{
    
    public function index(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
        // them
        Cart::destroy();
        return view('pre_release.index');
    }
}
