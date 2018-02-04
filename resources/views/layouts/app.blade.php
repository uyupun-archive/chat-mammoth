<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>chat mammoth</title>
    </head>
    <body>
        <div id="app">
            <div class="h-Header"><!-- container -->
                <img src="/images/logo3.png" class="h-Logo align-self-center"><!-- ロゴ -->
                <h1 class="h-Title align-self-center">
                    <a href="{{ url('/') }}">chat mammoth</a>
                </h1>
                <ul class="h-Menu align-self-center"><!-- メニュー -->
                    @guest
                        <li class="h-Menu_List"><a href="{{ url('/search') }}" class="h-Search">ルーム検索</a></li>
                        <li class="h-Menu_List"><a href="{{ route('login') }}">サインイン</a></li>
                        <li class="h-Menu_List"><a href="{{ route('register') }}">サインアップ</a></li>
                    @else
                        <li class="h-Menu_List"><a href="" class="h-Search">ルーム検索</a></li>
                        <li class="h-Menu_List"><a href="" class="h-Create">ルーム作成</a></li>
                        <li class="h-Menu_List"><a href="" class="h-Mypage">マイページ</a></li>
                        <li class="h-Menu_List"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">サインアウト</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    @endguest
                </ul>
            </div>
            @yield('content')
        </div>
    </body>
</html>
