<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productRecord = DB::table('products')->count();
        $orderRecord = DB::table('bill')
            ->where('date', 'like', date('Y') . '-' . date('m') . '%')
            ->count();
        $userRecord = DB::table('users')->count();
        $revenue = DB::table('bill')
            ->join('billdetail as detail', 'detail.idBill', '=', 'bill.idBill')
            ->where('bill.date', 'like', date('Y') . '-' . date('m') . '%')
            ->sum('detail.subtotal');
        $data = ['products' => $productRecord, 'orders' => $orderRecord, 'users' => $userRecord, 'revenue' => $revenue];
        return view('admin/index', $data);
    }
}
