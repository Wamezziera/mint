<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
})->name('auth.show');

Route::middleware('auth:api')->delete('/user/logout', function (Request $request) {
    return $request->user()->token()->revoke();
})->name('auth.delete');

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController');
        Route::post('logout', 'LogoutController')->middleware('auth:api');
    });
});

Route::group(['prefix' => 'user', 'middleware' => ['auth:api', ]], function () {
    Route::put('/{id}', 'UserController@update')->name('user.update');
    Route::get('/{id}', 'UserController@show')->name('user.show');
    Route::delete('/{id}', 'UserController@delete')->name('user.delete');
    Route::resource('/', 'UserController', ['only' => ['store', 'index']])->names('user');
});

Route::group(['prefix' => 'task', 'middleware' => ['auth:api', ]], function () {
    Route::put('/{id}', 'TaskController@update')->name('task.update');
    Route::get('/{id}', 'TaskController@show')->name('task.show');
    Route::delete('/{id}', 'TaskController@delete')->name('task.delete');
    Route::resource('/', 'TaskController', ['only' => ['store', 'index']])->names('task');
});


