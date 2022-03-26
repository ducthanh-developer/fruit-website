<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // render list 
        $cmtList = DB::table('comment')
            ->get();
        $data = ['comment' => $cmtList];
        return view('admin/comments/list', $data);
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

    public function deleteComments($id)
    {
        DB::table('comment')->where('idComment', $id)->delete();
        return redirect()->back();
    }
}
