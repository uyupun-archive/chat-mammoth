<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MypageController extends Controller {

    public function index() {
        return view('mypage', [
            'screen_name' => Auth::user()->screen_name,
            'user_id' => Auth::user()->user_id,
        ]);
    }

    public function create() {
        $rooms = DB::table('rooms')->select('name', 'room_id', 'description', 'creator', 'publish')->where('creator', Auth::user()->user_id)->orderBy('id', 'DESC')->get();

        return json_encode($rooms);
    }

    public function favorite() {
        $rooms = DB::table('favorites')->join('rooms', 'favorites.room_id', '=', 'rooms.room_id')->select('name', 'favorites.room_id', 'description', 'creator', 'publish')->where('user_id', Auth::user()->user_id)->orderBy('favorites.id', 'DESC')->get();

        return json_encode($rooms);
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
