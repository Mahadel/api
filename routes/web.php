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
$version_1 = "api/v1";

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => $version_1], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/token', 'AuthenticationController@generateToken');
});

Route::group(array('prefix' => $version_1, 'middleware' => ['jwt.admin.auth']), function () {
    Route::post('/category', 'CategoryController@store');
    Route::put('/category/{uuid}', 'CategoryController@updateCategory');
    Route::delete('/category/{uuid}', 'CategoryController@deleteCategory');

    Route::post('/category/{uuid}/skill', 'CategoryController@storeSkill');

    Route::post('/about', 'AboutController@store');

    Route::get('/connection', 'ConnectionController@index');

    Route::get('/skill', 'SkillController@index');

    Route::get('/user', 'UserController@index');
});
Route::group(array('prefix' => $version_1, 'middleware' => ['jwt.user.auth']), function () {
    Route::get('/category', 'CategoryController@index');

    Route::put('/user/{uuid}', 'UserController@update');
    Route::get('/user/{uuid}', 'UserController@getUser');
    Route::delete('/user/{uuid}', 'UserController@deleteUser');
    Route::get('/user/{uuid}/info', 'UserController@getUserInfo');

    Route::get('/user/{uuid}/skill', 'UserController@getUserSkill');
    Route::post('/user/{uuid}/skill', 'UserController@addUserSkill');
    Route::put('/user/{uuid}/skill', 'UserController@editUserSkill');
    Route::delete('/user/{uuid}/skill/{user_skill_uuid}', 'UserController@deleteUserSkill');

    Route::get('/search/{uuid}', 'SearchController@search');

    Route::post('/user/{uuid}/connection', 'ConnectionController@store');
    Route::get('/user/{uuid}/connection', 'ConnectionController@getConnection');
    Route::delete('/user/{uuid}/connection/{connection_uuid}', 'ConnectionController@delete');
    Route::put('/user/{uuid}/connection/{connection_uuid}', 'ConnectionController@editConnection');

    Route::get('/about', 'AboutController@index');

});

