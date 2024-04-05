<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // 商品一覧ページの表示
    public function index()
    {
        // Itemクラスを介してitemsテーブルのデータを全件取得(allはModelにもともと用意されているメソッド)
        $items = Item::all();

        // 画面で利用する変数として$itemsを連想配列で index.blade.php に渡す。
        return view("item.index", ['items' => $items]);
    }

    // 商品編集ページ
    /**
     * ※パスパラメータを利用するための引数を忘れない
     */
    public function showEdit($id)
    {
        // view/item/edit.blade.phpに渡ってきた「id」を渡しながら返却
        // '画面で利用する変数名' => 渡したい値
        return view('item.edit', ['id'=> $id]);
    }

    // 商品登録ページ
    public function showAdd()
    {
        // view/item/add.blade.phpを返却
        return view('item.add');
    }

    // 商品登録実行
    public function add(Request $request)
    {
        // フォームに入力した(すべての)値の確認
        dd($request->all());

        // パラメータを個別に参照する場合は以下のように記述
        // $request->name
        // $request->price
        // それぞれ name属性 を指定
    }
}
