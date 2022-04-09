<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use stdClass;

class CartController extends Controller
{
    public function cartView(Request $request)
    {
        if ($request->session()->exists('cart')) {
            $cart = $request->session()->get('cart');
            $data = ['cart' => $cart, 'total' => 0];
            return view('client.shop-cart', $data);
        }
        return view('client.shop-cart');
    }

    public function addCart(Request $request)
    {
        $product = new stdClass();
        $product->idProduct = $request->input('idProduct');
        $product->nameProduct = $request->input('nameProduct');
        $product->imgUrl = $request->input('imgUrl');
        $product->price = $request->input('price');
        $product->quantity = 1;
        if (!$request->session()->exists('cart')) {
            $request->session()->put('cart', []);
        }
        $cart = $request->session()->get('cart');
        for ($i = 0; $i < sizeof($cart); $i++) {
            if ($cart[$i]->idProduct == $request->input('idProduct')) {
                $product->quantity = $cart[$i]->quantity++;
                $request->session()->push('cart[' . $i . ']', $product);
                return redirect()->back();
            }
        };
        $request->session()->push('cart', $product);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
    }

    public function checkout(Request $request)
    {
        $total = 0;
        if ($request->session()->exists('cart')) {
            $cart = $request->session()->get('cart');
        }
        foreach ($cart as $item) {
            $total += $item->price * $item->quantity;
        }
        $id = DB::table('bill')->insertGetId(['idUser' => Auth::user()->id, 'total' => $total]);
        foreach ($cart as $item) {
            $subtotal = $item->price * $item->quantity;
            DB::table('billdetail')->insert([
                'idBill' => $id, 'idProductDetail' => $item->idProduct,
                'unitPrice' => $item->price, 'quantity' => $item->quantity, 'subtotal' => $subtotal
            ]);
        }
        $request->session()->forget('cart');
        return redirect()->back();
    }
}
