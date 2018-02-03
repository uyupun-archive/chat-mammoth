@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="st-Container">
        <h1 class="st-Title">サインアップ</h1><!-- タイトル -->
        <form method="POST" action="{{ route('register') }}" class="su-Form"><!-- 登録フォーム -->
            {{ csrf_field() }}
            <div class="su-ScreenName row"><!-- スクリーンネーム -->
                <label for="screen-name" class="su-ScreenName_Title align-self-center">スクリーンネーム</label><!-- ラベル -->
                <div class="col">
                    <input id="screen-name" type="text" name="screen_name" value="{{ old('screen-name') }}" class="su-ScreenName_Textbox form-control" required autofocus><!-- テキストボックス -->
                </div>
            </div>
            <div class="su-Id row"><!-- ID -->
                <label for="id" class="su-Id_Title align-self-center">ID</label><!-- ラベル -->
                <div class="col">
                    <input id="id" type="text" name="id" value="{{ old('id') }}" class="su-Id_Textbox form-control" required autofocus><!-- テキストボックス -->
                </div>
            </div>
            <div class="su-Password row"><!-- パスワード -->
                <label for="password" class="su-Password_Title align-self-center">パスワード</label><!-- ラベル -->
                <div class="col">
                    <input id="password" type="password" name="password" class="su-Password_Textbox form-control" required><!-- テキストボックス -->
                    @if ($errors->has('password'))
                        <span class="">{{ $errors->first('password') }}</span><!-- バリデーションメッセージ -->
                    @endif
                </div>
            </div>
            <div class="su-Confirm row"><!-- パスワード（確認） -->
                <label for="password-confirm" class="su-Confirm_Title align-self-center">パスワード（確認）</label><!-- ラベル -->
                <div class="col">
                    <input id="password-confirm" type="password" name="password" class="su-Confirm_Textbox form-control" required><!-- テキストボックス -->
                </div>
            </div>
            <button type="submit" class="st-Button su-Button">サインアップ</button><!-- ボタン -->
        </form>
    </div>
</div>
@endsection
