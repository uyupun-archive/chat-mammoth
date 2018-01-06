@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="st-Container"><!-- container -->
        <div class="rp-Chatroom"><!-- ルーム情報 -->
            <h1 class="rp-Chatroom_Name">hoge</h1><!-- ルーム名 -->
            <h2 class="rp-Chatroom_Id">piyo</h2><!-- ルームID -->
            <p class="rp-Chatroom_Description">hogehoge</p><!-- description -->
            <div class="rp-Chatroom_Tag"><!-- ラベルwrapper -->
                <span class="st-Tag">タグ</span><!-- タグ -->
                <span class="st-Tag">タグ</span><!-- タグ -->
            </div>
        </div>
        <div class="rp-List"><!-- メッセージwrapper -->
            <div class="rp-Message"><!-- message -->
                <div class="rp-Message_User">hoge</div><!-- ユーザ名 -->
                <p>hogehoge</p><!-- メッセージ -->
            </div>
        </div>
    </div>
    <div class="rp-Wrapper"><!-- メッセージ -->
        <div class="rp-Container"><!-- container -->
            <form method="" action="" class="rp-Form"><!-- フォーム -->
                {{ csrf_field() }}
                <div class="rp-Tab">Aa</div><!-- タブ -->
                <div class="rp-Textarea"><!-- テキストエリアwrapper -->
                    <textarea name="message-keyboard" class="rp-Textarea_Message"></textarea><!-- テキストエリア -->
                </div>
                <div class="rp-Form_Other">
                    <input type="file" name="image" class="rp-file"><!-- ファイル選択 -->
                    <input type="checkbox" name="anonymous" class="rp-checkbox"> 匿名投稿<!-- チェックボックス -->
                    <button type="submit" class="rp-Button">投稿する</button><!-- 投稿ボタン -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection