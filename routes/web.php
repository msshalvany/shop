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
use App\Http\Middleware\changepass;

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
Route::get('/resetassword', [UserController::class, 'resetassword'])->name('resetassword');
Route::post('/sendresetpass', [UserController::class, 'sendresetpass'])->name('sendresetpass');
Route::post('/verifypass', [UserController::class, 'verifypass'])->name('verifypass');
Route::get('/changpass', [UserController::class, 'changpass'])->name('changpass')->middleware(changepass::class);
Route::post('/passwordchang', [UserController::class, 'passwordchang'])->name('passwordchang')->middleware(changepass::class);


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
    Route::delete('/del_product_box{Product}', [productController::class, 'del_product_box'])->name('del_product_box');
});
//---------------------admin---------------------//

//---------------------shop---------------------//
Route::get('/search', [productController::class, 'search'])->name('search');
Route::get('/category{category}', [productController::class, 'category'])->name('category');
Route::get('/bypage/{id}', [bypageController::class, 'index'])->where('id', '[0-9]+')->name('bypage');
Route::put('/byed/{id}', [bypageController::class, 'by'])->where('id', '[0-9]+')->name('byed');
Route::put('/bybox/{id}', [bypageController::class, 'bybox'])->where('id', '[0-9]+')->name('bybox');
Route::put('/by/{id}', [bypageController::class, 'idia'])->where('id', '[0-9]+')->name('setidia');
Route::post('/bypage/add_shop_box', [bypageController::class, 'add_shop_box'])->name('add_shop_box');
Route::post('/del_pro_box', [productController::class, 'del_pro_box'])->name('del_pro_box');
Route::get('/boxall/{id}', [productController::class, 'boxall'])->name('boxall');



//---------------------shop---------------------//
Route::fallback(function () {
    return view('shop.404');
});
