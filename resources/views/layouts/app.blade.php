<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <title>chat mammoth</title>
    </head>
    <body>
        <div id="app">
            <div class="h-Header">
                <nav class="navbar navbar-default navbar-fixed-top p-navbar">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <img src="{{ asset('/images/logo3.png') }}" alt="" class="h-Logo">
                                <a class="navbar-brand h-Title" href="{{ url('/') }}">chat mammoth</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right h-Menu">
                                    <li class="h-Menu_List"><a href="{{ url('/') }}" class="h-Top">トップページ</a></li>
                                    <li class="h-Menu_List"><a href="{{ url('/search') }}" class="h-Search">ルーム検索</a></li>
                                    @guest
                                        <li class="h-Menu_List"><a href="{{ route('login') }}" class="h-SignIn">サインイン</a></li>
                                        <li class="h-Menu_List"><a href="{{ route('register') }}" class="h-SignUp">サインアップ</a></li>
                                    @else
                                        <li class="h-Menu_List"><a href="{{ url('/create') }}" class="h-Create">ルーム作成</a></li>
                                        <li class="h-Menu_List"><a href="{{ url('/mypage') }}" class="h-Mypage">マイページ</a></li>
                                        <li class="h-Menu_List"><a href="{{ route('logout') }}" class="h-SignOut" onclick="event.preventDefault();document.getElementById('logout-form').submit();">サインアウト</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                        <li><a href="{{ url('/config') }}"><i class="fas fa-cog"></i></a></li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>