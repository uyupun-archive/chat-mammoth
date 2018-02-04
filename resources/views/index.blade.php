@extends('layouts.app')

@section('content')
<div class="st-Wrapper">
    <div class="tp-Catchphrase">投げろマサカリ⛏️</div>
    <div class="tp-Container">
        <h2 class="st-Title">おすすめのチャットルーム</h2>
        <div class="tp-Chatroom_Container">
            @for ($i = 0; $i < 10; $i++)
            <div class="tp-Chatroom">
                <div class="tp-Chatroom_Name">ルーム名</div>
                <div class="tp-Chatroom_Tag">
                    <span class="st-Tag">タグ</span>
                    <span class="st-Tag">タグ</span>
                    <span class="st-Tag">タグ</span>
                </div>
                <div class="tp-Chatroom_Description">
                    <p>hoge</p>
                    <p>piyo</p>
                </div>
                <div class="tp-Chatroom_LinkBox">
                    <a href="" class="tp-Chatroom_Link">チャットルームへ</a>
                </div>
            </div>
            @endfor
            <div class="tp-Search">
                <a href="{{ url('/search') }}" class="tp-Search_Link">チャットルームを探す</a><
            </div>
        </div>
    </div>
</div>
@endsection