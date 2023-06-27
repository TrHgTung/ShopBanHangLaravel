<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class ProductController extends Controller
{
    public function add_product()
    {
        return view('admin.add_product');
    }

    public function all_product()
    {
        $all_product = DB::table('tbl_product')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        // return view('admin.save_brand_product');
        $data = array();
        $data['name'] = $request->product_name;
        $data['desc'] = $request->product_desc;
        $data['status'] = $request->product_status;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        DB::table('tbl_product')->insert($data);

        Session::put('message', 'Thành công! Đã thêm sản phẩm!');
        return Redirect::to('all-product');
    }

    public function inactive_product ($product_id)
    {
        DB::table('tbl_product')->where('id', $product_id)->update(['status'=>1]);
        Session::put('message','Sản phẩm đã hiển thị');
        return Redirect::to('all-product');
    }

    public function active_product ($product_id)
    {
        DB::table('tbl_product')->where('id',$product_id)->update(['status'=>0]);
        Session::put('message','Sản phẩm đã ẩn');
        return Redirect::to('all-product');
    }

    public function edit_product ($brand_id)
    {
        $edit_product = DB::table('tbl_product')->where('id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function update_product (Request $request, $product_id)
    {
        $data = array();
        $data['name'] = $request->product_name;
        $data['desc'] = $request->product_desc;

        DB::table('tbl_product')->where('id', $product_id)->update($data);
        Session::put('message','Sản phẩm đã cập nhật thành công');
        return Redirect::to('all-product');
    }

    public function delete_product ($product_id)
    {
        DB::table('tbl_product')->where('id', $product_id)->delete();
        Session::put('message','Đã xóa sản phẩm!');
        return Redirect::to('all-product');
    }
}
