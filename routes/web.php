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

// App v1 API
Route::group(['prefix' => 'api/v1',], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/category', 'CategoryController@index');
    Route::get('/skill', 'SkillController@index');
    Route::get('/user', 'UserController@index');
    Route::post('/token', 'AuthenticationController@generateToken');
});
