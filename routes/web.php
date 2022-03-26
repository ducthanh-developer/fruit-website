<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ordersController;

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

// product route
Route::get('/admin/product', [ProductController::class, 'index']);
// insert
Route::get('/admin/product/add', [ProductController::class, 'addView']);
Route::post('/admin/product/add', [ProductController::class, 'addProduct']);
// edit
Route::get('/admin/product/edit/{id}', [ProductController::class, 'editView']);
Route::put('/admin/product/edit', [ProductController::class, 'editProduct']);
// delete
Route::delete('/admin/product/delete/{id}', [ProductController::class, 'deleteProduct']);

Route::get('/admin/category', function () {
    return view('admin/categories/list');
});

Route::get('/admin/login', function () {
    return view('admin/auth/login');
});

Route::get('/admin/register', function () {
    return view('admin/auth/register');
});

//groupproduct route

//index groupproduct
Route::get('/admin/groupproduct', [GroupProductController::class, 'index']);
//insert
Route::get('/admin/groupproduct/add', [GroupProductController::class, 'addView']);
Route::post('/admin/groupproduct/add', [GroupProductController::class, 'addGroupProduct']);
//delete
Route::get('/deleteGroupProduct/{id}',[GroupProductController::class, 'deleteGroupProduct']);
//edit
Route::get('/updateGroupProduct/{id}', [GroupProductController::class, 'updateView']);
Route::put('/admin/groupproduct/updateGroupProduct', [GroupProductController::class, 'updateGroupProduct']);

//rating route

//index
Route::get('/admin/rating', [RatingController::class, 'index']);

//delete 

Route::get('/deleteRating/{id}',[RatingController::class, 'deleteRating']);

//cmt
Route::get('/admin/comments', [CommentsController::class, 'index']);

Route::get('/admin/orders', [ordersController::class, 'index']);