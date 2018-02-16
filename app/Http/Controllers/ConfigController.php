<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use Hash;
use App\User;

class ConfigController extends Controller {

    public function index() {
        return view('config');
    }

    public function update(Request $request) {

        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect('/config')->with('response', 'パスワードが間違っています。');
        }

        if (isset($request->new_password)) {
            if ($request->password_confirm !== $request->new_password) {
                return redirect('/config')->with('response', 'パスワードが一致しませんでした。');
            }
        }

        $validator = Validator::make($request->all(), [
            'avatar' => 'image',
            'screen_name' => 'required|string|min:1|max:16',
            'password' => 'required|string|min:8|max:32',
            'bio' => 'max:512'
        ]);

        if ($validator->fails()) {
            return redirect('/config')->with('response', '使用不可能な文字列が含まれています。');
        }

        $user = User::where('user_id', Auth::user()->user_id)->first();
        if (isset($request->avatar)) {
            $user->avatar = 'data:image/jpg;base64,' . base64_encode(file_get_contents($request->avatar));
        }
        $user->screen_name = $request->screen_name;
        $user->password = bcrypt($request->password);

        if (isset($request->bio)) {
            $user->bio = $request->bio;
        } else if (isset(Auth::user()->bio) && !isset($request->bio)) {
            $user->bio = null;
        }

        $user->save();

        return redirect('/config')->with('response', '変更が完了しました。');
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
