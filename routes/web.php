<?php

Auth::routes();

/** トップ */
Route::get('/', 'IndexController@index');
Route::get('/api/room/get', 'IndexController@get');

/** チャットルーム検索 */
Route::get('/search', 'SearchRoomsController@index');
Route::post('/api/room/search', 'SearchRoomsController@search');

/** マイページ */
Route::get('/mypage', 'MypageController@index');
Route::get('/api/mypage/create', 'MypageController@create');
Route::get('/api/mypage/favorite', 'MypageController@favorite');

/** チャットルーム */
Route::get('/room/{id}', 'RoomController@index');
Route::post('/api/comment/text', 'RoomController@text');
Route::post('/api/comment/image', 'RoomController@image');
Route::post('/api/comment/gif', 'RoomController@gif');
Route::post('/api/comment/draw', 'RoomController@draw');

/** Bot */
Route::post('/api/comment/bot', 'BotController@postComment');
Route::get('/api/word/get', 'BotController@getWord');

/** チャットルーム作成 */
Route::get('/create', 'CreateRoomsController@index');
Route::post('/api/room/store', 'CreateRoomsController@store');

/** 設定 */
Route::get('/config', 'ConfigController@index');
Route::post('/api/user/update', 'ConfigController@update');

/** お気に入り */
Route::post('/api/favorite/post', 'FavoriteController@post');
Route::get('/api/favorite/get', 'FavoriteController@get');

/** エラー */
Route::get('/404', 'ErrorsController@status404');