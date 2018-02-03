@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="tp-Catchphrase">投げろマサカリ⛏️</div>
    <div class="tp-Container"><!-- container -->
        <h2 class="st-Title">おすすめのチャットルーム</h2>
        <div class="tp-Chatroom_Container">
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
                <div class="tp-Chatroom_LinkBox">
                    <a href="" class="tp-Chatroom_Link">チャットルームへ</a>
                </div>
            </div>
            @endfor
            <div class="tp-Search">
                <a href="{{ url('/search') }}" class="tp-Search_Link">チャットルームを探す</a><!-- リンク -->
            </div>
        </div>
    </div>
</div>
@endsection