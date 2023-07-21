<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Slider;
use Gloudemans\Shoppingcart\Facades\Cart; 
use Illuminate\Support\Facades\Redirect;

session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
       
        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();
        // Cart::add('293ad', 'Product1' , 1, 9.99);
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '1';
        $data['options']['image'] = $product_info->product_image;

        Cart::add($data);
        return Redirect::to('/show-cart');
        
    }

    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        // return view();
        return view('pages.cart.show_cart')->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
    }
}
