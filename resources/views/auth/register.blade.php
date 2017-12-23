@extends('layouts.app')

@section('content')
<div class=""><!-- wrapper -->
    <h1>サインアップ</h1><!-- タイトル -->
    <form method="POST" action="{{ route('register') }}" class=""><!-- 登録フォーム -->
        {{ csrf_field() }}
        <div class=""><!-- スクリーンネーム -->
            <label for="screen-name" class="">スクリーンネーム</label><!-- ラベル -->
            <input id="screen-name" type="text" name="screen_name" value="{{ old('screen-name') }}" class="" required autofocus><!-- テキストボックス -->
        </div>
        <div class=""><!-- ID -->
            <label for="id" class="">ID</label><!-- ラベル -->
            <input id="id" type="text" name="id" value="{{ old('id') }}" class="" required autofocus><!-- テキストボックス -->
        </div>
        <div class=""><!-- パスワード -->
            <label for="password" class="">パスワード</label><!-- ラベル -->
            <input id="password" type="password" name="password" class="" required><!-- テキストボックス -->
            @if ($errors->has('password'))
                <span class="">{{ $errors->first('password') }}</span><!-- バリデーションメッセージ -->
            @endif
        </div>
        <div class=""><!-- パスワード（確認） -->
            <label for="password-confirm" class="">パスワード（確認）</label><!-- ラベル -->
            <input id="password-confirm" type="password" name="password" class="" required><!-- テキストボックス -->
        </div>
        <button type="submit" class="">サインアップ</button><!-- ボタン -->
    </form>
</div>
@endsection
