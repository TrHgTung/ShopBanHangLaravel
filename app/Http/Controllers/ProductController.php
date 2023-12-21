<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Slider;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
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

    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
       
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
    }

    public function all_product()
    {
        $this->AuthLogin();
        // $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->get();

        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin();
        // return view('admin.save_brand_product');
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_gift'] = $request->product_gift;
        // $data['product_image'] = $request->product_status;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $get_extension_image = $get_image->getClientOriginalExtension();

            $name_image = current(explode('.',$get_name_image));

            $new_image = 'IMG'.rand(0,99).'_'.$name_image.'.'.$get_extension_image;
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;

            DB::table('tbl_product')->insert($data);

            Session::put('message', 'Thành công! Đã thêm sản phẩm!');
            return Redirect::to('admin/all-product');
        }
        $data['product_image'] = '';

        DB::table('tbl_product')->insert($data);

        Session::put('message', 'Thành công! Đã thêm sản phẩm!');
        return Redirect::to('admin/all-product');
    }

    public function inactive_product ($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['status'=>1]);
        Session::put('message','Sản phẩm đã hiển thị');
        return Redirect::to('admin/all-product');
    }

    public function active_product ($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['status'=>0]);
        Session::put('message','Sản phẩm đã ẩn');
        return Redirect::to('admin/all-product');
    }

    public function edit_product ($product_id)
    {
        $this->AuthLogin();

        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function update_product (Request $request, $product_id)
    {
        $this->AuthLogin();

        $data = array();
        // $data['product_name'] = $request->product_name;
        // $data['product_desc'] = $request->product_desc;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        // $data['product_image'] = $request->product_status;
        $data['product_gift'] = $request->product_gift;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $get_extension_image = $get_image->getClientOriginalExtension();

            $name_image = current(explode('.',$get_name_image));

            $new_image = 'IMG'.rand(0,99).'_'.$name_image.'.'.$get_extension_image;
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;

            DB::table('tbl_product')->where('product_id', $product_id)->update($data);

            Session::put('message', 'Thành công! Đã cập nhật sản phẩm!');
            return Redirect::to('admin/all-product');
        }
        // $data['product_image'] = '';

        DB::table('tbl_product')->where('product_id', $product_id)->update($data);

        Session::put('message', 'Thành công! Đã cập nhật sản phẩm!');
        return Redirect::to('admin/all-product');

        // DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        // Session::put('message','Sản phẩm đã cập nhật thành công');
        // return Redirect::to('all-product');
    }

    public function delete_product ($product_id)
    {
        $this->AuthLogin();
        
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message','Đã xóa sản phẩm!');
        return Redirect::to('admin/all-product');
    }
    // end of admin site
    // ------------
    // user
    public function details_product($product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $details_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id', $product_id)->limit(1)->get();

        foreach($details_product as $key=>$value){
            $category_id = $value->category_id;
        }

        $related_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();

        return view('pages.sanpham.show_details')->with('category_product' , $cate_product)->with('brand_product' , $brand_product)->with('detail_product' , $details_product)->with('relate', $related_product);
        // return view('pages.sanpham.show_details')->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
        // return view('pages.sanpham.show_details',compact('cate_product','brand_product','detail_product'));
    }

    // public function show_comment($product_id){
    //     $comment = DB::table('tbl_comment')->orderby('id','desc')->get();

    //     return view('pages.sanpham.show_details')->with('comment', $comment);
        
    // }
    
}
