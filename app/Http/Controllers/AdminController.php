<?php
namespace App\Http\Controllers;

class AdminController extends Controller
{
    // 管理者一覧表示ページ
    public function index(){
        // admin.blade.phpを返却
        return view("admin.admins");
    }
}
