<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
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

Route::get('', [DashboardController::class,'index'])->name('admin.index');

Route::resource('users', UserController::class)->names('admin.users');
Route::resource('categories',CategoryController::class)->names('admin.categories');
Route::resource('products', ProductController::class)->names('admin.products');