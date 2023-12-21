<?php

use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\authController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [HomeController::class, 'index']);
Route::get('/home/cart', [HomeController::class, 'cart']);

Route::get('/home/category',[HomeController::class, 'category']);
Route::get('/home/category1',[HomeController::class, 'category1']);
Route::get('/home/category2',[HomeController::class, 'category2']);
Route::get('/home/category3',[HomeController::class, 'category3']);

Route::get('/home/brand',[HomeController::class, 'brand']);
Route::get('/home/brand1',[HomeController::class, 'brand1']);
Route::get('/home/brand2',[HomeController::class, 'brand2']);
Route::get('/home/brand3',[HomeController::class, 'brand3']);

Route::get('/home/search',[HomeController::class, 'index']);

Route::get('/product/detail/{id}', [HomeController::class, 'detail'])->name('product_detail');

Route::post('/home/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');

Route::get('/home/update_cart/{id}', [HomeController::class, 'update_cart'])->name('update_cart');

Route::get('/cart/delete/{id}',[HomeController::class, "delete_cart"])->name('delete_cart');


Route::get('home/checkout',[OrderController::class, 'checkout']);
Route::get('home/order/{id}/detail',[OrderController::class, 'detail']);
Route::get('home/order/list',[OrderController::class, 'index']);
Route::get('home/order/remove/{id}',[OrderController::class, 'delete']);

Route::get('/home/login',[authController::class, 'login']);
Route::get('/home/register',[authController::class,'register']);
Route::post('/home/loginPost',[authController::class, 'loginPost']);
Route::post('/home/registerPost',[authController::class,'registerPost']);
Route::post('/home/logout',[authController::class, 'logout']);

Route::middleware([
   'isAdmin'
])->group(function () {Route::get('admin/brand',[BrandController::class, "index"]);
    Route::get('admin/brand/add',[BrandController::class, "add"]);
    Route::post('admin/brand/save',[BrandController::class, "save"]);
    Route::get('admin/brand/delete/{id}',[BrandController::class, "delete"]);

    Route::get('/admin/category',[CategoryController::class,"index"]);
    Route::get('/admin/category/add',[CategoryController::class,"add"]);
    Route::post('/admin/category/save',[CategoryController::class,"save"]);
    Route::get('admin/category/delete/{id}', [CategoryController::class, "delete"]);

    Route::get('/admin/product',[ProductController::class,"index"]);
    Route::get('/admin/product/add',[ProductController::class,"add"]);
    Route::get('/admin/product/{id}/edit',[ProductController::class,"edit"]);
    Route::post('/admin/product/save',[ProductController::class,"save"]);
    Route::post('/admin/product/{product}/update',[ProductController::class,"update"]);
    Route::get('admin/product/delete/{id}', [ProductController::class, "delete"]);
    Route::get('admin/product/search',[ProductController::class, "index"]);

    Route::get('/admin/order/{id}/detail',[AdminOrderController::class,"detail"]);
    Route::get('/admin/order/list',[AdminOrderController::class,"index"]);
    Route::post('/admin/order/update/{id}',[AdminOrderController::class,"update"]);

    Route::get('/admin/user',[UserController::class,"index"]);
    Route::post('/admin/user/update/{id}',[UserController::class,"update"]);
});
Route::get('/redirect', [HomeController::class, "redirect"]);
