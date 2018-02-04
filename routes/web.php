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
Route::post('/room/{id}', 'RoomController@index');
Route::get('/room/{id}', 'RoomController@index');
Route::post('/api/comment/store', 'RoomController@store');

/** チャットルーム作成 */
Route::get('/create', 'CreateRoomsController@index');
Route::post('/api/room/store', 'CreateRoomsController@store');