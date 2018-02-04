@extends('layouts.app')

@section('content')
<div class="st-Wrapper">
    <div class="st-Container">
        <h2 class="st-Title">チャットルーム作成</h2>
        <form enctype="multipart/form-data" method="POST" action="{{ url('/api/room/add') }}" class="cp-Create_ChatRoom">
            {{ csrf_field() }}
            <div class="cp-Item_Area">
                <label for="name" class="cp-Item_Title">ルーム名</label>
                <input type="text" name="name" id="name" class="cp-TextBox_Name form-control">
            </div>
            <div class="cp-Item_Area">
                <label for="description" class="cp-Item_Title">ルームの説明</label>
                <textarea name="description" id="description" class="cp-TextArea_Description form-control"></textarea>
            </div>
            {{--タグの対応は後ほど--}}
            {{--<div class="cp-Item_Area">--}}
                {{--<div class="cp-Item_Title">タグの追加</div>--}}
                {{--<input type="text" name="tag" class="cp-TextBox_Tag form-control">--}}
                {{--<button type="submit" class="st-Button cp-Tag_Button">追加</button>--}}
                {{--<div class="cp-Tag_Area"><!-- タグのwrapper -->--}}
                    {{--<span class="st-Tag">タグ</span><!-- タグ -->--}}
                    {{--<span class="st-Tag">タグ</span><!-- タグ -->--}}
                    {{--<span class="st-Tag">タグ</span><!-- タグ -->--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="cp-Item_Area">
                <div class="cp-Item_Title">公開設定</div>
                <div class="cp-Public_Area">
                    <input type="radio" name="publish" id="public" value="public" class="cp-RadioBox_Public" checked="checked">
                    <label for="public" class="cp-Chatroom_public">公開</label>
                </div>
                <div class="cp-Private_Area">
                    <input type="radio" name="publish" id="private" value="private" class="cp-RadioBox_Private">
                    <label for="private" class="cp-Chatroom_private">非公開</label>
                    <input type="text" name="password" id="password" class="cp-RadioBox_Secret form-control" placeholder="あいことばを入力">
                </div>
            </div>
            <div class="cp-Button_Area">
                <button type="submit" class="st-Button cp-Button">作成</button>
            </div>
        </form>
    </div>
</div>
@endsection