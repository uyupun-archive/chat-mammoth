<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BotController extends Controller {
    public function postComment(Request $request) {

        $post = new Post();
        $post->room_id = $request->room_id;
        $post->user_id = $request->user_id;
        $post->screen_name = $request->screen_name;
        $post->comment = $request->comment;
        $post->markdown = $request->markdown;
        $post->save();
    }

    public function getWord() {
        $word = file_get_contents('http://ja.wikipedia.org/w/api.php?format=json&action=query&list=random&rnlimit=1&rnnamespace=0');

        return $word;
    }
}
