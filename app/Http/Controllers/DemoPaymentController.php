<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoPaymentController extends Controller
{
    // get data
    public function getData(){
        $orderInfo = "Thanh toán qua ATM - MoMo";
        // $amount = $_POST['total_pay'];
        $amount = "570000";
        //$orderId = time() . "";

        $customer_id = DB::table('tbl_customers')->orderby('customer_id','desc')->get();
        $customer_order_id = DB::table('tbl_order')->where('customer_id',$customer_id)->orderby('order_id','desc')->get();
        //$details_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id', $product_id)->limit(1)->get();

    }
    
    public function index(){
        return view('payment_demo.sandbox');
    }
}
