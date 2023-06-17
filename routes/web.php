<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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


Route::get('/', [HomeController::class, 'index']);  // trang index
Route::get('/admin_login', [AdminController::class,'login']); // trang login cho admin
Route::get('/admin', [AdminController::class,'show_dashboard']); // trang index admin
Route::post('/admin-dashboard', [AdminController::class,'dashboard']); // trang index admin (yeu cau login truoc)
Route::get('/logout', [AdminController::class,'logout']); // logout admin
// Route::get('/dashboard', [AdminController::class,'index']); 
