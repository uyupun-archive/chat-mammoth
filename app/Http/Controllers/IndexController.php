<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index() {
        return view('index');
    }

    public function get() {
        $rooms = DB::table('rooms')
                        ->select('name', 'description', 'room_id', 'creator', 'favorite', 'tags', 'favorite')
                        ->where('publish', 'public')
                        ->orderBy('id', 'DESC')
                        ->take(10)
                        ->get();

        return json_encode($rooms);
    }
}