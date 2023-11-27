<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use App\Slider;
use Illuminate\Support\Facades\Redirect;

session_start();
class CheckoutController extends Controller
{
    public function login_checkout(Request $request){
        //
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view("pages.checkout.login_checkout")->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
    }

    public function add_customer(Request $request){
        // lay du lieu tu form
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name',  $request->customer_name);

        return Redirect::to('/');
    }

    public function checkout(Request $request){
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view("pages.checkout.show_checkout")->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
    
    }

    public function save_checkout_customer(Request $request){
        // lay du lieu tu form
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['customer_sex'] = $request->customer_sex;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shop_note'] = $request->shop_note;
        $data['delivery_note'] = $request->delivery_note;
        $data['recipients_name'] = $request->recipients_name;
        $data['recipients_sex'] = $request->recipients_sex;
        $data['recipients_address'] = $request->recipients_address;
        $data['recipients_phone'] = $request->recipients_phone;
        // $data['shop_note'] = $request->shop_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);
        // Session::put('customer_name',  $request->customer_name);

        return Redirect::to('/payment');
    }

    public function payment(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view("pages.checkout.payment")->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
    
    }

    public function logout_checkout(){
        Session::flush();

        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);

        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();

        if($result){
            // Lấy dữ liệu từ các cột tương ứng
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            // Chuyển hướng tới trang
            return Redirect::to('/'); // login dung thi toi trang chu, voi session cua user
        }else{
            return Redirect::to('/login-checkout'); // login sai thi quay lai re-login check

        }
        
        // Session::put('customer_name',  $request->customer_name);

        
    }

    public function order_place(Request $request){
        $data = array();
        // insert phuong thuc thanh toan
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'pending';

        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // insert vao tbl_order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] =  $payment_id;
        $order_data['order_total'] =  Cart::total();
        $order_data['order_status'] = 'pending';

        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        // insert vao tbl_order_details
        $content = Cart::content();

        foreach($content as $v_content ){
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] =   $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] =  $v_content->qty;

            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method'] == '1'){
            Cart::destroy();
            return redirect()->to("/payment-sandbox");  // custom QR generator payment method
        } else if($data['payment_method'] == '2'){
            // echo 'Cash';
            Cart::destroy();
            return redirect()->to("/onepay-result"); // cancel

        } else if($data['payment_method'] == '3'){
            // echo 'MoMo';
            Cart::destroy();
            return redirect()->to("/momo-result");
        }else if($data['payment_method'] == '4'){
            // echo 'shipping';
             Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
    
            return view("pages.checkout.thankyou_cash")->with('category_product' , $cate_product)->with('brand_product' , $brand_product);
        
        }
        else{
            echo 'Vui lòng quay lại và chọn 1 phương thức thanh toán (bắt buộc)';
        }
        // return Redirect::to('/payment');
    }

    // public function execPostRequest($url, $data)
    // {
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //             'Content-Type: application/json',
    //             'Content-Length: ' . strlen($data))
    //     );
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    //     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //     //execute post
    //     $result = curl_exec($ch);
    //     //close connection
    //     curl_close($ch);
    //     return $result;
    // }

    // public function momo_payment(Request $request){
    //     // $config = file_get_contents('../config.json');
    //     // $array = json_decode($config, true);

    //     // include "../common/helper.php";

    //     $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


    //     $partnerCode = 'MOMOBKUN20180529';
    //     $accessKey = 'klm05TvNBzhg7h7j';
    //     $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    //     $orderInfo = "Thanh toán qua ATM - MoMo";
    //     $amount = $_POST['total_momo'];
    //     $orderId = time() . "";
    //     $redirectUrl = "http://localhost/ShopBanHangLaravel/payment";
    //     $ipnUrl = "http://localhost/ShopBanHangLaravel/payment";
    //     $extraData = "";
        
        
    //     // if (!empty($_POST)) {
    //         // $partnerCode = $_POST["partnerCode"];
    //         // $accessKey = $_POST["accessKey"];
    //         // $serectkey = $_POST["secretKey"];
    //         // $orderId = $_POST["orderId"]; // Mã đơn hàng
    //         // $orderInfo = $_POST["orderInfo"];
    //         // $amount = $_POST["amount"];
    //         // $ipnUrl = $_POST["ipnUrl"];
    //         // $redirectUrl = $_POST["redirectUrl"];
    //         // $extraData = $_POST["extraData"];
        
    //         $requestId = time() . "";
    //         $requestType = "payWithATM";
    //         // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //         //before sign HMAC SHA256 signature
    //         $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    //         $signature = hash_hmac("sha256", $rawHash, $secretKey);
    //         // dd($signature);
    //         $data = array('partnerCode' => $partnerCode,
    //             'partnerName' => "Test",
    //             "storeId" => "MomoTestStore",
    //             'requestId' => $requestId,
    //             'amount' => $amount,
    //             'orderId' => $orderId,
    //             'orderInfo' => $orderInfo,
    //             'redirectUrl' => $redirectUrl,
    //             'ipnUrl' => $ipnUrl,
    //             'lang' => 'vi',
    //             'extraData' => $extraData,
    //             'requestType' => $requestType,
    //             'signature' => $signature);
    //         $result = $this->execPostRequest($endpoint, json_encode($data));
    //         // dd($signature); 
    //         // dd($result);
    //         $jsonResult = json_decode($result, true);  // decode json
        
    //         //Just a example, please check more in there
    //     return redirect()->to($jsonResult['payUrl']);
    //         // header('Location: ' . $jsonResult['payUrl']);
    //     // }
    // }

  
}
