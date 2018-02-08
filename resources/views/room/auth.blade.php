@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <h1 class="st-Title">非公開ルーム</h1>
            <form enctype="multipart/form-data" method="POST" action="{{ url(Request::decodedPath()) }}" class="si-Form">
                {{ csrf_field() }}
                <div class="si-Password row">
                    <label for="password" class="si-Password_Title align-self-center">パスワード</label>
                    <div class="col">
                        <input id="password" type="password" name="password" class="si-Password_Textbox form-control" required autofocus maxlength="32">
                    </div>
                    @if ($errors->has('password'))
                        <span class="">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="si-Button_Area">
                    <button type="submit" class="st-Button si-Button">入室</button>
                </div>
            </form>
        </div>
    </div>
@endsection