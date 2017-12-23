@extends('layouts.app')

@section('content')
    <div class=""><!-- wrapper -->
        <h1>サインイン</h1><!-- タイトル -->
        <form  method="POST" action="{{ route('login') }}" class=""><!-- サインインフォーム -->
            {{ csrf_field() }}
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
            <input type="checkbox" name="remember" class="" {{ old('remember') ? 'checked' : '' }}> パスワードを記憶する
            <button type="submit" class="">サインイン</button><!-- ボタン -->
        </form>
    </div>
@endsection