<?php

use Illuminate\Http\Request;
use App\Http\Controllers\BoardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::post('/register', 'AuthController@register');

Route::get('/boards', 'BoardController@index');
Route::get('/boards/{board}', 'BoardController@show');
Route::post('/boards', 'BoardController@store');
Route::put('/boards/{board}', 'BoardController@update');
Route::delete('/boards/{board}', 'BoardController@destroy');

Route::get('/boards/{board}/lists', 'ListsController@index');
Route::get('/boards/{board}/lists/{list}', 'ListsController@show');
Route::post('/boards/{board}/lists', 'ListsController@store');
Route::put('/boards/{board}/lists/{list}', 'ListsController@update');
Route::delete('/boards/{board}/lists/{list}', 'ListsController@destroy');

Route::get('/boards/{board}/lists/{list}/cards', 'CardController@index');
Route::get('/boards/{board}/lists/{list}/cards/{card}', 'CardController@show');
Route::post('/boards/{board}/lists/cards/{card}', 'CardController@store');
Route::put('/boards/{board}/lists/{list}/cards/{card}', 'CardController@update');
Route::delete('/boards/{board}/lists/{list}/cards/{card}', 'CardController@destroy');
