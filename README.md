<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Cách sử dụng:

Cài đặt Composer ; XAMPP (đi chung với phiên bản PHP 8.1 tối thiểu - vì đồ án sử dụng Laravel 10 phải kẹp chung với bản PHP 8.1.x) ; mở terminal tại vị trí thư mục của source và chạy lần lượt 2 câu lệnh sau

-   Cập nhật các gói thư viện Laravel: `composer update`
-   Copy file .env.example thành 1 file khác (.env.example - Copy) và đổi tên file đã paste thành: `.env`. Sau đó, thay đổi các giá trị như tên cơ sở dữ liệu (chạy với MySQL) : dòng 14 tức giá trị `DB_DATABASE`.
-   Tạo key truy cập ứng dụng Laravel: `php artisan key:generate`
-   Khởi động XAMPP (Run as administrator/Global active) và chạy 2 dịch vụ Apache và MySQL
-   Mặc định source chạy ở `127.0.0.1:80`
-   Khởi tạo cơ sở dữ liệu: Tạo 1 db tên `elaravel` trong MySQL (có thể dùng bất kỳ cái tên nào để đặt cho CSDL, miễn tên CSDL trong MySQL trùng với config trong file .env bằng cách thay đổi giá trị `DB_DATABASE`)
-   (Không áp dụng dòng này do không đủ file migration) <del>Sau đó chạy đoạn lệnh `php artisan migrate` để chạy các file seed ra CSDL. Tài liệu Laravel migration DB: <a>https://laravel.com/docs/10.x/migrations</a></del>
-   Vào CSDL: import file SQL đã backup, file này nằm trong thư mục db_backup/elaravel.sql của repository.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
