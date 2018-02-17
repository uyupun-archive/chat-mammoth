<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class SearchRoomsController extends Controller {

    public function index() {
        return view('search');
    }

    public function search(Request $request) {

        $room_id = preg_replace('/( |　)/', '', $request->room_id);

        $room = DB::table('rooms')
                    ->select('name', 'room_id', 'description', 'creator', 'publish', 'tags')
                    ->where('room_id', $room_id)
                    ->first();

        if (!isset($room)) {
            return response('404 Not Found', 404);
        }

        $validator = Validator::make($request->all(), [
            'room_id' => [
                'required',
                'string',
            ]
        ]);

        if ($validator->fails()) {
            return redirect('/search')->withInput()->withErrors($validator);
        }

        return json_encode($room);
    }
}
