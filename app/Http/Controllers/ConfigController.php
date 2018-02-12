<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;

class ConfigController extends Controller {

    public function index() {
        return view('config');
    }

    public function update(Request $request) {
        $user = User::where('user_id', Auth::user()->user_id)->first();

        if (isset($request->avatar)) {
            $user->avatar = 'data:image/jpg;base64,' . base64_encode(file_get_contents($request->avatar));
        }
        $user->screen_name = $request->screen_name;

        $isUser_id = DB::table('users')->where('user_id', $request->user_id)->get();
        if (isset($isUser_id) && $request->user_id !== Auth::user()->user_id) {
            return redirect('/config')->with('response', '指定されたユーザIDはすでに使用されています。');
        }
        $user->user_id = $request->user_id;

        if ($request->password_confirm !== $request->password) {
            return redirect('/config')->with('response', 'パスワードが一致しませんでした。');
        }
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect('/config')->with('response', '変更が完了しました。');
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
