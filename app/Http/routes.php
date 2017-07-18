<?php

Route::get('/admin/packet/new', 'PacketController@newPacket');
Route::get('/admin/packets', 'PacketController@index');
Route::get('/admin/packet/destroy/{id}', 'PacketController@destroy');
Route::post('/admin/packet/save', 'PacketController@add');

Route::get('admin/packet/editpacket/{id}', [
    'uses'=>'PacketController@tampilaneditpacket',
    'as'=>'editpacket'
]);

Route::POST('admin/packet/proseseditpacket/{id}', [
    'uses'=>'PacketController@editpacket',
    'as'=>'proseseditpacket'
]);


Route::get('/', 'MainController@index');
Route::get('/home', 'MainController@index');
Route::get('data', 'PacketController@data');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/profile', 'UserController@profile');
Route::post('auth/profile', 'UserController@update_avatar');

// Password reset link request routes...
Route::get('auth/password/email', 'Auth\PasswordController@getEmail');
Route::post('auth/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::get('/addpacket/{packetId}', 'CartController@addItem');
Route::get('/removeItem/{packetId}', 'CartController@removeItem');
Route::get('/cart', 'CartController@showCart');


Route::post('/checkout', 'BookingController@checkout');

Route::get('booking/{bookingId}', 'BookingController@viewbooking');
Route::get('booking', 'BookingController@index');
Route::get('download/{bookingId}/{filename}', 'BookingController@download');

Route::get('/caripacket', 'PacketController@search');


?>