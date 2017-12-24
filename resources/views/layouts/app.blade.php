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
            <div class=""><!-- ナビゲーションバー -->
                <div class=""><!-- container -->
                    <div class=""><!-- メニュー左側 -->
                        <img src="" class=""><!-- ロゴ -->
                        <a href="{{ url('/') }}">chat mammoth</a>
                        <a href="" class="">ルーム検索</a>
                    </div>
                    <div class=""><!-- メニュー右側 -->
                        @guest
                            <a href="{{ route('login') }}">サインイン</a>
                            <a href="{{ route('register') }}">サインアップ</a>
                        @else
                            <a href="" class="">ルーム作成</a>
                            <a href="" class="">マイページ</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">サインアウト</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        @endguest
                    </div>
                </div>
            </div>
            <div class=""><!-- コンテンツ -->
                @yield('content')
            </div>
        </div>
    </body>
</html>
