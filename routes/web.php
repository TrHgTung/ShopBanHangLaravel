<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\MoMoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OnePayController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\FacebookAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']);  // trang index
Route::get('/trang-chu', [HomeController::class, 'index']);  // trang index
Route::post('/tim-kiem', [HomeController::class, 'search']);  // trang index
Route::post('/autocomplete/fetch', [HomeController::class, 'autocomplete_ajax'])->name('autocomplete.fetch');  // trang index
Route::get('/admin-login', [AdminController::class,'login']); // trang login cho admin
Route::get('/admin', [AdminController::class,'show_dashboard']); // trang index admin
Route::post('/admin-dashboard', [AdminController::class,'dashboard']); // trang index admin (yeu cau login truoc)
Route::get('/logout', [AdminController::class,'logout']); // logout admin
// Route::get('/static-layout', [StaticPageController::class,'index']); // layout static
Route::get('/khuyen-mai', [HomeController::class,'show_all_promotions']); // show khuyen mai (promotion)

// CategoryProduct (Quan ly danh muc)
Route::get('/admin/add-category-product', [CategoryProduct::class, 'add_category_product']);  // them danh muc san pham
Route::get('/admin/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);  // sửa danh muc san pham
Route::get('/admin/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);  // xoa danh muc san pham
Route::get('/admin/all-category-product', [CategoryProduct::class, 'all_category_product']);  // xem danh muc san pham
Route::get('/admin/inactive-category-product/{category_product_id}', [CategoryProduct::class, 'inactive_category_product']);  // an danh muc
Route::get('/admin/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);  // hien thi danh muc
Route::post('/admin/save-category-product', [CategoryProduct::class, 'save_category_product']);  // luu danh muc san pham
Route::post('/admin/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);  // cap nhat (phia xu li) danh muc san pham

// BrandProduct (quan ly thuong hieu)
Route::get('/admin/add-brand-product', [BrandProduct::class, 'add_brand_product']);  // them danh muc san pham
Route::get('/admin/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);  // sửa danh muc san pham
Route::get('/admin/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);  // xoa danh muc san pham
Route::get('/admin/all-brand-product', [BrandProduct::class, 'all_brand_product']);  // xem danh muc san pham
Route::get('/admin/inactive-brand-product/{brand_product_id}', [BrandProduct::class, 'inactive_brand_product']);  // an danh muc
Route::get('/admin/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);  // hien thi danh muc
Route::post('/admin/save-brand-product', [BrandProduct::class, 'save_brand_product']);  // luu danh muc san pham
Route::post('/admin/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);  // cap nhat (phia xu li) danh muc san pham

// Product (quan ly san pham)
Route::get('/admin/add-product', [ProductController::class, 'add_product']);  // them danh muc san pham
Route::get('/admin/edit-product/{product_id}', [ProductController::class, 'edit_product']);  // sửa danh muc san pham
Route::get('/admin/delete-product/{product_id}', [ProductController::class, 'delete_product']);  // xoa danh muc san pham
Route::get('/admin/all-product', [ProductController::class, 'all_product']);  // xem danh muc san pham
Route::get('/admin/inactive-product/{product_id}', [ProductController::class, 'inactive_product']);  // an danh muc
Route::get('/admin/active-product/{product_id}', [ProductController::class, 'active_product']);  // hien thi danh muc
Route::post('/admin/save-product', [ProductController::class, 'save_product']);  // luu danh muc san pham
Route::post('/admin/update-product/{product_id}', [ProductController::class, 'update_product']);  // cap nhat (phia xu li) danh muc san pham

// Quan ly don dat hang
Route::get('/admin/all-order', [OrderController::class, 'all_order']);  // cap nhat (phia xu li) danh muc san pham

// danh mục sản phẩm
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);  // trang danh mục sp theo id sphẩm
Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class, 'show_brand_home']);  // trang danh mục sp theo id sphẩm
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);  // trang danh mục sp theo id sphẩm

// Cart gio hangf
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);

// Thanh toán
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);

// van chuyen
Route::get('/product/van-chuyen', [StaticPageController::class, 'van_chuyen']);

// MoMo
Route::get('/momo-result', [MoMoController::class, 'momo_payment']);
Route::post('/momo-payment', [MoMoController::class, 'momo_payment']);
Route::get('/momo-quickpay-test', [MoMoController::class, 'momo_quickpay']);

// OnePay
Route::get('/onepay-result', [OnePayController::class, 'onepay_payment']);
Route::post('/onepay-payment', [OnePayController::class, 'onepay_payment']);

// promotion
Route::get('/promotion', [PromotionController::class, 'index']);

// login with facebook
Route::get('/login-with-facebook', [FacebookAuthController::class, 'index']);
Route::post('/fb-auth/login-customer', [FacebookAuthController::class, 'login_customer']);