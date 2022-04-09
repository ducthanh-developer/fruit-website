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
        $featured_products = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('typeproduct', 'productdetail.idTypeProduct', '=', 'typeproduct.idTypeProduct')->where('productdetail.idTypeProduct', 1)->get();
        $all_product = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->orderBy('productdetail.idProduct', 'desc')->take(12)->get();
        $shirt = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->join('groupproduct', 'category.idGroupProduct', '=', 'groupproduct.idGroupProduct')->where('groupproduct.idGroupProduct', 1)->orderBy('productdetail.idProduct', 'desc')->take(12)->get();
        $trousers = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->join('groupproduct', 'category.idGroupProduct', '=', 'groupproduct.idGroupProduct')->where('groupproduct.idGroupProduct', 2)->orderBy('productdetail.idProduct', 'desc')->take(12)->get();
        $shoes = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->join('groupproduct', 'category.idGroupProduct', '=', 'groupproduct.idGroupProduct')->where('groupproduct.idGroupProduct', 3)->orderBy('productdetail.idProduct', 'desc')->take(12)->get();
        $accessory = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->join('groupproduct', 'category.idGroupProduct', '=', 'groupproduct.idGroupProduct')->where('groupproduct.idGroupProduct', 4)->orderBy('productdetail.idProduct', 'desc')->take(12)->get();
        $clock = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->join('groupproduct', 'category.idGroupProduct', '=', 'groupproduct.idGroupProduct')->where('groupproduct.idGroupProduct', 5)->orderBy('productdetail.idProduct', 'desc')->take(12)->get();
        $short = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->join('groupproduct', 'category.idGroupProduct', '=', 'groupproduct.idGroupProduct')->where('groupproduct.idGroupProduct', 6)->orderBy('productdetail.idProduct', 'desc')->take(12)->get();
        $backpack = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('category', 'products.idCategory', '=', 'category.idCategory')->join('groupproduct', 'category.idGroupProduct', '=', 'groupproduct.idGroupProduct')->where('groupproduct.idGroupProduct', 7)->orderBy('productdetail.idProduct', 'desc')->take(12)->get();
        $product_one = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('typeproduct', 'productdetail.idTypeProduct', '=', 'typeproduct.idTypeProduct')->get()->random(6);
        $product_two = DB::table('products')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->join('typeproduct', 'productdetail.idTypeProduct', '=', 'typeproduct.idTypeProduct')->get()->random(6);
        $data = [
            'featured_products' => $featured_products,
            'product_one' => $product_one,
            'product_two' => $product_two,
            'shirt' => $shirt,
            'trousers' => $trousers,
            'shoes' => $shoes,
            'accessory' => $accessory,
            'clock' => $clock,
            'short' => $short,
            'backpack' => $backpack,
        ];
        return view('client.index', $data);
    }
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
}
