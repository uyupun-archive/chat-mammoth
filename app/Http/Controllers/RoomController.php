<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Room;

class RoomController extends Controller {

    public function index(Room $rooms) {
        DB::table('rooms')->where('room_id', $rooms->room_id)->get();

        return view('room', [
            'rooms' => $rooms
        ]);
    }
}