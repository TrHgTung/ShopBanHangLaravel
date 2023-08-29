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
    public function index(Request $request)
    {
         // SEO
         $meta_desc = "Chuyên bán những phụ kiện ,thiết bị game"; 
         $meta_keywords = "thiet bi game,phu kien game,game phu kien,game giai tri";
         $meta_title = "Phụ kiện,máy chơi game chính hãng";
         $url_canonical = $request->url();
         // end SEO

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
        // them
        // $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        // $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        // $details_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id', $product_id)->limit(1)->get();

        return view('pages.home')->with('category_product' , $cate_product)->with('brand_product' , $brand_product)->with('all_product', $all_product);
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->orWhere('product_content','like','%'.$keywords.'%')->orWhere('product_desc','like','%'.$keywords.'%')->orWhere('product_price','like','%'.$keywords.'%')->get();
        // $search_product_content = DB::table('tbl_product')->where('product_content','like','%'.$keywords.'%')->get();

        return view('pages.sanpham.search')->with('category_product' , $cate_product)->with('brand_product' , $brand_product)->with('search_product', $search_product);

    }
}
