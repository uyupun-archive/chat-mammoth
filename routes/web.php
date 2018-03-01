<?php

Auth::routes();

/** トップ */
Route::get('/', 'IndexController@index');

/** チャットルーム検索 */
Route::get('/search', 'SearchRoomsController@index');

/** マイページ */
Route::get('/mypage', 'MypageController@index');

/** チャットルーム */
Route::get('/room/{id}', 'RoomController@index');

/** Bot */
Route::post('/api/comment/bot', 'BotController@postComment');

/** チャットルーム作成 */
Route::get('/create', 'CreateRoomsController@index');

/** 設定 */
Route::get('/config', 'ConfigController@index');

/** エラー */
Route::get('/404', 'ErrorsController@status404');