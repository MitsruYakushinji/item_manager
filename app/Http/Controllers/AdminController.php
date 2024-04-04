<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 管理者一覧表示ページ
    public function index(){
        // admin.blade.phpを返却
        return view("admin.admins");
    }

    // 管理者編集ページ
    public function showEdit($id)
    {
        return view('admin/edit',['id'=> $id]);
    }

    // 管理者登録ページ
    public function showAdd()
    {
        return view('admin.add');
    }

    // 管理者登録実行
    public function add(Request $request)
    {
        dd($request->all());
    }
}
