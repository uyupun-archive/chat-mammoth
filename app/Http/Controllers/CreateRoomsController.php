<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Auth;
use Validator;

class CreateRoomsController extends Controller {

    public function index() {
        return view('/create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => '|required|string|min:1|max:32|',
            'description' => '|required|string|min:1|max:512|',
            'tag' => '|string|min:1|max:32|',
            'publish' => '|required|'
        ]);

        if ($validator->fails()) {
            return response('Bad Request', 400);
        }

        $rooms = new Room;
        $rooms->name = $request->name;
        $rooms->description = $request->description;
        $rooms->publish = $request->publish;
        $rooms->creator = Auth::user()->user_id;
        $rooms->room_id = hash('md5', mt_rand());
        if(isset($request->tags))   $rooms->tags = json_encode($request->tags);
        $rooms->save();

        return response('OK', 200)->header('Content-Type', 'application/json');
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
