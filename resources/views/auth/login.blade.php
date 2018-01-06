@extends('layouts.app')

@section('content')
    <div class="st-Wrapper"><!-- wrapper -->
        <h1>サインイン</h1><!-- タイトル -->
        <form  method="POST" action="{{ route('login') }}" class="si-Form"><!-- サインインフォーム -->
            {{ csrf_field() }}
            <div class="si-Id"><!-- ID -->
                <label for="id" class="si-Id_Title">ID</label><!-- ラベル -->
                <input id="id" type="text" name="id" value="{{ old('id') }}" class="si-Id_Textbox" required autofocus><!-- テキストボックス -->
            </div>
            <div class="si-Password"><!-- パスワード -->
                <label for="password" class="si-Password_Title">パスワード</label><!-- ラベル -->
                <input id="password" type="password" name="password" class="si-Password_Textbox" required><!-- テキストボックス -->
                @if ($errors->has('password'))
                    <span class="">{{ $errors->first('password') }}</span><!-- バリデーションメッセージ -->
                @endif
            </div>
            <input type="checkbox" name="remember" class="si-Checkbox" {{ old('remember') ? 'checked' : '' }}> パスワードを記憶する
            <button type="submit" class="si-Button">サインイン</button><!-- ボタン -->
        </form>
    </div>
@endsection