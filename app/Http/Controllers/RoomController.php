<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;

class RoomController extends Controller {

    public function index() {
        $room_id = explode('/', \Request::decodedPath());

        $posts = DB::table('posts')->select('user_id', 'screen_name', 'comment', 'created_at')->where('room_id', $room_id[1])->orderBy('id', 'DESC')->take(100)->paginate(10);

        return view('room', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) {
        $room_id = explode('/', $request->room_id);

        $user_id = isset(Auth::user()->user_id) ? Auth::user()->user_id : 'Anonymous';
        $screen_name = isset(Auth::user()->screen_name) ? Auth::user()->screen_name : 'Anonymous';

        $post = new Post();
        $post->user_id = $user_id;
        $post->screen_name = $screen_name;
        $post->room_id = $room_id[1];
        $post->comment = $request->comment;
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }
}