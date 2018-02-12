<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'image' => 'image',
            'screen_name' => 'required|string|max:255',
            'user_id' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {

        $default_avatars = [
            'bear',
            'cat',
            'dog',
            'elephant',
            'hippo',
            'horse',
            'koala',
            'lion',
            'monkey',
            'panda',
            'penguin',
            'pig',
            'rabbit',
            'sheep',
            'squirre',
            'tiger',
        ];

        $user = new User();
        if (Input::file('avatar')) {
            $user->avatar = 'data:image/jpg;base64,' . base64_encode(file_get_contents(Input::file('avatar')));
        } else {
            $user->default_avatar = '/avatar/' . $default_avatars[mt_rand(0, 15)] . '.png';
        }
        $user->screen_name = Input::get('screen_name');
        $user->user_id = Input::get('user_id');
        $user->password = bcrypt(Input::get('password'));
        $user->save();
        return $user;
    }
}
