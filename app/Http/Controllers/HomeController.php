<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();

        return view('pages.home')->with('category_product' , $cate_product)->with('brand_product' , $brand_product)->with('all_product', $all_product);
        
        // return view('pages.home');

    }

    // public function home()
    // {
    //     return view('pages.home');

    // }
}
