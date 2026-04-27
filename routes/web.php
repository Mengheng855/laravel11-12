<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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

Route::controller(UserController::class)->group(function(){
    Route::get('/register','register');
    Route::get('/','user');
    Route::get('/login','login')->name('login');
    Route::post('/add-User','addUser')->name('register');
    Route::post('/checkLogin','checkLogin')->name('checkLogin');
});
Route::prefix('/admin')->group(function(){
    Route::middleware(['auth','admin'])->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('/dashboard','dashboard');
            Route::get('/user','ManageUser');
        });
        Route::controller(ProductController::class)->group(function(){
            Route::get('/product','product');
            Route::get('/product/add','addProduct');
            Route::get('/product/edit','editProduct');
        });
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/category','category');
            Route::get('/category/add','addCategory');
            Route::get('/category/edit','editCategory');
        });
    });
});
