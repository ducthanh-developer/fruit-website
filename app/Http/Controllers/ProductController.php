<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $productList = DB::table('products')
            ->select('*')
            ->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')
            ->get();
        $data = ['productList' => $productList];
        return view('admin/products/list', $data);
    }
}
