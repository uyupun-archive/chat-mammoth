<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use App\User;

class ConfigController extends Controller {

    public function index() {
        return view('config');
    }

    public function update(Request $request) {
        $user = User::where('user_id', Auth::user()->user_id)->first();

        $isUser_id = DB::table('users')->where('user_id', $request->user_id)->first();
        if (isset($isUser_id) && $request->user_id !== Auth::user()->user_id) {
            return redirect('/config')->with('response', '指定されたユーザIDはすでに使用されています。');
        }

        if ($request->password_confirm !== $request->password) {
            return redirect('/config')->with('response', 'パスワードが一致しませんでした。');
        }

        $validator = Validator::make($request->all(), [
            'avatar' => 'image',
            'screen_name' => 'required|string|min:1|max:16',
            'user_id' => 'required|string|regex:/^[a-zA-Z0-9_]+$/|min:1|max:16|',
            'password' => 'required|string|min:8|max:32',
        ]);

        if ($validator->fails()) {
            return redirect('/config')->with('response', '使用不可能な文字列が含まれています。');
        }

        if (isset($request->avatar)) {
            $user->avatar = 'data:image/jpg;base64,' . base64_encode(file_get_contents($request->avatar));
        }
        $user->screen_name = $request->screen_name;
        $user->user_id = $request->user_id;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/config')->with('response', '変更が完了しました。');
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
