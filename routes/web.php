<?php

Auth::routes();

/** トップ */
Route::get('/', 'IndexController@index');

/** チャットルーム検索 */
Route::get('/search', 'SearchRoomsController@index');
Route::post('/search', 'SearchRoomsController@index');

/** マイページ */
Route::get('/mypage', 'MypageController@index');

/** チャットルーム */
Route::get('/room/{id}', function() {
    return view('room');
});

/** チャットルーム作成 */
Route::get('/create', 'CreateRoomsController@index');
Route::post('/api/room/add', 'CreateRoomsController@add');