<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Cổng thanh toán MoMo</title>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="MoMo Payment"/>
    <meta property="og:image:width" content="800"/>
    <meta property="og:image:height" content="366"/>
    <meta property="og:image" content="https://test-payment.momo.vn/qr/banner-payment.jpg"/>
    <link
          href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link media="screen" rel="stylesheet" href="{{asset('public/frontend/css/momo.css')}}"/>
    <link href="https://test-payment.momo.vn/v2/gateway/images/icons/momo-722dd4ed23488fa805aa81f9942d168b.ico" rel="SHORTCUT ICON">
    <script crossorigin="anonymous"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
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


<meta content="width=device-width, initial-scale=1" name="viewport">


<meta name="_csrf" content="f00a72eb-d1bd-408e-be31-1b7b4c4ea76f"/>


<!-- default header name is X-CSRF-TOKEN -->


<meta name="_csrf_header" content="X-CSRF-TOKEN"/>


<link rel="stylesheet" href="{{asset('public/frontend/css/momo2.css')}}">


<link media="screen" rel="stylesheet" href="{{asset('public/frontend/css/momo3.css')}}"/>


<script src="https://www.google.com/recaptcha/api.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<body>
<header id="header">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo-wrap">
                <a class="navbar-brand momo-logo">
                    <svg class="svg-icon fill-current imgLogo " fill="#fff" height="87" viewBox="0 0 96 87" width="96"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M75.5326 0C64.2284 0 55.0651 8.74843 55.0651 19.5409C55.0651 30.3333 64.2284 39.0818 75.5326 39.0818C86.8368 39.0818 96 30.3333 96 19.5409C96 8.74843 86.8368 0 75.5326 0ZM75.5326 27.8805C70.7368 27.8805 66.8403 24.1604 66.8403 19.5818C66.8403 15.0031 70.7368 11.283 75.5326 11.283C80.3283 11.283 84.2248 15.0031 84.2248 19.5818C84.2248 24.1604 80.3283 27.8805 75.5326 27.8805ZM49.1561 14.6761V39.1226H37.3809V14.5535C37.3809 12.7138 35.8394 11.2421 33.9126 11.2421C31.9857 11.2421 30.4442 12.7138 30.4442 14.5535V39.1226H18.669V14.5535C18.669 12.7138 17.1276 11.2421 15.2007 11.2421C13.2739 11.2421 11.7324 12.7138 11.7324 14.5535V39.1226H0V14.6761C0 6.58176 6.89385 0 15.372 0C18.8403 0 22.0089 1.10377 24.5781 2.9434C27.1472 1.10377 30.3586 0 33.7841 0C42.2623 0 49.1561 6.58176 49.1561 14.6761ZM75.5326 47.544C64.2284 47.544 55.0651 56.2925 55.0651 67.0849C55.0651 77.8774 64.2284 86.6258 75.5326 86.6258C86.8368 86.6258 96 77.8774 96 67.0849C96 56.2925 86.8368 47.544 75.5326 47.544ZM75.5326 75.4245C70.7368 75.4245 66.8403 71.7044 66.8403 67.1258C66.8403 62.5472 70.7368 58.827 75.5326 58.827C80.3283 58.827 84.2248 62.5472 84.2248 67.1258C84.2248 71.7044 80.3283 75.4245 75.5326 75.4245ZM49.1561 62.2201V86.6667H37.3809V62.0975C37.3809 60.2579 35.8394 58.7862 33.9126 58.7862C31.9857 58.7862 30.4442 60.2579 30.4442 62.0975V86.6667H18.669V62.0975C18.669 60.2579 17.1276 58.7862 15.2007 58.7862C13.2739 58.7862 11.7324 60.2579 11.7324 62.0975V86.6667H0V62.2201C0 54.1258 6.89385 47.544 15.372 47.544C18.8403 47.544 22.0089 48.6478 24.5781 50.4874C27.1472 48.6478 30.3158 47.544 33.7841 47.544C42.2623 47.544 49.1561 54.1258 49.1561 62.2201Z"
                              fill=""></path>
                    </svg>
                </a>
                <span class="logo-title">Cổng thanh toán MoMo</span>
            </div>
        </div>
    </div>
</header>
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
                    <p id="thongtin">570 000 VND</p>
                    <hr>
                    <p id="noidung"><strong>Khách hàng thanh toán</strong></p>
                    <!-- <p id="thongtin">Hoang Tung</p> -->
                    <p id="thongtin">{{$customer_name}}</p>
                    <hr>
                   
                    <!-- Nút direct ẩn -->
                    
                    
                </div>
            </div>
            <!-- Phần bên phải -->
            <div class="right-side">
                <div class="text-center">
                    <hr>
                    <p style="color: #B01F72; "><strong>Quét mã để thanh toán</strong></p>
                    <br>
                        <a href="{{URL::to('/')}}"><img id="qrcode" src="{{asset('public/frontend/images/Payment/qrcode.png')}}" width="100%" height="100%"></a>
                    </div>
                    <div class="text-center mb-4 fs-50">
                        <h4><strong>Cảm ơn bạn đã thanh toán dịch vụ</strong></h4>
                    </div>
                    <div class="text-center mt-4 mb-5">
                        
                        <p>Vui lòng sử dụng ứng dụng MoMo trên thiết bị di động của bạn để quét mã thực hiện thanh toán đơn hàng</p>
                        <a href="{{URL::to('/')}}" id="back">Hủy phiên thanh toán này</a>
                    </div>
                
            </div>
        </div>
<script>
    $(".toggle-btn").click(function () {
        if ($(".text-data-es").hasClass("d-none")) {
            $(this).addClass("test")
        } else {
            $(this).addClass("test2")
        }
        $(this).toggleClass('active')
        $(".text-data-es").toggleClass("d-none");
    });
</script>
 


<div><footer id="footer">
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-wrap-version">
                <span>© 2023 - Cổng thanh toán MoMo</span>
            </div>

            <div class="footer-wrap-info">
                <span>Hỗ trợ khách hàng:</span>
                <a class="momo-phone-icon" href="tel:1900545441">1900 54 54 41 (1000đ/phút)</a>
                <a class="momo-mail-icon" href="mailto:hotro@momo.vn">hotro@momo.vn</a>
            </div>
        </div>
    </div>
</footer></div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>
