<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Hash;
use App\Post;

class RoomController extends Controller {

    public function index() {
        $room_id = explode('/', \Request::decodedPath());

        // 非公開ルームかどうかの検証
        $publish = DB::table('rooms')->select('publish')->where('room_id', $room_id[1])->first();
        if ($publish->publish === 'private') {
            return redirect('/room/' . $room_id[1] . '/auth');
        }

        $posts = DB::table('posts')->select('user_id', 'screen_name', 'comment', 'created_at', 'image', 'gif', 'draw')->where('room_id', $room_id[1])->orderBy('id', 'DESC')->take(100)->paginate(10);

        return view('room.room', [
            'posts' => $posts
        ]);
    }

    public function text(Request $request) {
        $room_id = explode('/', $request->room_id);

        $user_id = isset(Auth::user()->user_id) ? Auth::user()->user_id : 'anonymous';
        $screen_name = isset(Auth::user()->screen_name) ? Auth::user()->screen_name : 'Anonymous';

        if(!isset($request->comment)) {
            return redirect('/room/' . $room_id[1]);
        }

        $validator = Validator::make($request->all(), [
            'room_id' => [
                'required',
                'string',
                'max: 1000'
            ]
        ]);

        if ($validator->fails()) {
            return redirect('/room/' . $room_id[1])->withInput()->withErrors($validator);
        }

        $post = new Post();
        $post->user_id = $user_id;
        $post->screen_name = $screen_name;
        $post->room_id = $room_id[1];
        $post->comment = $request->comment;
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }

    public function image(Request $request) {
        $room_id = explode('/', $request->room_id);

        $user_id = isset(Auth::user()->user_id) ? Auth::user()->user_id : 'anonymous';
        $screen_name = isset(Auth::user()->screen_name) ? Auth::user()->screen_name : 'Anonymous';

        if(!isset($request->image)) {
            return redirect('/room/' . $room_id[1]);
        }

        $post = new Post();
        $post->user_id = $user_id;
        $post->screen_name = $screen_name;
        $post->room_id = $room_id[1];
        $post->image = base64_encode(file_get_contents($request->image));
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }

    public function gif(Request $request) {
        $room_id = explode('/', $request->room_id);

        $user_id = isset(Auth::user()->user_id) ? Auth::user()->user_id : 'anonymous';
        $screen_name = isset(Auth::user()->screen_name) ? Auth::user()->screen_name : 'Anonymous';

        if(!isset($request->gif)) {
            return redirect('/room/' . $room_id[1]);
        }

        $post = new Post();
        $post->user_id = $user_id;
        $post->screen_name = $screen_name;
        $post->room_id = $room_id[1];
        $post->gif = $request->gif;
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }

    public function draw(Request $request) {
        $room_id = explode('/', $request->room_id);

        $user_id = isset(Auth::user()->user_id) ? Auth::user()->user_id : 'anonymous';
        $screen_name = isset(Auth::user()->screen_name) ? Auth::user()->screen_name : 'Anonymous';

//        if(!isset($request->draw)) {
//            return redirect('/room/' . $room_id[1]);
//        }

        $post = new Post();
        $post->user_id = $user_id;
        $post->screen_name = $screen_name;
        $post->room_id = $room_id[1];
        $post->draw = $request->draw;
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }

//    TODO: 実装する
//    public function auth(Request $request) {
//        $room_id = explode('/', \Request::decodedPath());
//        $password = DB::table('rooms')->select('password')->where('room_id', $room_id[1])->first();
//
//        if (Hash::check($request->password, $password->password)) {
//            return redirect('/room/' . $room_id[1]);
//        }
//
//        return view('room.auth');
//    }
}