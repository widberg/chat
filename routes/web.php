<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/createroom', 'RegisterRoomController@showRegistrationForm')->name('registerroom');
Route::post('/createroom', 'RegisterRoomController@register');

Route::get('/room/{name}', function ($name) {
    return redirect()->route('room', ['name' => $name]);
});
Route::get('/room/{name}/', 'RoomController@index')->name('room');
Route::post('/room/{name}/send', 'RoomController@send')->name('sendMessage');

Route::get('/home', 'HomeController@index')->name('home');
