<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* 認証を求めるミドルウェア使用 */
Route::group(['middleware' => 'auth'], function() {
    /* アクセス時にホーム画面を返す */
    Route::get('/', 'HomeController@index')->name('home');
    /* タスク一覧を表示する */
    Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

    /* タスクを格納するフォルダを作成する */
    /* 作成ページの表示 */
    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    /* フォルダ作成処理実行 */
    Route::post('/folders/create', 'FolderController@create');

    /* タスクを作成する */
    /* タスク作成ページの表示 */
    Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    /* タスク作成処理実行 */
    Route::post('/folders/{id}/tasks/create', 'TaskController@create');

    /* タスクを編集する */
    /* タスク編集ページを表示 */
    Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    /* タスク編集処理実行 */
    Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');


});

/* 会員登録/ログアウト/ログイン/パスワード再設定の各機能で必要なルーティング設定を定義するメソッドを呼び出す。 */
Auth::routes();