@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <h1 class="st-Title">設定</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ url('/api/user/update') }}" class="su-Form">
                {{ csrf_field() }}
                <div class="row">
                    <label for="avatar" class="">プロフィール画像</label>
                    @if(isset(Auth::user()->avatar))
                        <img src="{{ Auth::user()->avatar }}" alt="">
                    @else
                        <img src="{{ Auth::user()->default_avatar }}" alt="">
                    @endif
                    <div class="col">
                        <input id="avatar" type="file" name="avatar" accept="image/*">
                    </div>
                </div>
                <div class="su-ScreenName row">
                    <label for="screen-name" class="su-ScreenName_Title align-self-center">スクリーンネーム</label>
                    <div class="col">
                        <input id="screen-name" type="text" name="screen_name" value="{{ Auth::user()->screen_name }}" class="su-ScreenName_Textbox form-control" required autofocus maxlength="16">
                    </div>
                </div>
                <div class="su-Id row">
                    <label for="user_id" class="su-Id_Title align-self-center">ユーザID</label>
                    <div class="col">
                        <input id="user_id" type="text" name="user_id" value="{{ Auth::user()->user_id }}" class="su-Id_Textbox form-control" required maxlength="16">
                    </div>
                </div>
                <div class="su-Password row">
                    <label for="password" class="su-Password_Title align-self-center">パスワード</label>
                    <div class="col">
                        <input id="password" type="password" name="password" class="su-Password_Textbox form-control" required maxlength="32">
                    </div>
                </div>
                <div class="su-Confirm row">
                    <label for="password-confirm" class="su-Confirm_Title align-self-center">パスワード（確認）</label>
                    <div class="col">
                        <input id="password-confirm" type="password" name="password_confirm" class="su-Confirm_Textbox form-control" required maxlength="32">
                    </div>
                </div>
                <div class="su-Button_Area">
                    <button type="submit" class="st-Button su-Button">変更</button>
                </div>
            </form>
            @if(session('response'))
                <div>{{ session('response') }}</div>
            @endif
        </div>
    </div>
@endsection
