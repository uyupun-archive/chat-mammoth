<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index() {
        $rooms = DB::table('rooms')->select('name', 'description', 'room_id')->orderBy('id', 'DESC')->take(10)->get();

        return view('index', [
            'rooms' => $rooms
        ]);
    }
}
