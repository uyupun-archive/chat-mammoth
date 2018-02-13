@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <h1 class="st-Title">設定</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ url('/api/user/update') }}" class="cf-Form">
                {{ csrf_field() }}
                <div class="cf-Image row">
                    <label for="avatar" class="cf-Image_Title">プロフィール画像</label>
                    @if(isset(Auth::user()->avatar))
                        <img class="cf-Icon" src="{{ Auth::user()->avatar }}" alt="">
                    @else
                        <img class="cf-Icon" src="{{ Auth::user()->default_avatar }}" alt="">
                    @endif
                    <div class="col">
                        <input id="avatar" type="file" name="avatar" accept="image/*">
                    </div>
                </div>
                <div class="cf-ScreenName row">
                    <label for="screen-name" class="cf-ScreenName_Title">スクリーンネーム</label>
                    <div class="col">
                        <input id="screen-name" type="text" name="screen_name" value="{{ Auth::user()->screen_name }}" class="cf-ScreenName_Textbox form-control" required autofocus minlength="1" maxlength="16">
                    </div>
                </div>
                <div class="cf-Id row">
                    <label for="user_id" class="cf-Id_Title">ユーザID</label>
                    <div class="col">
                        <input id="user_id" type="text" name="user_id" value="{{ Auth::user()->user_id }}" class="cf-Id_Textbox form-control" required minlength="1" maxlength="16">
                    </div>
                </div>
                <div class="cf-Password row">
                    <label for="password" class="cf-Password_Title">パスワード</label>
                    <div class="col">
                        <input id="password" type="password" name="password" class="cf-Password_Textbox form-control" required minlength="8" maxlength="32">
                    </div>
                </div>
                <div class="cf-Confirm row">
                    <label for="password-confirm" class="cf-Confirm_Title">パスワード（確認）</label>
                    <div class="col">
                        <input id="password-confirm" type="password" name="password_confirm" class="cf-Confirm_Textbox form-control" required minlength="8" maxlength="32">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="bio">自己紹介</label>
                        <textarea name="bio" id="bio" maxlength="512">{{ Auth::user()->bio }}</textarea>
                    </div>
                </div>
                <div class="cf-Button_Area">
                    <button type="submit" class="st-Button cf-Button">変更</button>
                </div>
            </form>
            @if(session('response'))
                <div>{{ session('response') }}</div>
            @endif
        </div>
    </div>
@endsection
