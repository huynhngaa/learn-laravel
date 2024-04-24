<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
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
    return view('welcome');
});

// Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin.login');

Route::group(['prefix'=> 'admin'],function(){
    Route::group(['middleware'=> 'admin.guest'],function(){
        Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin.login');
    });
});
Route::get('/admin',[HomeController::class,'index'])->name('admin.dashboard');
// Route::get('/login'.[UserController::class,'login'])->name('login');