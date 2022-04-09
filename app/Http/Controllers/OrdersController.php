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
    // public function deleteOrders(){ 
    //         DB::table('bill')->where('id', $idBill)->delete();
    //         return redirect()->route('user.index')->with('alert_success', 'Xóa người dùng thành công.');
    // }

    // edit orders
    public function editOrders(){
        return view('admin.orders.edit');
    }
    // public function deleteOrders($id){
    //     $order = DB::table('bill')::find($id);
    //     if($order==null) return redirect('/admin/orders');
    //     $order->delete();
    //     return redirect('/admin/orders');
    // }

    public function updateOrders(){
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
