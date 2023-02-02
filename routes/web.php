<?php

use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('admin.master.master');
// });
Route::get('/admin-login',[AuthController::class,'login'])->name('login');
Route::post('/admin-login-confirm',[AuthController::class,'login_confirm'])->name('login_confirm');
Route::group(['prefix' => 'app', 'middleware' => 'admin'], function () {
// logout
    Route::get('/admin-logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'home'])->name('dashboard');
// category
    Route::resource('/category-management', CategoryController::class);
    Route::get('/category-data', [CategoryController::class, 'data'])->name('category-data');
// Sub Category
    Route::resource('/sub-category', SubCatController::class);
    Route::get('/sub-category-data', [SubCatController::class, 'data'])->name('sub-category-data');
// Coupon Management
    Route::resource('/coupon-management', CouponController::class);
    Route::get('/coupon-data', [CouponController::class, 'data'])->name('coupon-data');
    Route::post('/coupon-data-status', [CouponController::class, 'status'])->name('coupon-data-status');
// Product
    Route::resource('/product-management', ProductController::class);
    Route::post('/product-status', [ProductController::class, 'status'])->name('product-status');
    Route::post('/product-choice-status', [ProductController::class, 'choice_status'])->name('product-choice-status');
    Route::post('/product-condition-status', [ProductController::class, 'condition_status'])->name('product-condition-status');
    Route::get('/get-child-category/{id}', [ProductController::class, 'getChildCategory'])->name('getChildCategory');
    Route::get('/edit-get-child-category/{id}', [ProductController::class, 'getChildCategoryEdit'])->name('getChildCategoryEdit');
    Route::get('/product-attributes/{slug}', [ProductController::class, 'attributes'])->name('product-attributes');
// Product Attribute
    Route::resource('/attribute-management', AttributeController::class);
    Route::post('/multiple-images', [AttributeController::class, 'multipleImage'])->name('multipleImage');
    Route::get('/multiple-images-delete/{id}', [AttributeController::class, 'multipleImageDelete'])->name('multipleImageDelete');
// Banner
    Route::resource('/banner-management', BannerController::class);
    Route::post('/banner-status', [BannerController::class, 'status'])->name('banner-status');

});
