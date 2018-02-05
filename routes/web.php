<?php

Auth::routes();

/** トップ */
Route::get('/', 'IndexController@index');
Route::get('/api/room/get', 'IndexController@get');

/** チャットルーム検索 */
Route::get('/search', 'SearchRoomsController@index');
Route::post('/search', 'SearchRoomsController@index');

/** マイページ */
Route::get('/mypage', 'MypageController@index');
Route::get('/api/myroom/get', 'MypageController@get');

/** チャットルーム */
Route::get('/room/{id}', 'RoomController@index');
Route::post('/api/comment/store', 'RoomController@store');

/** チャットルーム作成 */
Route::get('/create', 'CreateRoomsController@index');
Route::post('/api/room/store', 'CreateRoomsController@store');

/** 設定 */
Route::get('/config', 'ConfigController@index');
Route::post('/api/user/update', 'ConfigController@update');