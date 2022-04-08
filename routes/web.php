<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailsController;
use App\Models\ProductDetail;

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

// Admin route

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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



// Client Route

Route::get('/product-list/{idCate}', [ProductController::class, 'productListView'])->name('product-list');
Route::get('/product-search', [ProductController::class, 'productSearch']);
Route::get('/product-search-price/{low}/{high}', [ProductController::class, 'productSearchPrice']);
// Trang chủ
Route::get('/', [HomeController::class, 'index']);
//Check out
Route::get('/checkout', [HomeController::class, 'checkout']);
//shop-cart
Route::get('/shop-cart', [HomeController::class, 'shopCart']);
//product details
Route::get('/chi-tiet-san-pham/{id}', [ProductDetailsController::class, 'chitiet']);
Route::post('/addComment', [ProductDetailsController::class, 'addComment']);
//Account
Route::get('/tai-khoan', [HomeController::class, 'account']);