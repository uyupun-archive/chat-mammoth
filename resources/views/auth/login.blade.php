@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <h1 class="st-Title">サインイン</h1>
            <form  method="POST" action="{{ route('login') }}" class="si-Form">
                {{ csrf_field() }}
                <div class="si-Id row">
                    <label for="id" class="si-Id_Title align-self-center">ユーザID</label>
                    <div class="col">
                        <input id="id" type="text" name="user_id" value="{{ old('user_id') }}" class="si-Id_Textbox form-control" required autofocus maxlength="16">
                    </div>
                    @if ($errors->has('user_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="si-Password row">
                    <label for="password" class="si-Password_Title align-self-center">パスワード</label>
                    <div class="col">
                        <input id="password" type="password" name="password" class="si-Password_Textbox form-control" required maxlength="32">
                    </div>
                    @if ($errors->has('password'))
                        <span class="">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="si-Checkbox">
                    <input id="checkbox" type="checkbox" name="remember" class="si-Checkbox_Button form-check-input" {{ old('remember') ? 'checked' : '' }}>
                    <label for="checkbox" class="si-Checkbox_Text form-check-label">パスワードを記憶する</label>
                </div>
                <div class="si-Button_Area">
                    <button type="submit" class="st-Button si-Button">サインイン</button>
                </div>
            </form>
        </div>
    </div>
@endsection