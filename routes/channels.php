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

Route::group(['prefix' => 'users', 'middleware' => ['auth:api', 'acl']], function () {
    Route::resource('/', 'UserController', ['only' => ['store', 'index']])->names('users');
    Route::put('/{id}', 'UserController@update')->name('users.update');
    Route::get('/{id}', 'UserController@show')->name('users.show');
    Route::delete('/{id}', 'UserController@delete')->name('users.delete');
});

Route::group(['prefix' => 'tasks', 'middleware' => ['auth:api', 'acl']], function () {
    Route::resource('/', 'TaskController', ['only' => ['store', 'index']])->names('tasks');
    Route::put('/{id}', 'TaskController@update')->name('tasks.update');
    Route::get('/{id}', 'TaskController@show')->name('tasks.show');
    Route::delete('/{id}', 'TaskController@delete')->name('tasks.delete');
});

