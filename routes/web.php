<?php

use App\Http\Controllers\bypageController;
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LoginAdmin;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\productController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\UserController;


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


//---------------------user---------------------//

Route::get('/', [Homecontroller::class, 'index'])->name('home');
Route::post('/LoginUser', [UserController::class, 'login'])->name('LoginUser');
Route::post('/LogoutUser', [UserController::class, 'logout'])->name('logoutUser');
Route::get('/RegesterUser', [UserController::class, 'RegesterUser'])->name('RegesterUser');
Route::post('/StoreUser', [UserController::class, 'store'])->name('StoreUser');
Route::post('/verify', [UserController::class, 'verify'])->name('verifyUser');
Route::any('/get_pro_box', [UserController::class, 'get_pro_box'])->name('get_pro_box');
//---------------------user---------------------//


//---------------------admin---------------------//
Route::get('/admin/login', [HomeAdminController::class, 'index']);
Route::post('/LoginAdmin/login', [HomeAdminController::class, 'login'])->name('loginadmin');
Route::prefix('admin')->middleware(LoginAdmin::class)->group(function () {
    Route::get('/dashbord', [adminController::class, 'dashbord'])->name('dashbord');
    Route::get('/logoutadmin', [adminController::class, 'logout'])->name('logoutadmin');
    Route::resource('dashbord/Product', productController::class);
    Route::resource('dashbord/slider', SliderController::class);
    Route::resource('dashbord/admins', adminController::class);
    Route::get('dashbord/bysdlist', [productController::class, 'byedList'])->name('byedList');
});
//---------------------admin---------------------//

//---------------------shop---------------------//
Route::get('/search', [productController::class, 'search'])->name('search');
Route::get('/category{category}', [productController::class, 'category'])->name('category');
Route::get('/bypage/{id}', [bypageController::class, 'index'])->where('id', '[0-9]+')->name('bypage');
Route::put('/byed/{id}', [bypageController::class, 'by'])->where('id', '[0-9]+')->name('byed');
Route::put('/by/{id}', [bypageController::class, 'idia'])->where('id', '[0-9]+')->name('setidia');
Route::post('/bypage/add_shop_box', [bypageController::class, 'add_shop_box'])->name('add_shop_box');
Route::post('/del_pro_box', [productController::class, 'del_pro_box'])->name('del_pro_box');
//---------------------shop---------------------//
Route::fallback(function () {
    return view('shop.404');
});
