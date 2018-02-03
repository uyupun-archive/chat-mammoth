@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <h1 class="st-Title">サインイン</h1><!-- タイトル -->
            <form  method="POST" action="{{ route('login') }}" class="si-Form"><!-- サインインフォーム -->
                {{ csrf_field() }}
                <div class="si-Id row"><!-- ID -->
                    <label for="id" class="si-Id_Title align-self-center">ID</label><!-- ラベル -->
                    <div class="col">
                        <input id="id" type="text" name="id" value="{{ old('id') }}" class="si-Id_Textbox form-control" required autofocus><!-- テキストボックス -->
                    </div>
                </div>
                <div class="si-Password row"><!-- パスワード -->
                    <label for="password" class="si-Password_Title align-self-center">パスワード</label><!-- ラベル -->
                    <div class="col">
                        <input id="password" type="password" name="password" class="si-Password_Textbox form-control" required><!-- テキストボックス -->
                    </div>
                    @if ($errors->has('password'))
                        <span class="">{{ $errors->first('password') }}</span><!-- バリデーションメッセージ -->
                    @endif
                </div>
                <div class="si-Checkbox">
                    <input id="checkbox" type="checkbox" name="remember" class="si-Checkbox_Button form-check-input" {{ old('remember') ? 'checked' : '' }}>
                    <label for="checkbox" class="si-Checkbox_Text form-check-label">パスワードを記憶する</label>
                </div>
                <div class="si-Button">
                    <button type="submit" class="si-Button_Text">サインイン</button><!-- ボタン -->
                </div>
            </form>
        </div>
    </div>
@endsection