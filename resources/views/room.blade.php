@extends('layouts.app')

@section('content')
<div class=""><!-- wrapper -->
    <div class=""><!-- container -->
        <div class=""><!-- ルーム情報 -->
            <h1 class="">hoge</h1><!-- ルーム名 -->
            <h2 class="">piyo</h2><!-- ルームID -->
            <div class=""><!-- ラベルwrapper -->
                <span class="">タグ</span><!-- タグ -->
                <span class="">タグ</span><!-- タグ -->
            </div>
        </div>
        <div class=""><!--  -->
            <div class=""><!-- message -->
                <div class="">hoge</div><!-- ユーザ名 -->
                <p>hogehoge</p><!-- メッセージ -->
            </div>
        </div>
    </div>
    <div class=""><!-- メッセージ -->
        <div class=""><!-- container -->
            <form method="" action="" class=""><!-- フォーム -->
                {{ csrf_field() }}
                <div class="">Aa</div><!-- タブ -->
                <div class=""><!-- テキストエリアwrapper -->
                    <textarea name="message-keyboard" class=""></textarea><!-- テキストエリア -->
                </div>
                <div class="">
                    <input type="file" name="image" class=""><!-- ファイル選択 -->
                    <input type="checkbox" name="anonymous" class=""> 匿名投稿<!-- チェックボックス -->
                    <button type="submit" class="">投稿する</button><!-- 投稿ボタン -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection