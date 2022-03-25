<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryList = DB::table("category")->select('*')->join('groupproduct', 'category.idGroupProduct', '=', 'groupproduct.idGroupProduct')->orderBy('idCategory', 'desc')->get();
        $data = ['categoryList' => $categoryList];
        return view("admin/categories/list", $data);
    }

    public function add()
    {
        $listGroupProduct = DB::table('groupproduct')->get();
        $data = ['listGroupProduct' => $listGroupProduct];
        return view("admin/categories/add", $data);
    }

    public function addCategory(Request $request)
    {
        $validateRules = [
            'nameCategory' => 'required',
            'idGroupProduct' => 'required',
        ];
        $validator = Validator::make($request->all(), $validateRules);
        if ($validator->fails()) {
            return redirect()->route("category.add")->withErrors($validator)->withInput();
        }
        $data = [
            'nameCategory' => $request->input('nameCategory'),
            'idGroupProduct' => $request->input('idGroupProduct'),
        ];

        DB::table('category')->insert($data);
        return redirect()->route('category.add')->with('alert_success', 'Tạo loại sản phẩm thành công.');
    }

    public function edit($id)
    {
        $listGroupProduct = DB::table('groupproduct')->get();
        $category = DB::table("category")->join('groupproduct', 'category.idGroupProduct', '=', 'groupproduct.idGroupProduct')->where('category.idCategory', '=', $id)->first();
        $data = ['category' => $category, 'listGroupProduct' => $listGroupProduct];
        return view("admin/categories/edit", $data);
    }

    public function postEdit(Request $request, $id)
    {
        $validateRules = [
            'nameCategory' => 'required',
            'idGroupProduct' => 'required',
        ];
        $validator = Validator::make($request->all(), $validateRules);
        if ($validator->fails()) {
            return redirect()->route("category.edit", ['id' => $id])->withErrors($validator)->withInput();
        }
        $data = [
            'nameCategory' => $request->input('nameCategory'),
            'idGroupProduct' => $request->input('idGroupProduct'),
        ];
        $category = DB::table('category')->where('idCategory', $id);
        $category->update([
            'nameCategory' => $request->input('nameCategory'),
            'idGroupProduct' => $request->input('idGroupProduct'),
        ]);
        return redirect()->route('category.edit', ['id' => $id])->with('alert_success', 'Cập nhật loại sản phẩm thành công.');

    }

    public function deleteCategory($id) {
        DB::table('category')->where('idCategory', $id)->delete();
        return redirect()->route('category.index')->with('alert_success', 'Xóa loại sản phẩm thành công.');
    }

}
