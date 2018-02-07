<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchRoomsController extends Controller {

    public function index() {
        return view('search');
    }

    public function search(Request $request) {
        $room = DB::table('rooms')->select('name', 'room_id', 'description', 'creator')->where('room_id', $request->room_id)->first();

        if (isset($room)) {
            return json_encode($room);
        } else {
            return response('404 Not Found', 404);
        }
    }
}
