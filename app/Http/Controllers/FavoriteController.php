<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Favorite;

class FavoriteController extends Controller {

    public function get() {
        $favorited = Favorite::select('room_id')->where('user_id', Auth::user()->user_id)->get();

        return $favorited;
    }

    public function post(Request $request) {

        $room_id = $request->room_id;

        // 匿名ユーザではない場合のみルームのお気に入り処理
        if (Auth::check()) {

            // お気に入り済みかどうか
            $favorited = Favorite::where('room_id', $room_id)->where('user_id', Auth::user()->user_id)->first();

            // お気に入り済みならDBから削除しデクリメント
            if (isset($favorited)) {
                DB::table('rooms')->where('room_id', $room_id)->decrement('favorite');
                DB::table('favorites')->where('user_id', Auth::user()->user_id)->delete();

                return 0;
            }

            // お気に入り済みでないならDBに挿入しインクリメント
            $user_id =  Auth::user()->user_id;

            DB::table('favorites')->insert([
                'user_id' => $user_id,
                'room_id' => $room_id
            ]);

            DB::table('rooms')->where('room_id', $room_id)->increment('favorite');

            return 1;
        }
    }
}
