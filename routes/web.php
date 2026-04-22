<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('user.index');
});
Route::controller(UserController::class)->group(function(){
    Route::get('/register','register');
    Route::get('/login','login');
    Route::post('/add-User','addUser')->name('register');
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/product', function () {
    return view('admin.product');
});

Route::get('/admin/product/add', function () {
    return view('admin.addProduct');
});

Route::get('/admin/product/edit', function () {
    return view('admin.editProduct');
});

Route::get('/admin/category', function () {
    return view('admin.category');
});

Route::get('/admin/category/add', function () {
    return view('admin.addCategory');
});

Route::get('/admin/category/edit', function () {
    return view('admin.editCategory');
});

Route::get('/admin/user', function () {
    return view('admin.user');
});
