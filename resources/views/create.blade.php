@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <h2 class="st-Title">チャットルーム作成</h2>
            <form enctype="multipart/form-data" method="POST" action="{{ url('/api/room/store') }}" class="cp-Create_ChatRoom">
                {{ csrf_field() }}
                <div class="cp-Item_Area">
                    <label for="name" class="cp-Item_Title">ルーム名</label>
                    <input type="text" name="name" id="name" class="cp-TextBox_Name form-control" required autofocus minlength="1" maxlength="32">
                </div>
                <div class="cp-Item_Area">
                    <label for="description" class="cp-Item_Title">ルームの説明</label>
                    <textarea name="description" id="description" class="cp-TextArea_Description form-control" required minlength="1" maxlength="512"></textarea>
                </div>
                <div class="cp-Item_Area">
                    <div id="app">
                        <create></create>
                    </div>
                </div>
                <div class="cp-Button_Area">
                    <button type="submit" class="st-Button cp-Button">作成</button>
                </div>
            </form>
            @if(session('response'))
                <span>{{ session('response') }}</span>
            @endif
        </div>
    </div>
@endsection