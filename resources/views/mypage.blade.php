@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <h2 class="st-Title">マイページ</h2>
            <div class="mp-Information">
                @if(isset($avatar->avatar))
                    <img src="{{ $avatar->avatar }}" alt="">
                @else
                    <img src="{{ $avatar->default_avatar }}" alt="">
                @endif
                <div class="mp-Information_Name">{{ $screen_name }}</div>
                <div class="mp-Information_UserId">&#64;{{ $user_id }}</div>
            </div>
            <div class="mp-Nav_Area">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link mp-Nav_Link" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-expanded="true">作成したルーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mp-Nav_Link" data-toggle="tab" href="#favorite" role="tab" aria-controls="favorite" aria-expanded="false">お気に入りのルーム</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane active" id="create" role="tabpanel">
                        <div id="app">
                            <my-create></my-create>
                        </div>
                    </div>
                    <div class="tab-pane" id="favorite" role="tabpanel">
                        <div id="app">
                            <my-favorite></my-favorite>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection