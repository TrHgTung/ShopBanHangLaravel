<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# ĐỒ ÁN CUỐI KỲ THƯƠNG MẠI ĐIỆN TỬ - NEKO

Nhóm tác giả: <i>Hoàng Tùng - Trịnh Thành - Anh Quân - Quốc Đạt</i>
Demo: https://youtu.be/kbTeTGmChfo (không deploy được)

## Cách chạy môi trường test:

Trước hết, cài đặt XAMPP (https://www.apachefriends.org/download.html - vì đồ án sử dụng Laravel 10 phải kẹp chung với bản XAMPP dùng PHP 8.2 trở lên) & cài đặt Composer (https://getcomposer.org/) ;

-   Git clone source về đúng thư mục C:\xampp\htdocs\ (thư mục chứa source của XAMPP)
-   Khởi động XAMPP Control Panel (Run as administrator): chạy 2 dịch vụ: Apache và MySQL
-   Mở terminal tại vị trí thư mục của source (C:\xampp\htdocs\ShopBanHangLaravel)
-   Cập nhật các gói thư viện Laravel: gõ câu lệnh `composer update` vào terminal và enter
-   Quay lại, copy file .env.example và paste thành 1 file khác (.env.example - Copy) và đổi tên file mới thành: `.env`. Sau đó, mở file .env và thay đổi các giá trị ở dòng 14 tức sửa thành `DB_DATABASE=ecommercelaravel`. (khi đổi giống vậy thì source sẽ nhận cơ sở dữ liệu MySQL có tên là ecommercelaravel)
-   Khởi tạo cơ sở dữ liệu: Vào MySQL (`127.0.0.1:80/PHPMyAdmin`) --> Tạo 1 CSDL tên `ecommercelaravel` trong MySQL (có thể dùng bất kỳ cái tên nào để đặt cho CSDL, miễn tên CSDL trong MySQL trùng với config trong file .env khi nãy mới thay đổi giá trị `DB_DATABASE`)
-   Vào MySQL (`127.0.0.1:80/PHPMyAdmin`): import file "ecommercelaravel_LASTGOOD_Dec20.sql" đã backup, file này nằm trong thư mục db_backup/ecommercelaravel_LASTGOOD_Dec20.sql của source.
-   Quay lại terminal: Tạo key truy cập ứng dụng Laravel: `php artisan key:generate`
-   Mặc định đồ án chạy ở `127.0.0.1:80/ShopBanHangLaravel`
-   Lưu ý: chỉ thực hiện xóa dữ liệu test với giao diện (trong phần vùng admin: http://localhost/ShopBanHangLaravel/admin), không thao tác xóa dữ liệu trực tiếp trên MySQL!

-    Lấy mật khẩu ứng dụng của tài khoản Google, hướng dẫn cách lấy: https://youtu.be/J4CtP1MBtOE
-   Vào controller SendMailController.php (app/Http/Controllers/SendMailController.php): sửa các giá trị như `mail-của-bạn@gmail.com` hay `mail-thứ-2-của-bạn@gmail.com` hay `tự-tạo-app-password-mới-nhe` thành các giá trị mới như dịa chỉ Gmail của mình, một địa chỉ Gmail khác (mail thứ 2) và mật khẩu ứng dụng Google của mình. (hướng dẫn ở trên)

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Nếu không là thành viên, vui lòng không sao chép đồ án cho đến khi nhóm đã thực hiện báo cáo và nộp sản phẩm. Xin cảm ơn!
