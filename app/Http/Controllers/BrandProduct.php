<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class BrandProduct extends Controller
{
    public function add_brand_product()
    {
        return view('admin.add_brand_product');
    }

    public function all_brand_product()
    {
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }

    public function save_brand_product(Request $request)
    {
        // return view('admin.save_brand_product');
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        DB::table('tbl_brand_product')->insert($data);

        Session::put('message', 'Thành công! Đã xác nhận hợp tác với thương hiệu!');
        return Redirect::to('all-brand-product');
    }

    public function inactive_brand_product ($brand_product_id)
    {
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Thương hiệu đã hiển thị');
        return Redirect::to('all-brand-product');
    }

    public function active_brand_product ($brand_product_id)
    {
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Thương hiệu đã ẩn');
        return Redirect::to('all-brand-product');
    }

    public function edit_brand_product ($brand_product_id)
    {
        $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }

    public function update_brand_product (Request $request, $brand_product_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;

        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update($data);
        Session::put('message','Thương hiệu đối tác đã cập nhật thành công');
        return Redirect::to('all-brand-product');
    }

    public function delete_brand_product ( $brand_product_id)
    {
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->delete();
        Session::put('message','Đã ngừng hợp tác với thương hiệu');
        return Redirect::to('all-brand-product');
    }
}
