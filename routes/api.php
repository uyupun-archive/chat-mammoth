<?php

Route::get('/room/get', 'IndexController@get');
Route::post('/room/search', 'SearchRoomsController@search');
Route::get('/mypage/create', 'MypageController@create');
Route::get('/mypage/favorite', 'MypageController@favorite');
Route::post('/comment/text', 'RoomController@text');
Route::post('/comment/image', 'RoomController@image');
Route::post('/comment/gif', 'RoomController@gif');
Route::post('/comment/draw', 'RoomController@draw');
Route::get('/word/get', 'BotController@getWord');
Route::post('/room/store', 'CreateRoomsController@store');
Route::post('/user/update', 'ConfigController@update');
Route::post('/favorite/post', 'FavoriteController@post');
Route::get('/favorite/get', 'FavoriteController@get');