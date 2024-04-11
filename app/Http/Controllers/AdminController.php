<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    // 管理者一覧表示ページ
    public function index(){
        // Adminクラスのクラスメソッドを呼び出して(継承したModelクラスのall())全件取得
        $admins = Admin::all();
        // 画面で利用する変数「admins」に$adminsを連想配列で格納してadmins.blade.phpに渡す
        return view('admin.admins', ['admins' => $admins]);
    }

    // 管理者編集ページ
    public function showEdit($id)
    {
        $admin = Admin::find($id);
        // idで見つかったadminオブジェクトを画面に返す
        return view('admin/edit',['admin'=> $admin]);
    }

    // 管理者編集登録実行
    public function edit($id, Request $request)
    {
        $admin = Admin::find($id);

        // リクエストで渡ってきたもの(変更箇所)を抽出して保存
        $admin->fill($request->all())->save();

        return redirect('/admins');
    }

    // 管理者登録ページ
    public function showAdd()
    {
        return view('admin.add');
    }

    // 管理者登録実行
    public function add(Request $request)
    {
        // dd($request->all()); デバック用
        $admin = new Admin();

        // 渡ってきたリクエスト($request)からModelの$fillableに設定したプロパティのみを抽出・保存
        if($admin->fill($request->all())->save()){
            Log::info("管理者の登録が正常に行われました", ['admin_id' => $admin->id]);
            return redirect('/admins');
        }
        Log::error("管理者の登録ができませんでした", ['data' => $admin->all()]);
        return redirect('/admins');
    }

    // 管理者削除実行
    public function delete($id)
    {
        $admin = Admin::find($id);

        $admin->delete();

        return redirect('/admins');
    }
}
