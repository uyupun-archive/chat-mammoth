@extends('layouts.app')

@section('content')
<div class="st-Wrapper">
    <div class="tp-Catchphrase">投げろマサカリ⛏️</div>
    <div class="tp-Container">
        <h2 class="st-Title">新着のチャットルーム</h2>
        <div class="tp-Chatroom_Container">
            @foreach($rooms as $room)
                <div class="tp-Chatroom">
                    <div class="tp-Chatroom_Name">ルーム名: {{ $room->name }}</div>
                    <div>ルームID: {{ $room->room_id }}</div>
                    <div>作成者: {{ $room->creator }}</div>
                    <div class="tp-Chatroom_Tag">
                        <span class="st-Tag">タグ</span>
                        <span class="st-Tag">タグ</span>
                        <span class="st-Tag">タグ</span>
                    </div>
                    <div class="tp-Chatroom_Description">
                        <p>{{ $room->description }}</p>
                    </div>
                    <div class="tp-Chatroom_LinkBox">
                        <a href="" class="tp-Chatroom_Link">チャットルームへ</a>
                    </div>
                </div>
            @endforeach
            <div class="tp-Search">
                <a href="{{ url('/search') }}" class="tp-Search_Link">チャットルームを探す</a>
            </div>
        </div>
    </div>
</div>
@endsection