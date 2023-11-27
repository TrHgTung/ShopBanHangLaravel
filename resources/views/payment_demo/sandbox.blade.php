<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <script src="{{asset('public/frontend/js/countdown.js')}}"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/chatbox.css')}}" rel="stylesheet">
	<script src="{{('public/frontend/js/jquery.min.js')}}"></script>
	<script src="{{('public/frontend/js/jquery.js')}}"></script>
	<script src="{{('public/frontend/js/jquery.min.map')}}"></script>
</head>
<body>
    <!-- Phần hiển thị thời gian còn lại -->
   <div class="container">
    <div class="square-container">
            <!-- Phần bên trái -->
            <div class="left-side">
                <div class="left-noidung">
                    <!-- Nội dung phần bên trái -->
                    <p style="margin-bottom: 10px; margin-top: 50px;"><strong>Đơn hàng sẽ hết hạn sau</strong></p>
                    <!-- Bộ đếm ngược -->
                    <div id="countdown"></div>
                    <hr>
                    <p id="noidung"><strong>Nhà cung cấp</strong></p>
                    <p id="thongtin">Nhà sách trực tuyến Neko Store</p>
                    <hr>
                    <p id="noidung"> <strong>Số tiền</strong></p>
                    <p id="thongtin">$price</p>
                    <hr>
                    <p id="noidung"><strong>Khách hàng thanh toán</strong></p>
                    <p id="thongtin">Hoang Tung</p>
                    <hr>
                    <p id="noidung"><strong>Đơn hàng</strong></p>
                    <p id="thongtin">$orderId</p>
                    <hr>
                    <!-- Nút hủy ẩn -->
                    <a href="{{URL::to('#')}}">???</a>
                    
                </div>
            </div>
            <!-- Phần bên phải -->
            <div class="right-side">
                <div class="image-container">
                    <!-- Hình ảnh bên trái -->
                    <img src="{{asset('public/frontend/images/Payment/momo.png')}}" alt="Hình ảnh bên trái">
            
                    <!-- Hình ảnh bên phải -->
                    <img src="{{asset('public/frontend/images/Payment/momo.png')}}" alt="Hình ảnh bên phải">
                </div>
                <hr>
                <p style="color: #B01F72; "><strong>Quét mã để thanh toán</strong></p>
                <br>
                <img id="qrcode" src="{{asset('public/frontend/images/Payment/qrcode.png')}}">
                <div style="width: 300px">
                    <p>Vui lòng sử dụng ứng dụng MoMo trên thiết bị di động của bạn để quét mã thực hiện thanh toán đơn hàng</p>
                </div>
                <a href="{{URL::to('/')}}" id="back">Hủy phiên thanh toán này</a>
            </div>
        </div>
   </div>
</body>
</html>