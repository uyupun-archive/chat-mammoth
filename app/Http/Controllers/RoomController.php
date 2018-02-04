<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;

class RoomController extends Controller {

    public function index() {
        $room_id = explode('/', \Request::decodedPath());

        $posts = DB::table('posts')->select('user_id', 'screen_name', 'comment')->where('room_id', $room_id[1])->orderBy('id', 'DESC')->take(10)->get();

        return view('room', [
            'posts' => $posts
        ]);
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