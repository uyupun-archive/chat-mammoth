<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchRoomsController extends Controller {

    public function index(Request $request) {
        $room = DB::table('rooms')->select('name', 'room_id', 'description', 'creator')->where('room_id', $request->room_id)->first();

        return view('search', [
            'room' => $room
        ]);
    }
}
