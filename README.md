<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# ĐỒ ÁN CUỐI KỲ THƯƠNG MẠI ĐIỆN TỬ - NEKO

Nhóm tác giả: <i>Hoàng Tùng - Trịnh Thành - Anh Quân - Quốc Đạt</i>

## Cách chạy môi trường test:

Trước hết, cài đặt Composer (https://getcomposer.org/) ; XAMPP (đi chung với phiên bản PHP 8.1 tối thiểu - vì đồ án sử dụng Laravel 10 phải kẹp chung với bản PHP 8.1.x)

-   Khởi động XAMPP Control Panel (Run as administrator): chạy 2 dịch vụ: Apache và MySQL
-   Git clone source về đúng thư mục C:\xampp\htdocs\ (thư mục chứa source của XAMPP)
-   Mở terminal tại vị trí thư mục của source (C:\xampp\htdocs\ShopBanHangLaravel) và chạy lần lượt các câu lệnh sau:
-   Thứ nhất: Cập nhật các gói thư viện Laravel: `composer update`
-   Quay lại, copy file .env.example và paste thành 1 file khác (.env.example - Copy) và đổi tên file đã paste thành: `.env`. Sau đó, thay đổi các giá trị ở tên cơ sở dữ liệu : dòng 14 tức sửa thành `DB_DATABASE=ecommercelaravel`. (khi đổi giống vậy thì source sẽ nhận cơ sở dữ liệu có tên là ecommercelaravel)
-   Quay lại terminal: Tạo key truy cập ứng dụng Laravel: `php artisan key:generate`
-   Mặc định source chạy ở `127.0.0.1:80/ShopBanHangLaravel`
-   Khởi tạo cơ sở dữ liệu: Vào MySQL (`127.0.0.1:80/PHPMyAdmin`) --> Tạo 1 CSDL tên `ecommercelaravel` trong MySQL (có thể dùng bất kỳ cái tên nào để đặt cho CSDL, miễn tên CSDL trong MySQL trùng với config trong file .env khi nãy mới thay đổi giá trị `DB_DATABASE`)
-   Vào MySQL (`127.0.0.1:80/PHPMyAdmin`): import file "ecommercelaravel_LASTGOOD_Dec20.sql" đã backup, file này nằm trong thư mục db_backup/ecommercelaravel_LASTGOOD_Dec20.sql của source.
-   Lưu ý: chỉ thực hiện xóa dữ liệu test với giao diện, không thao tác xóa trực tiếp trên MySQL!

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Nếu không là thành viên, vui lòng không sao chép đồ án cho đến khi nhóm đã thực hiện báo cáo và nộp sản phẩm. Xin cảm ơn!
