<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart; 

class MoMoController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momo_payment(Request $request){
        // $config = file_get_contents('../config.json');
        // $array = json_decode($config, true);

        // include "../common/helper.php";

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM - MoMo";
        // $amount = $_POST['total_pay'];
        $amount = "570000";
        $orderId = time() . "";
        $redirectUrl = "http://localhost/ShopBanHangLaravel/payment";
        $ipnUrl = "http://localhost/ShopBanHangLaravel/payment";
        $extraData = "";
        
        
        // if (!empty($_POST)) {
            // $partnerCode = $_POST["partnerCode"];
            // $accessKey = $_POST["accessKey"];
            // $serectkey = $_POST["secretKey"];
            // $orderId = $_POST["orderId"]; // Mã đơn hàng
            // $orderInfo = $_POST["orderInfo"];
            // $amount = $_POST["amount"];
            // $ipnUrl = $_POST["ipnUrl"];
            // $redirectUrl = $_POST["redirectUrl"];
            // $extraData = $_POST["extraData"];
        
            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            // dd($signature);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            // dd($signature); 
            // dd($result);
            $jsonResult = json_decode($result, true);  // decode json
        
            //Just a example, please check more in there
            
        return redirect()->to($jsonResult['payUrl']);
        Cart::destroy();
            // header('Location: ' . $jsonResult['payUrl']);
        // }
    }

    // quickpay_qrCode

    public function quickpay_execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        echo($result);
        $jsonResult = json_decode($result, true);
        if ($jsonResult['payUrl'] != null)
            return redirect()->to($jsonResult['payUrl']);   
        // header('Location: ' . $jsonResult['payUrl']);
        return $result;
    }

    public function momo_quickpay(Request $request){
       
        // $partnerName = 'MoMo Payment';
        // $storeId = 'Test Store';
        
      

        if (!empty($_POST)) {
            $endpoint = 'https://test-payment.momo.vn/v2/gateway/api/pos';
            $autoCapture =True;
            $lang = 'vi';
            $ipnUrl = 'http://localhost/ShopBanHangLaravel/payment';
            $requestId = time()."";
            $extraData ='';

            $accessKey = 'F8BBA842ECF85';
            $secretKey = 'K951B6PE1waDMi640xX08PD3vg6EkVlz';
            $orderInfo = 'pay with MoMo';
            $partnerCode = 'MOMOBKUN20180529';
            $redirectUrl = 'http://localhost/ShopBanHangLaravel/payment';
            $amount = '50000';
            $orderId = time()."";
            $paymentCode = 'L/U2a6KeeeBBU/pQAa+g8LilOVzWfvLf/P4XOnAQFmnkrKHICj51qrOTUQ+YrX8/Xs1YD4IOdyiGSkCfV6Je9PeRzl3sO+mDzXNG4enhigU3VGPFh67a37dSwItMJXRDuK64DCqv35YPQtiAOVVZV35/1XBw1rWopmRP03YMNgQWedGLHwmPSkRGoT6XtDSeypJtgbLZ5KIOJsdcynBdFEnHAuIjvo4stADmRL8GqdgsZ0jJCx/oq5JGr8wY+a4g9KolEOSTLBTih48RrGZq3LDBbT4QGBjtW+0W+/95n8W0Aot6kzdG4rWg1NB7EltY6/A8RWAHJav4kWQoFcxgfA==';
            $orderGroupId ='';

            $requestId = time().'';
            $extraData = "";
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&paymentCode=" . $paymentCode . "&requestId=" . $requestId;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "MoMo Payment",
                'storeId' => 'MomoTestStore',
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'autoCapture' => $autoCapture,
                'extraData' => $extraData,
                'paymentCode' => $paymentCode,
                'orderGroupId' => $orderGroupId,
                'signature' => $signature);
            $result = $this->quickpay_execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            // Cart::destroy();
            // return redirect()->to($jsonResult['payUrl']);

        }
    }
}