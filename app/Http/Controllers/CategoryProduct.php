<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('admin.add_category_product');
    }

    public function all_category_product()
    {
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request)
    {
        // return view('admin.save_category_product');
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        DB::table('tbl_category_product')->insert($data);

        Session::put('message', 'Thành công! Danh mục sản phẩm đã được thêm!');
        return Redirect::to('all-category-product');
    }

    public function inactive_category_product ($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status'=>1]);
        Session::put('message','Danh mục sản phẩm đã hiển thị');
        return Redirect::to('all-category-product');
    }

    public function active_category_product ($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Danh mục sản phẩm đã ẩn');
        return Redirect::to('all-category-product');
    }
}
