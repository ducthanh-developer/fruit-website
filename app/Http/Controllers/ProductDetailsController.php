<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class ProductDetailsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function chitiet($id)
    {
        $data = DB::table('products')
        ->select('*')
        ->join('productdetail', 'products.idProduct', '=', 'productdetail.idProduct')
        ->join("category",'category.idCategory','=', 'products.idCategory')
        ->where('products.idProduct','=',$id)
        ->first();
        $loadComment = DB::table('comment')
        ->select('*')
        ->where('idProduct','=',$id)
        ->get();
        if($loadComment != false){
        $data->commentProduct = $loadComment;
        }

        return view('client/product_details',compact('data'));
    }
    public function addComment(){
        
        DB::table('comment')
        ->insert(
            array(
                'idProduct' => $_POST['idProduct'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'content' => $_POST['content'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' =>  date('Y-m-d H:i:s')
            )
            );
    }
}
