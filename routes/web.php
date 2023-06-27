<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\Controller;
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


Route::get('/', [HomeController::class, 'home']);  // trang index
Route::get('/trang-chu', [HomeController::class, 'index']);  // trang index
Route::get('/admin_login', [AdminController::class,'login']); // trang login cho admin
Route::get('/admin', [AdminController::class,'show_dashboard']); // trang index admin
Route::post('/admin-dashboard', [AdminController::class,'dashboard']); // trang index admin (yeu cau login truoc)
Route::get('/logout', [AdminController::class,'logout']); // logout admin

// CategoryProduct
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);  // them danh muc san pham
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);  // sửa danh muc san pham
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);  // xoa danh muc san pham
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);  // xem danh muc san pham
Route::get('/inactive-category-product/{category_product_id}', [CategoryProduct::class, 'inactive_category_product']);  // an danh muc
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);  // hien thi danh muc
Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);  // luu danh muc san pham
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);  // cap nhat (phia xu li) danh muc san pham

// BrandProduct
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);  // them danh muc san pham
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);  // sửa danh muc san pham
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);  // xoa danh muc san pham
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);  // xem danh muc san pham
Route::get('/inactive-brand-product/{brand_product_id}', [BrandProduct::class, 'inactive_brand_product']);  // an danh muc
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);  // hien thi danh muc
Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);  // luu danh muc san pham
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);  // cap nhat (phia xu li) danh muc san pham
