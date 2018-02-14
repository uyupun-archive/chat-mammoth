<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BotController extends Controller {
    public function bot(Request $request) {

        $post = new Post();
        $post->room_id = $request->room_id;
        $post->user_id = $request->user_id;
        $post->screen_name = $request->screen_name;
        $post->comment = $request->comment;
        $post->markdown = $request->markdown;
        $post->save();
    }
}
