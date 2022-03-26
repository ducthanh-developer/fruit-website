<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupProductController;
use App\Http\Controllers\RatingController;

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
Route::put('/admin/product/edit/{id}', [ProductController::class, 'editProduct']);
// delete
Route::delete('/admin/product/delete/{id}', [ProductController::class, 'deleteProduct']);

// Route::get('/admin/category', function () {
//     return view('admin/categories/list');
// });

// List category
Route::get('/admin/category', [CategoryController::class, 'index'])->name('category.index');
// view add category
Route::get('/admin/category/add', [CategoryController::class, 'add'])->name("category.add");
// add category
Route::post('/admin/category/add', [CategoryController::class, 'addCategory']);
// view edit
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name("category.edit");
// update category
Route::put('/admin/category/edit/{id}', [CategoryController::class, 'postEdit']);
// delete category
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');

// List user
Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
// view add user
Route::get('/admin/user/add', [UserController::class, 'add'])->name("user.add");
// add user
Route::post('/admin/user/add', [UserController::class, 'addUser']);
// view edit
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name("user.edit");
// update user
Route::put('/admin/user/edit/{id}', [UserController::class, 'postEdit']);
// delete user
Route::get('/admin/user/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');


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