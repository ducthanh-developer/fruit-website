<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    //Checkout
    function checkout(){
        return view('client.checkout');
    }
    //Shop-cart
    function shopCart(){
        return view('client.shop-cart');
    }
    //Chi tiet san pham
    function productDetails(){
        return view('client.product_details');
    }
    //Tài khoản
    function account(){
        return view('client.account');
    }
        $featured_products = DB::table('productdetail')->join('products', 'productdetail.idProduct', '=', 'products.idProduct')->where('idTypeProduct', 1)->orderBy('idProductDetail', 'desc')->get();
        $fruit = DB::table('productdetail')->join('products', 'productdetail.idProduct', '=', 'products.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->where('productdetail.idTypeProduct', 2)->where('category.idGroupProduct', 1)->orderBy('productdetail.idProductDetail', 'desc')->take(8)->get();
        $vegetable = DB::table('productdetail')->join('products', 'productdetail.idProduct', '=', 'products.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->where('productdetail.idTypeProduct', 2)->where('category.idGroupProduct', 2)->orderBy('productdetail.idProductDetail', 'desc')->take(8)->get();
        $meat = DB::table('productdetail')->join('products', 'productdetail.idProduct', '=', 'products.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->where('productdetail.idTypeProduct', 2)->where('category.idGroupProduct', 3)->orderBy('productdetail.idProductDetail', 'desc')->take(8)->get();
        $rice = DB::table('productdetail')->join('products', 'productdetail.idProduct', '=', 'products.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->where('productdetail.idTypeProduct', 2)->where('category.idGroupProduct', 4)->orderBy('productdetail.idProductDetail', 'desc')->take(8)->get();
        $butter = DB::table('productdetail')->join('products', 'productdetail.idProduct', '=', 'products.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->where('productdetail.idTypeProduct', 2)->where('category.idGroupProduct', 5)->orderBy('productdetail.idProductDetail', 'desc')->take(8)->get();
        $product1 = DB::table('productdetail')->join('products', 'productdetail.idProduct', '=', 'products.idProduct')->orderBy('idProductDetail', 'desc')->get()->random(6);
        $product2 = DB::table('productdetail')->join('products', 'productdetail.idProduct', '=', 'products.idProduct')->orderBy('idProductDetail', 'desc')->get()->random(6);
        return view('client.index', ['featured_products' => $featured_products, 'fruit' => $fruit, 'vegetable' => $vegetable, 'meat' => $meat, 'rice' => $rice, 'butter' => $butter, 'product1' => $product1, 'product2' => $product2]);
    }
}
