@extends('layouts.app')

@section('content')
<div class=""><!-- wrapper -->
    <h1>サインアップ</h1><!-- タイトル -->
    <form class="form-horizontal" method="POST" action="{{ route('register') }}" class=""><!-- 登録フォーム -->
        {{ csrf_field() }}
        <div class=""><!-- スクリーンネーム -->
            <label for="screen-name" class="">スクリーンネーム</label><!-- ラベル -->
            <input id="screen-name" type="text" name="screen_name" value="{{ old('screen-name') }}" class="" required autofocus><!-- テキストボックス -->
        </div>
        <div class=""><!-- ID -->
            <label for="id" class="">ID</label><!-- ラベル -->
            <input id="id" type="text" name="id" value="{{ old('id') }}" class="" required autofocus><!-- テキストボックス -->
        </div>
        <div class=""><!-- メールアドレス -->
            <label for="email" class="">メールアドレス</label><!-- ラベル -->
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="" required><!-- テキストボックス -->
            @if ($errors->has('email'))
                <span class="">{{ $errors->first('email') }}</span><!-- バリデーションメッセージ -->
            @endif
        </div>
        <div class=""><!-- パスワード -->
            <label for="password" class="">パスワード</label><!-- ラベル -->
            <input id="password" type="password" class="form-control" name="password" required><!-- テキストボックス -->
            @if ($errors->has('password'))
                <span class="">{{ $errors->first('password') }}</span><!-- バリデーションメッセージ -->
            @endif
        </div>
        <div class=""><!-- パスワード（確認） -->
            <label for="password-confirm" class="">パスワード（確認）</label><!-- ラベル -->
            <input id="password-confirm" type="password" class="form-control" name="password" required><!-- テキストボックス -->
        </div>
        <button type="submit" class="">サインアップ</button><!-- ボタン -->
    </form>
</div>
@endsection
