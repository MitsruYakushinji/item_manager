<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        // 商品データを1件取得
        $item = Item::find($id);

        // '画面で利用する変数名' => 渡したい値
        // 画面で利用する変数として$itemを連想配列で渡す
        return view('item.edit', ['item'=> $item]);
    }

    // 商品編集の実行
    public function edit($id, Request $request)
    {
        // 商品データを1件取得
        $item = Item::find($id);

        // リクエストからModelのfillableに設定したプロパティのみ抽出・保存
        $item->fill($request->all())->save();

        // http://localhost/item_manager/public/item にリダイレクト
        return redirect('/item');
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
        // dd();はデバック用
        // dd($request->all());

        // パラメータを個別に参照する場合は以下のように記述
        // $request->name
        // $request->price
        // それぞれ name属性 を指定

        // ここから実装内容
        $item = new Item();

        // リクエストからModelの$fillableに設定したプロパティのみを抽出・保存
        if($item->fill($request->all())->save()){
            // ログの出力
            Log::info('商品の登録が正常に行われました', ['item_id' => $item->id]);
            return redirect('/item');
        }

        Log::error('商品の登録ができませんでした', ['data' => $item->all()]);
        return redirect('/item');
    }

    // 商品削除(物理削除)
    public function delete($id)
    {
        // 商品データを1件取得
        $item = Item::find($id);

        // 削除
        if($item->delete()){
            // ログの出力
            Log::info('商品の削除が正常に行われました', ['item_id' => $item->id]);
            return redirect('/item');
        }

        Log::error('商品の削除ができませんでした', ['data' => $item->all()]);
        return redirect('/item');
    }
}
