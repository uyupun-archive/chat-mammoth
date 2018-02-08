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

        $room = DB::table('rooms')->select('name', 'room_id', 'description', 'creator', 'publish')->where('room_id', $request->room_id)->first();

        if (!isset($room)) {
            return response('404 Not Found', 404);
        }

        $validator = Validator::make($request->all(), [
            'room_id' => [
                'required',
                'string',
                'regex: /^[0-9a-z]{8}$/'
            ]
        ]);

        if ($validator->fails()) {
            return redirect('/search')->withInput()->withErrors($validator);
        }

        return json_encode($room);
    }
}
