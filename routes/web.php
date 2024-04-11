<?php

use App\Http\Controllers\AdminController; // 課題:追記
use App\Http\Controllers\ItemController; // 追記
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * 商品一覧ページ
 * GETリクエストのルーティング
 * ItemControllerクラスのindex()を実行
 */
Route::get('/item', [ItemController::class, 'index']); // 追記

/**
 * 商品編集ページ
 * GETリクエスト
 * ItemControllerクラスのshowEdit()を実行
 * {id}のようにパスパラメータを受け取る設定
 */
Route::get('item/edit/{id}', [ItemController::class, 'showEdit']);

/**
 * 商品編集実行
 * POSTリクエスト
 * ItemControllerクラスのedit()を実行
 * パスパラメータは上に同じ
 */
Route::post('item/edit/{id}', [ItemController::class, 'edit']);

/**
 * 商品登録ページ
 * GETリクエスト
 * ItemControllerクラスのshowAdd()を実行
 */
Route::get('item/add', [ItemController::class, 'showAdd']);

/**
 * 商品登録実行
 * POSTリクエスト
 * ItemControllerクラスのadd()を実行
 */
Route::post('item/add', [ItemController::class, 'add']);

/**
 * 商品削除
 * POSTリクエスト
 * ItemControllerクラスのdelete()を実行
 */
Route::post('item/delete/{id}', [ItemController::class, 'delete']);

/************************************************************************************/

/**
 * 管理者一覧ページ
 * GETリクエスト
 * AdminControllerクラスのindex()を実行
 */
Route::get('/admins', [AdminController::class,'index']);

/**
 * 管理者編集ページ
 * GETリクエスト
 * AdminControllerクラスのshowEdit()を実行
 */
Route::get('admin/edit/{id}', [AdminController::class, 'showEdit']);

/**
 * 管理者編集実行
 * POSTリクエスト
 * AdminControllerクラスのedit()を実行
 */
Route::post('admin/edit/{id}', [AdminController::class, 'edit']);

/**
 * 管理者登録ページ
 * GETリクエスト
 * AdminControllerクラスのshowAdd()を実行
 */
Route::get('admin/add', [AdminController::class, 'showAdd']);

/**
 * 管理者登録実行
 * POSTリクエスト
 * AdminControllerクラスのadd()を実行
 */
Route::post('admin/add', [AdminController::class, 'add']);

/**
 * 管理者削除
 * POSTリクエスト
 * AdminControllerクラスのdelete()を実行
 */
Route::post('admin/delete/{id}', [AdminController::class, 'delete']);
