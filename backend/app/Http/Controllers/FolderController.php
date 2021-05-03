<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;
use App\Models\Folder;

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
        /* インスタンスの状態をデータベースに保存する。 */
        $folder->save();

        /* フォルダ作成後、タスク一覧画面への遷移が最も自然と考えている。 */
        return redirect()->route(   'tasks.index', 
                                    [
                                        'id' => $folder->id,
                                    ]
                                );
    }
}
