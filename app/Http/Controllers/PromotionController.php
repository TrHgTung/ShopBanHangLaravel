<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PromotionController extends Controller
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

    public function index(Request $request)
    {
         // SEO
         $meta_desc = "Chuyên bán sách giấy trực tuyến"; 
         $meta_keywords = "sach,sach giay,truyen tranh,sach giao khoa";
         $meta_title = "Sách được phân phối chính hãng từ Nhà xuất bản";
         $url_canonical = $request->url();
         // end SEO

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
        // them
        // $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        // $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        // $details_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id', $product_id)->limit(1)->get();

        return view('pages.promotion.index')->with('category_product' , $cate_product)->with('brand_product' , $brand_product)->with('all_product', $all_product);
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

    public function show_all_promotions(Request $request){
        // add new tbl_promotion > query data from tbl_promotion > show in view UI (view: get template (paralax view))
        return view('pages.promotion.show_promotions');
    }

    public function autocomplete_ajax(Request $request){
        // $data = $request->all();
        // if($data['query']){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $product = DB::table('tbl_product')->where('product_status',1)->where('product_name','LIKE',"%{$query}%")->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';

            foreach($product as $key => $val){
                $output .= '<li><a class="dropdown-item" href="#">'.$val->product_name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

}
