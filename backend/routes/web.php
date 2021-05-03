<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
