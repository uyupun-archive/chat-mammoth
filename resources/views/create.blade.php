@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="st-Container"><!-- container -->
        <h1>ルーム作成</h1><!-- タイトル -->
        <form method="POST" action="" class="cp-Chatroom">
            <div class="cp-Chatroom_Item">
                <label for="name" class="cp-Chatroom_Title">ルーム名</label>
                <input type="text" name="name" id="name" class="cp-Chatroom_Name">
            </div>
            <div class="cp-Chatroom_Item">
                <label for="description" class="cp-Chatroom_Title">ルームの説明</label>
                <textarea name="description" id="description" class="cp-Chatroom_Description"></textarea>
            </div>
            <div class="cp-Chatroom_Item">
                <label for="tag" class="cp-Chatroom_Title">タグの追加</label>
                <input type="text" name="tag" id="tag" class="cp-Chatroom_Tag">
                <button class="cp-Chatroom">追加</button>
            </div>
            <div class="cp-Chatroom_Item">
                <div class="cp-Chatroom_Title">公開設定</div>
                <input type="checkbox" name="public" id="public" class="cp-Chatroom_public" checked>
                <label for="public" class="cp-Chatroom_public">公開</label>
                <input type="checkbox" name="private" id="private" class="cp-Chatroom_private">
                <label for="private" class="cp-Chatroom_private">非公開</label>
            </div>
            <button type="submit" class="cp-Button">ルームを作成</button>
        </form>
    </div>
</div>
@endsection