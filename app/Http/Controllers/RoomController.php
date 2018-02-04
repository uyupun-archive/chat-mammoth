<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;

class RoomController extends Controller {

    public function index() {
        return view('room');
    }

    public function store(Request $request) {
        $room_id = explode('/', $request->room_id);

        $post = new Post();
        $post->user_id = Auth::user()->user_id;
        $post->screen_name = Auth::user()->screen_name;
        $post->room_id = $room_id[1];
        $post->comment = $request->comment;
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }
}