<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $userList = DB::table("users")->get();
        $data = ['userList' => $userList];
        return view("admin/user/list", $data);
    }

    public function add()
    {
        $roleList = DB::table("role")->get();
        $data = ['roleList' => $roleList];
        return view("admin/user/add", $data);
    }

    public function addUser(Request $request)
    {
        $validateRules = [
            'username' => 'required|unique:user,username|min:6',
            'fullName' => 'required|min:6',
            'email' => 'required|email|unique:user,email',
            'address' => 'required',
            'phoneNumber' => 'required|min:10|numeric',
            'dateOfBirth' => 'required',
            'password' => 'required',
            'idRole' => 'required',
        ];
        $validator = Validator::make($request->all(), $validateRules);
        if ($validator->fails()) {
            return redirect()->route("user.add")->withErrors($validator)->withInput();
        }
        $data = [
            'username' => $request->input('username'),
            'fullName' => $request->input('fullName'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phoneNumber' => $request->input('phoneNumber'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'password' => Hash::make($request->password),
            'idRole' => $request->input('idRole'),
        ];

        DB::table('users')->insert($data);
        return redirect()->route('user.add')->with('alert_success', 'Tạo người dùng thành công.');
    }

    public function edit($id)
    {
        $listRole = DB::table('role')->get();
        $user = DB::table("users")->join('role', 'users.idRole', '=', 'role.idRole')->where('users.id', '=', $id)->first();
        $data = ['user' => $user, 'listRole' => $listRole];
        return view("admin/user/edit", $data);
    }

    public function postEdit(Request $request, $id)
    {
        // dd($request->all());
        $user = DB::table('users')->where('id', $id);
        $validateRules = [
            'username' => 'required|min:6',
            'fullName' => 'required|min:6',
            'email' => 'required|email',
            'address' => 'required',
            'phoneNumber' => 'required|min:10|numeric',
            'dateOfBirth' => 'required',
            // 'password' => 'required',
            'idRole' => 'required',
        ];
        $validator = Validator::make($request->all(), $validateRules);
        if ($validator->fails()) {
            return redirect()->route("user.edit", ['id' => $id])->withErrors($validator)->withInput();
        }

        if ($request->has('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        }

        $user->update([
            'username' => $request->input('username'),
            'fullName' => $request->input('fullName'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phoneNumber' => $request->input('phoneNumber'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            // 'password' => Hash::make($request->password),
            'idRole' => $request->input('idRole'),
        ]);
        return redirect()->route('user.edit', ['id' => $id])->with('alert_success', 'Cập nhật người dùng thành công.');
    }

    public function deleteUser($id)
    {

        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('user.index')->with('alert_success', 'Xóa người dùng thành công.');
    }
}
