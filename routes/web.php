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

/** チャットルーム作成 */
Route::get('/create', 'CreateRoomsController@index');
Route::post('/api/room/add', 'CreateRoomsController@add');