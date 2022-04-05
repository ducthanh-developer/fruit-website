<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // render list
        $data = ['productList' => $this->getProducts()];
        return view('admin/products/list', $data);
    }

    // client

    public function getProducts()
    {
        return DB::table('products')
            ->select('*')
            ->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')
            ->get();
    }
    public function getProductsByCategory($idCate)
    {
        return Product::where('idCategory', '=', $idCate)->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->paginate(5);
    }

    public function productListView($idCate, Request $request)
    {

        $data = ['productList' => $this->getProductsByCategory($idCate)];
        return view('/client/products-list', $data);
    }

    public function productSearch(Request $request)
    {
        $name = $request->input('search');
        $productList =  Product::where('nameProduct', 'like', '%'.$name.'%')->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->paginate(5);
        $data = ['productList' => $productList];
        return view('/client/products-list', $data);
    }

    public function productSearchPrice($low, $high){
        $productList =  Product::join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')->where('price', '<', $high, 'and', 'price', '>', $low)->paginate(5);
        $data = ['productList' => $productList];
        return view('/client/products-list', $data);
    }

    // admin

    public function addView()
    {
        $listCate = DB::table('category')->get();
        $data = ['categories' => $listCate];
        return view('admin/products/add', $data);
    }

    function uploadImage($request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = date('YmdHi') . $image->getClientOriginalName();
            $image->move('images', $imagename);
            return $imagename;
        }
    }

    public function addProduct(Request $request)
    {
        // insert product
        $nameProduct = $request->input('product-name');
        $description = $request->input('description');
        $idCategory = $request->input('category');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $imgUrl = $this->uploadImage($request);
        $idProduct = DB::table('products')->insertGetId(
            ['nameProduct' => $nameProduct, 'idCategory' => $idCategory, 'description' => $description]
        );
        DB::table('productdetail')->insert(
            ['idProduct' => $idProduct, 'price' => $price, 'quantity' => $quantity, 'imgUrl' => $imgUrl]
        );

        return $this->addView();
    }

    public function editView($id)
    {
        $listCate = DB::table('category')->get();
        $product = DB::table('products')
            ->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')
            ->where('products.idProduct', '=', $id)
            ->first();
        $data = ['categories' => $listCate, 'product' => $product];
        return view('admin/products/edit', $data);
    }

    public function editProduct(Request $request)
    {
        // edit product
        $id = $request->input('id');
        $nameProduct = $request->input('product-name');
        $description = $request->input('description');
        $idCategory = $request->input('category');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $imgUrl = $this->uploadImage($request);
        DB::table('products')
            ->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')
            ->where('products.idProduct', '=', $id)
            ->update(['nameProduct' => $nameProduct, 'idCategory' => $idCategory, 'description' => $description, 'price' => $price, 'quantity' => $quantity, 'imgUrl' => $imgUrl]);

        return $this->editView($id);
    }

    public function deleteProduct($id)
    {
        DB::table('products')
            ->where('idProduct', '=', $id)
            ->delete();
        return $this->index();
    }
}
