@extends('layouts.app')

@section('content')
<div class="st-Wrapper">
    <div class="tp-Catchphrase_Area">
        <div class="tp-Catchphrase"></div>
        <div class="tp-Catchphrase_Text">投げろマサカリ⛏️</div>
    </div>
    <div class="tp-Rotation">
        <img src="{{ asset('/images/logo2.png') }}" alt="" class="tp-Rotation_img">
    </div>
    <div class="tp-Container">
        <h2 class="st-Title">新着のチャットルーム</h2>
        <div class="tp-ChatRoom_Container">
            <div id="app">
                <new-room></new-room>
            </div>
            <div class="tp-Search">
                <a href="{{ url('/search') }}" class="tp-Search_Link">チャットルームを探す</a>
            </div>
        </div>
    </div>
</div>
@endsection