@extends('layouts.app')

@section('content')
<div class="st-Wrapper">
    <div class="st-Container">
        <div class="rp-ChatRoom">
            <div class="d-flex justify-content-start">
                <h1 class="rp-ChatRoom_Name p-2">ルーム名</h1>
                <h2 class="rp-ChatRoom_Id p-2 align-self-center">0123456789</h2>
                <div class="rp-ChatRoom_Favorite ml-auto p-2 align-self-center">
                    <span class="rp-Star">★</span>
                </div>
            </div>
            <div class="rp-ChatRoom_Description">
                <p>hoge</p>
            </div>
            <div class="tp-ChatRoom_Tag">
                <span class="st-Tag">タグ</span>
                <span class="st-Tag">タグ</span>
                <span class="st-Tag">タグ</span>
            </div>
        </div>
        <div class="rp-List">
            <div class="rp-Message">
                <div class="rp-Message_User">ユーザ名</div>
                <p>hogehoge</p>
            </div>
            <div class="rp-Message">
                <div class="rp-Message_User">ユーザ名</div>
                <p>hogehoge</p>
            </div>
            <div class="rp-Message">
                <div class="rp-Message_User">ユーザ名</div>
                <p>hogehoge</p>
            </div>
            <div class="rp-Message">
                <div class="rp-Message_User">ユーザ名</div>
                <p>hogehoge</p>
            </div>
        </div>
    </div>
    <div class="rp-Wrapper">
        <div class="rp-Container">
            <form method="" action="" class="rp-Form"><!-- フォーム -->
                {{ csrf_field() }}
                <textarea name="message-keyboard" class="rp-TextArea"></textarea>
                <div class="rp-Form_Other d-flex justify-content-end">
                    <input type="file" name="image" class="rp-file mr-auto">
                    <input type="checkbox" name="anonymous" id="anonymous" class="rp-CheckBox align-self-center">
                    <lavel for="anonymous" class="rp-CheckBox_Text align-self-center">匿名投稿</lavel>
                    <button type="submit" class="st-Button rp-Button">投稿する</button><!-- 投稿ボタン -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection