<?php
namespace App\Http\Controllers;

class ItemController extends Controller
{
    //商品一覧ページの表示
    public function index()
    {
        // index.blade.php を返却
        return view("item.index");
    }
}
