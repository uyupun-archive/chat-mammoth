<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchRoomsController extends Controller {

    public function index() {
        return view('search');
    }

    public function post($room_id) {
        $room = DB::table('rooms')->select('name', 'room_id', 'description', 'creator')->where('room_id', $room_id)->first();

        return json_encode($room);
    }
}
