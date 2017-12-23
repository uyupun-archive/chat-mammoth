<?php

Auth::routes();

/** トップ */
Route::get('/', function () {
    return view('index');
});

/** チャットルーム検索 */
Route::get('/search', function() {
    return view('search');
});

/** マイページ */
Route::get('/mypage', function() {
    return view('mypage');
});

/** チャットルーム */
Route::get('/room/{id}', function() {
    return view('room');
});

/** チャットルーム作成 */
Route::get('/create', function() {
    return view('create');
});