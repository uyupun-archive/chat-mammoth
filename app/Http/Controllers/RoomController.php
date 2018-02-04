<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;

class RoomController extends Controller {

    public function index(Request $request) {
        $room = DB::table('rooms')->select('name', 'description', 'creator', 'room_id')->where('room_id', $request->room_id)->first();

        return view('room', [
            'room' => $room
        ]);
    }

    public function store(Request $request) {
        $post = new Post();
        $post->user_id = Auth::user()->user_id;
        $post->screen_name = Auth::user()->screen_name;
        $post->room_id = $request->room_id;
        $post->comment = $request->comment;
        $post->save();

        return redirect('/');
    }
}