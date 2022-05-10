<?php

use App\Http\Controllers\Auth\ConnectController;
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

Route::get('/', function () {
    return view('welcome');
});


//Router Auth
Route::get('login',[ConnectController::class,'getLogin'])->name('auth.login');
Route::post('authenticate',[ConnectController::class,'authenticate'])->name('auth.authenticate');
Route::get('logout',[ConnectController::class,'getLogout'])->name('auth.logout');

//Router Register
Route::get('register',[ConnectController::class,'getRegister'])->name('auth.register');
Route::post('store',[ConnectController::class,'postRegister'])->name('auth.store');