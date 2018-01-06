<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>chat mammoth</title>
    </head>
    <body>
        <div id="app">
            <div class="h-Nav"><!-- ナビゲーションバー -->
                <div class="h-Container"><!-- container -->
                    <div class="h-Menu_Left"><!-- メニュー左側 -->
                        <img src="" class="h-Logo"><!-- ロゴ -->
                        <a href="{{ url('/') }}">chat mammoth</a>
                        <a href="" class="h-Search">ルーム検索</a>
                    </div>
                    <div class="h-Menu_Right"><!-- メニュー右側 -->
                        @guest
                            <a href="{{ route('login') }}">サインイン</a>
                            <a href="{{ route('register') }}">サインアップ</a>
                        @else
                            <a href="" class="h-Create">ルーム作成</a>
                            <a href="" class="h-Mypage">マイページ</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">サインアウト</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="st-content"><!-- コンテンツ -->
                @yield('content')
            </div>
        </div>
    </body>
</html>
