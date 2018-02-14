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
Route::post('/api/comment/bot', 'BotController@bot');

/** チャットルーム作成 */
Route::get('/create', 'CreateRoomsController@index');
Route::post('/api/room/store', 'CreateRoomsController@store');

/** 設定 */
Route::get('/config', 'ConfigController@index');
Route::post('/api/user/update', 'ConfigController@update');

Route::post('/api/favorite/post', 'FavoriteController@post');

Route::view('/modal', 'modal');

Route::get('/404',function() {
    return view('errors.404');
});