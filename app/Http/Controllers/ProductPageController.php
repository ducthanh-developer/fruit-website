<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function getProductsByCategory($idCate)
    {
        return Product::where('idCategory', '=', $idCate)->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->paginate(5);
    }

    public function productListView($idCate, Request $request)
    {
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 4:
                    $productList = Product::where('idCategory', '=', $idCate)->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->orderBy('price', 'asc')->paginate(5);
                    break;
                case 5:
                    $productList = Product::where('idCategory', '=', $idCate)->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->orderBy('price', 'desc')->paginate(5);
                    break;
                default:
                    break;
            }
            $data = ['productList' => $productList];
        } else {
            $data = ['productList' => $this->getProductsByCategory($idCate)];
        }
        return view('/client/products-list', $data);
    }

    public function productSearch(Request $request)
    {
        $name = $request->input('search');
        $productList =  Product::where('nameProduct', 'like', '%' . $name . '%')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->paginate(5);
        $data = ['productList' => $productList];
        return view('/client/products-list', $data);
    }

    public function productSearchPrice($low, $high)
    {
        $productList =  Product::join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->where('price', '<', $high, 'and', 'price', '>', $low)->paginate(5);
        $data = ['productList' => $productList];
        return view('/client/products-list', $data);
    }
}
