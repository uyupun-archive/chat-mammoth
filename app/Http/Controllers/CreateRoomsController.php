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
            'publish' => '|required|'
        ]);

        $rooms = new Room;

        if (isset($request->password) && $request->publish === 'private') {
            $rooms->password = bcrypt($request->password);
        }

        $rooms->name = $request->name;
        $rooms->description = $request->description;
        $rooms->publish = $request->publish;
        $rooms->creator = Auth::user()->user_id;
        $rooms->room_id = hash('md5', mt_rand());
        $rooms->save();

        return redirect('/mypage');
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
