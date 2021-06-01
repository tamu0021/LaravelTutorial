<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        /* ログインユーザを取得する。 */
        $user = Auth::user();

        /* ログインユーザに紐づくフォルダを一つ取得する。 */
        $folder = $user->folders()->first();

        Log::debug('フォルダーの復帰値は');
        Log::debug($folder);

        /* まだ一つもフォルダを作っていなければ、HPにレスポンスする。 */
        if (is_null($folder)) {
            return view('home');
        }

        /* フォルダがあれば、そのフォルダのタスク一覧にリダイレクトする。 */
        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }

}
