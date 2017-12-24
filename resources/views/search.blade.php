@extends('layouts.app')

@section('content')
<div class=""><!-- wrapper -->
    <div class=""><!-- container -->
        <div class=""><!-- search wrapper -->
            <form method="POST" action="" class=""><!-- 検索フォーム -->
                <input type="text" class=""><!-- テキストボックス -->
                <button type="button">検索</button>
            </form>
        </div>
        <div class=""><!-- 検索結果wrapper -->
            <div class="">
                <div class="">hoge</div><!-- ルーム名 -->
                <div class=""><!-- タグwrapper -->
                    <span class="">タグ</span><!-- タグ -->
                    <span class="">タグ</span><!-- タグ -->
                    <span class="">タグ</span><!-- タグ -->
                </div>
                <div class="">説明</div><!-- description -->
            </div>
        </div>
        <!-- ページネーション -->
    </div>
</div>
@endsection