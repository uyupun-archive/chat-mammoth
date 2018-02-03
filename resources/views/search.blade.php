@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="st-Container"><!-- container -->
        <h2 class="st-Title">チャットルーム検索</h2>
        <div class="sp-Search"><!-- search wrapper -->
            <form method="POST" action="" class="sp-Search_Form form-group"><!-- 検索フォーム -->
                <input type="text" class="sp-Search_Textbox form-control"><!-- テキストボックス -->
                <button type="submit" class="st-Button sp-Search_Button">検索</button>
            </form>
        </div>
        <div class="sp-Results"><!-- 検索結果wrapper -->
            <div class="sp-Chatroom">
                <div class="sp-Chatroom_Name">ルーム名</div><!-- ルーム名 -->
                <div class="sp-Chatroom_Tag"><!-- タグのwrapper -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                </div>
                <div class="sp-Chatroom_Description"><!-- 説明のwrapper -->
                    <p>hoge</p><!-- 説明 -->
                    <p>piyo</p><!-- 説明 -->
                </div>
                <div class="sp-Chatroom_LinkBox">
                    <a href="" class="sp-Chatroom_Link">チャットルームへ</a>
                </div>
            </div>
        </div>
        <!-- ページネーション -->
    </div>
</div>
@endsection