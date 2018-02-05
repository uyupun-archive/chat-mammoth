@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <h2 class="st-Title">マイページ</h2>
            <div class="mp-Information">
                <div class="mp-Information_Name">{{ $screen_name }}</div>
                <div class="mp-Information_UserId">&#64;{{ $user_id }}</div>
            </div>
            <div class="mp-Nav_Area">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-expanded="true">作成したルーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#favorite" role="tab" aria-controls="favorite" aria-expanded="false">お気に入りのルーム</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane active" id="create" role="tabpanel">
                        <div class="my-page">
                            <my-page></my-page>
                        </div>
                    </div>
                    <div class="tab-pane" id="favorite" role="tabpanel">
                        <div class="mp-Chatroom">
                            <div class="mp-Chatroom_Name">ルーム名</div>
                            <div class="mp-Chatroom_Tag">
                                <span class="st-Tag">タグ</span>
                                <span class="st-Tag">タグ</span>
                                <span class="st-Tag">タグ</span>
                            </div>
                            <div class="mp-Chatroom_Description">
                                <p>hoge</p>
                                <p>piyo</p>
                            </div>
                            <div class="mp-Chatroom_LinkBox">
                                <a href="" class="mp-Chatroom_Link">チャットルームへ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection