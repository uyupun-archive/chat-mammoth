@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="st-Container"><!-- container -->
        <div class="tp-Catchphrase"><!-- キャッチフレーズ -->
            hogehoge
        </div>

        @for ($i = 0; $i < 10; $i++)
        <div class="tp-Chatroom"><!-- おすすめのチャットルーム -->
            <div class="tp-Chatroom_Name">ルーム名</div><!-- ルーム名 -->
            <div class="tp-Chatroom_Tag"><!-- タグのwrapper -->
                <span class="st-Tag">タグ</span><!-- タグ -->
                <span class="st-Tag">タグ</span><!-- タグ -->
                <span class="st-Tag">タグ</span><!-- タグ -->
            </div>
            <div class="tp-Chatroom_Description"><!-- 説明のwrapper -->
                <p>hoge</p><!-- 説明 -->
                <p>piyo</p><!-- 説明 -->
            </div>
        </div>
        @endfor

        <div class="tp-Search"><!-- チャットルームを探す -->
            <a href=""></a><!-- リンク -->
        </div>
    </div>
</div>
@endsection