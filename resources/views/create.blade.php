@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="st-Container"><!-- container -->
        <h2 class="st-Title">チャットルーム作成</h2><!-- タイトル -->
        <form method="POST" action="" class="cp-Chatroom">
            <div class="cp-Chatroom_Item">
                <label for="name" class="cp-Chatroom_Title">ルーム名</label>
                <input type="text" name="name" id="name" class="cp-Chatroom_Name form-control">
            </div>
            <div class="cp-Chatroom_Item">
                <label for="description" class="cp-Chatroom_Title">ルームの説明</label>
                <textarea name="description" id="description" class="cp-Chatroom_Description form-control"></textarea>
            </div>
            <div class="cp-Chatroom_Item">
                <div class="cp-Chatroom_Title">タグの追加</div>
                <input type="text" name="tag" class="cp-Chatroom_Tag form-control">
                <button type="submit" class="st-Button cp-Tag_Button">追加</button>
                <div class="cp-Tag_Area"><!-- タグのwrapper -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                </div>
            </div>
            <div class="cp-Chatroom_Item">
                <div class="cp-Chatroom_Title">公開設定</div>
                <div class="cp-Public_Area">
                    <input type="radio" name="radio" id="public" class="cp-Chatroom_Public" checked="checked">
                    <label for="public" class="cp-Chatroom_public">公開</label>
                </div>
                <div class="cp-Private_Area">
                    <input type="radio" name="radio" id="private" class="cp-Chatroom_Private">
                    <label for="private" class="cp-Chatroom_private">非公開</label>
                </div>
            </div>
            <div class="cp-Button_Area">
                <button type="submit" class="st-Button cp-Button">作成</button>
            </div>
        </form>
    </div>
</div>
@endsection