<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Slider;
use Illuminate\Support\Facades\Redirect;

session_start();  

class CouponHandleController extends Controller
{
    public function index(Request $request){
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['coupon'] = $request->coupon;
        $data['product_id'] = $request->product_id;
        
        DB::table('tbl_coupon')->insert($data);

        return Redirect::to('/');
    }
}
