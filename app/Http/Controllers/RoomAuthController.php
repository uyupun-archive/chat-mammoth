<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RoomAuthController extends Controller {

    public function index() {

        $room_id = explode('/', \Request::decodedPath());

        $publish = DB::table('rooms')->select('publish')->where('room_id', $room_id[2])->first();

        if ($publish->publish === 'public') {
            return redirect('/room/' . $room_id[2]);
        }

        return view('room.auth');
    }
}