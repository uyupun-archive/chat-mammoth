@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="st-Container"><!-- container -->
        <div class="sp-Wrapper_search"><!-- search wrapper -->
            <form method="POST" action="" class="sp-Form"><!-- 検索フォーム -->
                <input type="text" class="sp-textbox"><!-- テキストボックス -->
                <button type="submit" class="sp-Button">検索</button>
            </form>
        </div>
        <div class="sp-Wrapper_Results"><!-- 検索結果wrapper -->
            <div class="sp-Chatroom">
                <div class="sp-Chatroom_Name">hoge</div><!-- ルーム名 -->
                <div class="sp-Chatroom_Tag"><!-- タグwrapper -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                </div>
                <div class="sp-Chatroom_Description">説明</div><!-- description -->
            </div>
        </div>
        <!-- ページネーション -->
    </div>
</div>
@endsection