<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/countdown.js"></script>
</head>
<body>
    <!-- Phần hiển thị thời gian còn lại -->
    <div class="square-container">
        <!-- Phần bên trái -->
        <div class="left-side">
            <div class="left-noidung">
                <!-- Nội dung phần bên trái -->
                <p style="margin-bottom: 10px; margin-top: 50px;">Đơn hàng hết hạn sau</p>
                <!-- Bộ đếm ngược -->
                <div id="countdown"></div>
                <hr>
                <p id="noidung">Nhà cung cấp</p>
                <p id="thongtin">Cty TNHH một mình Quân</p>
                <hr>
                <p id="noidung"><img src="/assets/img/sotien2.png"> Số tiền</p>
                <p id="thongtin">1.000.000đ</p>
                <hr>
                <p id="noidung"><img src="assets/img/thongtin2.png"> Thông tin</p>
                <p id="thongtin">abc1234</p>
                <hr>
                <p id="noidung"><img src="assets/img/mavach2.png"> Đơn hàng</p>
                <p id="thongtin">abc1234_123456789</p>
                <hr>
                <p id="back">&larr; Quay lại</p>
            </div>
        </div>
        <!-- Phần bên phải -->
        <div class="right-side">
            <div class="image-container">
                <!-- Hình ảnh bên trái -->
                <img src="assets/img/momo.png" alt="Hình ảnh bên trái">
        
                <!-- Hình ảnh bên phải -->
                <img src="assets/img/momo.png" alt="Hình ảnh bên phải">
            </div>
            <hr>
            <p style="color: #B01F72; "><strong>Quét mã để thanh toán</strong></p>
            <br>
            <img id="qrcode" src="assets/img/qrcode.png">
            <div style="width: 300px">
                <p>Sử dụng App <strong> MoMo </strong>hoặc<br>ứng dụng Camera hỗ trợ QR code để quét mã.</p>
            </div>
            <h4><img src="assets/img/loading.gif">Đang chờ bạn quét...</h4>
            <br>
            <div class="red-border">
            </div>
            <p style="color:red"><strong>Không thấy "Đăng nhập" để thanh toán</strong></p>
        </div>
    </div>
</body>
</html>