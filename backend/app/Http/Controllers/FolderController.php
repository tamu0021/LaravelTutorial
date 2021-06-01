<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        /* フォーム画面を返すだけ */
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        /* フォルダモデルのインスタンスを生成する。 */
        $folder = new Folder();
        /* タイトルに入力値を代入する。 */
        $folder->title = $request->title;

        /* ユーザーに紐づけて保存 */
        Auth::user()->folders()->save($folder);

        /* フォルダ作成後、タスク一覧画面への遷移が最も自然と考えている。 */
        return redirect()->route(   'tasks.index', 
                                    [
                                        'id' => $folder->id,
                                    ]
                                );
    }
}
