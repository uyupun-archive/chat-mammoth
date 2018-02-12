@extends('layouts.app')

@section('content')
<div class="st-Wrapper">
    <div class="st-Container">
        <h1 class="st-Title">サインアップ</h1>
        <form enctype="multipart/form-data" method="POST" action="{{ route('register') }}" class="su-Form">
            {{ csrf_field() }}
            <div class="row">
                <label for="avatar" class="">プロフィール画像</label>
                <div class="col">
                    <input id="avatar" type="file" name="avatar" accept="image/*">
                </div>
            </div>
            <div class="su-ScreenName row">
                <label for="screen-name" class="su-ScreenName_Title align-self-center">スクリーンネーム</label>
                <div class="col">
                    <input id="screen-name" type="text" name="screen_name" value="{{ old('screen_name') }}" class="su-ScreenName_Textbox form-control" required autofocus minlength="1" maxlength="16">
                </div>
            </div>
            <div class="su-Id row">
                <label for="user_id" class="su-Id_Title align-self-center">ユーザID</label>
                <div class="col">
                    <input id="user_id" type="text" name="user_id" value="{{ old('user_id') }}" class="su-Id_Textbox form-control" required minlength="1" maxlength="16">
                </div>
            </div>
            <div class="su-Password row">
                <label for="password" class="su-Password_Title align-self-center">パスワード</label>
                <div class="col">
                    <input id="password" type="password" name="password" class="su-Password_Textbox form-control" required minlength="8" maxlength="32">
                    @if ($errors->has('password'))
                        <span class="">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="su-Confirm row">
                <label for="password-confirm" class="su-Confirm_Title align-self-center">パスワード（確認）</label>
                <div class="col">
                    <input id="password-confirm" name="password_confirmation" type="password" class="su-Confirm_Textbox form-control" required minlength="8" maxlength="32">
                </div>
            </div>
            <div class="su-Button_Area">
                <button type="submit" class="st-Button su-Button">サインアップ</button>
            </div>
        </form>
    </div>
</div>
@endsection
