<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>chat mammoth</title>
    <script type="text/javascript">
        window.Laravel = window.Laravel || {};
        window.Laravel.csrfToken = "{{csrf_token()}}";
    </script>
</head>
<body>
    <div class=""><!-- wrapper -->
        <div class=""><!-- container -->
            <div class=""><!-- キャッチフレーズ -->
                hogehoge
            </div>

            @for ($i = 0; $i < 10; $i++)
            <div class=""><!-- おすすめのチャットルーム -->
                <div class="">ルーム名</div><!-- ルーム名 -->
                <div class=""><!-- タグのwrapper -->
                    <span>タグ</span><!-- タグ -->
                    <span>タグ</span><!-- タグ -->
                    <span>タグ</span><!-- タグ -->
                </div>
                <div class=""><!-- 説明のwrapper -->
                    <p>hoge</p><!-- 説明 -->
                    <p>piyo</p><!-- 説明 -->
                </div>
            </div>
            @endfor

            <div class=""><!-- チャットルームを探す -->
                <a href=""></a><!-- リンク -->
            </div>
        </div>
    </div>
</body>
</html>