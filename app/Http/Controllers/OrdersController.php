<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // render list 
        $bill = DB::table('users')
            ->join('bill', 'users.id', '=', 'bill.idUser')
            ->join('billdetail', 'bill.idBill', '=', 'billdetail.idBill')
            ->join('productdetail','billdetail.idProductDetail','=','productdetail.idProductDetail')
            ->join('products','productdetail.idProduct' ,'=', 'products.idProduct')
            ->select('users.*', 'bill.*', 'billdetail.*','products.nameProduct')
            ->get();
        $data = ['bill' => $bill];
        return view('admin.orders.list',$data);
    }
    //delete orders
    public function deleteOrders($id){ 
            DB::table('bill')->where('idBill', $id)->delete();
            return redirect()->route('orders')->with('alert_success', 'Xóa người dùng thành công.');
    }

    // edit orders
    public function editOrders($id){
        return view('admin.orders.edit');
    }


    public function updateOrders($id){
        DB::table('bill')->where('idBill','=','$id')
        ->update(['status'=>$_POST['category']]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addView()
    {
        return view('admin/comments/add');
    }
}
