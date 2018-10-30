<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'Admin\DashboardController@index'
    ]);

    Route::resource('post', 'Admin\PostController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('tag', 'Admin\TagController');
    Route::resource('page', 'Admin\PageController');

    Route::get('test', [
        'as' => 'admin.test',
        'uses' => 'Admin\TestController@index'
    ]); 

    Route::get('test/list_cols', [
        'as' => 'admin.test.list_cols',
        'uses' => 'Admin\TestController@list_cols'
    ]);
});

