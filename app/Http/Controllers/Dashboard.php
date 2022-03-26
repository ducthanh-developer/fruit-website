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

    public function index(){
        $productRecord = DB::table('products')->count();
        $data = ['products' => $productRecord];
        return view('admin/index', $data);
    }
}

