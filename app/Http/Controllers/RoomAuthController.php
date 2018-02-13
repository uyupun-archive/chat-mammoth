<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Room;

class RoomAuthController extends Controller {

    public function index() {

        $room_id = explode('/', \Request::decodedPath());

        $publish = DB::table('rooms')->select('publish')->where('room_id', $room_id[2])->first();

        if ($publish->publish === 'public') {
            return redirect('/room/' . $room_id[2]);
        }

        return view('room.auth');
    }

    public function auth(Request $request) {

        $room_id = explode('/', $request->path);

        $result = Room::where('room_id', '=', $room_id[2])->where('password', '=', hash('md5', $request->password))->first();

        if (isset($result)) {
            return redirect('/room/' . $room_id[2]);
        } else {
            return redirect('/room/auth/' . $room_id[2])->with('error', 'パスワードが間違っています。');
        }
    }
}