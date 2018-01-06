@extends('layouts.app')

@section('content')
<div class="st-Wrapper"><!-- wrapper -->
    <div class="st-Container"><!-- container -->
        <div class="mp-Information"><!-- ユーザ情報 -->
            <div class="mp-Information_Name">hoge</div><!-- スクリーンネーム -->
            <div class="mp-Information_Userid">hoge</div><!-- ユーザID -->
        </div>
        <div class="mp-tabs">
            <div class="mp-Create"><!-- 作成したルーム -->
                <div class="mp-Create_tab">作成したルーム</div><!-- tab -->
                <div class="mp-Createroom"><!-- ルーム -->
                    <div class="mp-Createroom_Name">hoge</div><!-- ルーム名 -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                    <div class="mp-Createroom_Description">hogehogehoge</div><!-- description -->
                </div>
            </div>
            <div class="mp-Favorite"><!-- お気に入りのルーム -->
                <div class="mp-Favorite_tab">お気に入りのルーム</div><!-- tab -->
                <div class="mp-Favoriteroom"><!-- ルーム -->
                    <div class="mp-Favoriteroom_Name">hoge</div><!-- ルーム名 -->
                    <span class="st-Tag">タグ</span><!-- タグ -->
                    <div class="mp-Favoriteroom_Description">hogehogehoge</div><!-- description -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection