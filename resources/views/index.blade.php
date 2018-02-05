@extends('layouts.app')

@section('content')
<div class="st-Wrapper">
    <div class="tp-Catchphrase">投げろマサカリ⛏️</div>
    <div class="tp-Container">
        <h2 class="st-Title">新着のチャットルーム</h2>
        <div class="tp-Chatroom_Container">
            <div id="new-room">
                <new-room></new-room>
            </div>
            <div class="tp-Search">
                <a href="{{ url('/search') }}" class="tp-Search_Link">チャットルームを探す</a>
            </div>
        </div>
    </div>
</div>
@endsection