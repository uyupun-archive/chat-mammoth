@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="st-Container">
        <h1 class="st-Title">サインアップ</h1><!-- タイトル -->
        <form method="POST" action="{{ route('register') }}" class="su-Form"><!-- 登録フォーム -->
            {{ csrf_field() }}
            <div class="su-ScreenName"><!-- スクリーンネーム -->
                <label for="screen-name" class="su-ScreenName_Title">スクリーンネーム</label><!-- ラベル -->
                <input id="screen-name" type="text" name="screen_name" value="{{ old('screen-name') }}" class="su-ScreenName_Textbox" required autofocus><!-- テキストボックス -->
            </div>
            <div class="su-Id"><!-- ID -->
                <label for="id" class="su-Id_Title">ID</label><!-- ラベル -->
                <input id="id" type="text" name="id" value="{{ old('id') }}" class="su-Id_Title" required autofocus><!-- テキストボックス -->
            </div>
            <div class="su-Password"><!-- パスワード -->
                <label for="password" class="su-Password_Title">パスワード</label><!-- ラベル -->
                <input id="password" type="password" name="password" class="su-Password_Textbox" required><!-- テキストボックス -->
                @if ($errors->has('password'))
                    <span class="">{{ $errors->first('password') }}</span><!-- バリデーションメッセージ -->
                @endif
            </div>
            <div class="su-Confirm"><!-- パスワード（確認） -->
                <label for="password-confirm" class="su-Confirm_Title">パスワード（確認）</label><!-- ラベル -->
                <input id="password-confirm" type="password" name="password" class="su-Confirm_Textbox" required><!-- テキストボックス -->
            </div>
            <button type="submit" class="su-Button">サインアップ</button><!-- ボタン -->
        </form>
    </div>
</div>
@endsection
