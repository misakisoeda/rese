<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    //アプリケーションが処理している現在のHTTPリクエストを操作し、リクエストとともに送信される入力、クッキー、およびファイルを取得するオブジェクト指向の手段を提供
use Illuminate\Support\Facades\DB;  //DBクラスでもクエリビルダでもDBファサードによる記述のためIlluminate\Support\Facades\DBをuseします。
use Illuminate\Support\Facades\Hash;    //保存するユーザーパスワードに対し、安全なBcryptとArgon2ハッシュを提供。登録と認証で自動的にBcrypt使用します。
use Carbon\Carbon;  //DateTimeクラスを継承した日時を扱う

class ShopController extends Controller
{
    public function get(Request $request)
    {
        $items = DB::table('shops')->get();
        return response()->json([
            'message' => 'User got successfully',
            'data' => $items
        ], 200);
    }
}
