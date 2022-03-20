<?php

use App\Http\Controllers\ProductController;
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

Route::get('/admin', function () {
    return view('admin/index');
});

Route::get('/admin/product', [ProductController::class, 'index']);
Route::get('/admin/product/add', function () {
    return view('admin/products/add');
});
Route::get('/admin/product/edit', function () {
    return view('admin/products/edit');
});

Route::get('/admin/category', function () {
    return view('admin/categories/list');
});

Route::get('/admin/login', function () {
    return view('admin/auth/login');
});

Route::get('/admin/register', function () {
    return view('admin/auth/register');
});
