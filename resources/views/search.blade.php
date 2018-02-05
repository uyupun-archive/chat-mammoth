@extends('layouts.app')

@section('content')
<div class="st-Wrapper">
    <div class="st-Container">
        <h2 class="st-Title">チャットルーム検索</h2>
        <div class="sp-Search">
            <form enctype="multipart/form-data" method="POST" action="{{ url('/search') }}" class="sp-Search_Form form-group">
                {{ csrf_field() }}
                <input type="text" name="room_id" class="sp-Search_Textbox form-control" autofocus required>
                <button type="submit" class="st-Button sp-Search_Button">検索</button>
            </form>
        </div>
        @if(count($room) > 0)
            <div class="sp-Results">
                <div class="sp-Chatroom">
                    {{--TODO: Vue.jsに移動--}}
                    <div class="sp-Chatroom_Name">ルーム名: {{ $room->name }}</div>
                    <div>ルームID: {{ $room->room_id }}</div>
                    <div>作成者: {{ $room->creator }}</div>
                    <div class="sp-Chatroom_Tag">
                        <span class="st-Tag">タグ</span>
                        <span class="st-Tag">タグ</span>
                        <span class="st-Tag">タグ</span>
                    </div>
                    <div class="sp-Chatroom_Description">
                        <p>{{ $room->description }}</p>
                    </div>
                    <div class="sp-Chatroom_LinkBox">
                        <a href="{{ url('/room/' . $room->room_id) }}" class="sp-Chatroom_Link">チャットルームへ</a>
                    </div>
                </div>
            </div>
        @endif
        <ul class="pagination">
            <li>
                <a href="#">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"><span aria-hidden="true">»</span></a>
            </li>
        </ul>
    </div>
</div>
@endsection