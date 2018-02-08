<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Auth;

class CreateRoomsController extends Controller {

    public function index() {
        return view('/create');
    }

    public function store(Request $request) {
        $rooms = new Room;
        $rooms->name = $request->name;
        $rooms->description = $request->description;
        $rooms->publish = $request->publish;
        $rooms->creator = Auth::user()->user_id;
        $rooms->room_id = hash('adler32', mt_rand());

        if (isset($request->password) && $request->publish === 'private') {
            $rooms->password = bcrypt($request->password);
        }

        $rooms->save();

        return redirect('/');
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
