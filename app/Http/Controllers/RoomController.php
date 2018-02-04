<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Room;

class RoomController extends Controller {

    public function index(Request $request) {
        $room = DB::table('rooms')->select('name', 'description', 'creator', 'room_id')->where('room_id', $request->room_id)->first();

        return view('room', [
            'room' => $room
        ]);
    }
}