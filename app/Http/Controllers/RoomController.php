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

        $posts = DB::table('users')
                        ->join('posts', 'users.user_id', '=', 'posts.user_id')
                        ->select('users.user_id', 'users.avatar', 'users.default_avatar', 'users.screen_name', 'posts.comment', 'posts.markdown', 'posts.created_at', 'posts.image', 'posts.gif', 'posts.draw')
                        ->where('posts.room_id', $room_id[1])
                        ->orderBy('posts.id', 'DESC')
                        ->take(100)
                        ->paginate(10);

        $default_avatars = [
            'bear',
            'cat',
            'dog',
            'elephant',
            'hippo',
            'horse',
            'koala',
            'lion',
            'monkey',
            'panda',
            'penguin',
            'pig',
            'rabbit',
            'sheep',
            'squirre',
            'tiger',
        ];

        return view('room', [
            'posts' => $posts,
            'default_avatar' => '/avatar/' . $default_avatars[mt_rand(0, 15)] . '.png'
        ]);
    }

    public function text(Request $request) {
        $room_id = explode('/', $request->room_id);

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
        if (isset(Auth::user()->user_id))   $post->user_id = Auth::user()->user_id;
        if (isset(Auth::user()->screen_name))   $post->screen_name = Auth::user()->screen_name;
        $post->room_id = $room_id[1];

        $request->markdown === 'on' ? $post->markdown = true : $post->markdown = false;
        if ($request->markdown === 'on') {
            $parser = new \cebe\markdown\Markdown();
            $post->comment = $parser->parse($request->comment);
        } else {
            $post->comment = $request->comment;
        }
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }

    public function image(Request $request) {
        $room_id = explode('/', $request->room_id);

        if(!isset($request->image)) {
            return redirect('/room/' . $room_id[1]);
        }

        $post = new Post();
        if (isset(Auth::user()->user_id))   $post->user_id = Auth::user()->user_id;
        if (isset(Auth::user()->screen_name))   $post->screen_name = Auth::user()->screen_name;
        $post->room_id = $room_id[1];
        $post->image = 'data:image/png;base64,' . base64_encode(file_get_contents($request->image));
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }

    public function gif(Request $request) {
        $room_id = explode('/', $request->room_id);

        if(!isset($request->gif)) {
            return redirect('/room/' . $room_id[1]);
        }

        $post = new Post();
        if (isset(Auth::user()->user_id))   $post->user_id = Auth::user()->user_id;
        if (isset(Auth::user()->screen_name))   $post->screen_name = Auth::user()->screen_name;
        $post->room_id = $room_id[1];
        $post->gif = $request->gif;
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }

    public function draw(Request $request) {
        $room_id = explode('/', $request->room_id);

//        if(!isset($request->draw)) {
//            return redirect('/room/' . $room_id[1]);
//        }

        $post = new Post();
        if (isset(Auth::user()->user_id))   $post->user_id = Auth::user()->user_id;
        if (isset(Auth::user()->screen_name))   $post->screen_name = Auth::user()->screen_name;
        $post->room_id = $room_id[1];
        $post->draw = $request->draw;
        $post->save();

        return redirect('/room/' . $room_id[1]);
    }
}