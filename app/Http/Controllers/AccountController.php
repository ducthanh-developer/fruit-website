<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    public function edit(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);

            if($user)
            {
                return view('client.account.edit');
            }else{
                return redirect()->back();
            }
            return redirect()->back();
        }
    }
    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phoneNumber = $request['phoneNumber'];
            $user->address = $request['address'];
            $user->dateOfBirth = $request['dateOfBirth'];

            $user->save();
        }
        return redirect()->back();
    }
    public function profile(){
        $bill= DB::table('users')
            ->join('bill', 'users.id', '=', 'bill.idUser')
            ->join('billdetail', 'bill.idBill', '=', 'billdetail.idBill')
            ->join('productdetail','billdetail.idProductDetail','=','productdetail.idProductDetail')
            ->join('products','productdetail.idProduct' ,'=', 'products.idProduct')
            ->select('users.*', 'bill.*', 'billdetail.*','products.nameProduct')
            ->get();
        $data = ['bill' => $bill];
        return view('client.account.account',$data);
    }   
    //Delete orders
    // public function deleteOrders(){
    //     DB::table('bill')
    //     ->where
    //     return redirect()->back();
    // }
}
