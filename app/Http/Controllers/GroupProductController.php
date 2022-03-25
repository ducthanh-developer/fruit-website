<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // render list 
        $groupproductList = DB::table('groupproduct')
            ->get();
        $data = ['groupproductList' => $groupproductList];
        return view('admin/groupproduct/list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addView()
    {
        return view('admin/groupproduct/add');
    }
    public function addGroupProduct(Request $request)
    {
        // insert product
        $nameGroupProduct = $request->input('group-product-name');
        DB::table('groupproduct')->insert(
            ['nameGroupProduct' => $nameGroupProduct]
        );
        return redirect('admin/groupproduct');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateView($id)
    {
        $groupproduct = DB::table('groupproduct')
            ->where('idGroupProduct', $id)
            ->first();
        $data = ['groupproduct' => $groupproduct];
        return view('admin/groupproduct/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateGroupProduct(Request $request)
    {
        $id = $request->input('id');
        $nameGroupProduct = $request->input('group-product-name');
        DB::table('groupproduct')
            ->where('idGroupProduct', $id)
            ->update(['nameGroupProduct' => $nameGroupProduct]); 
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteGroupProduct($id)
    {
        DB::table('groupproduct')->where('idGroupProduct', $id)->delete();
        return redirect()->back();
    }
}
