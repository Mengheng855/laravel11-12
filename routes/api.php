<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return response()->json([
        'msg'=>"hello"
    ]);
});
Route::controller(UserController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login','login');
    Route::get('/user','getUser');
});
Route::middleware(['auth:sanctum','admin'])->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/user','getUser');
    });
});