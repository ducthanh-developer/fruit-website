<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/admin', [Dashboard::class, 'index']);

// product route
Route::get('/admin/product', [ProductController::class, 'index'])->name('products');
// insert
Route::get('/admin/product/add', [ProductController::class, 'addView']);
Route::post('/admin/product/add', [ProductController::class, 'addProduct'])->name('add-product');
// edit
Route::get('/admin/product/edit/{id}', [ProductController::class, 'editView']);
Route::put('/admin/product/edit', [ProductController::class, 'editProduct']);
// delete
Route::get('/admin/product/delete/{id}', [ProductController::class, 'deleteProduct']);

Route::get('/admin/category', function () {
    return view('admin/categories/list');
});

Route::get('/admin/login', function () {
    return view('admin/auth/login');
});

Route::get('/admin/register', function () {
    return view('admin/auth/register');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
