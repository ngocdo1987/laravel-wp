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

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'Admin\DashboardController@index'
    ]);

    Route::get('post', [
        'as' => 'admin.dashboard',
        'uses' => 'Admin\PostController@index'
    ]);

    Route::get('post/add', [
        'as' => 'admin.dashboard.add',
        'uses' => 'Admin\PostController@add'
    ]);

    Route::get('category', [
        'as' => 'admin.category',
        'uses' => 'Admin\CategoryController@index'
    ]);

    Route::get('tag', [
        'as' => 'admin.tag',
        'uses' => 'Admin\TagController@index'
    ]);

    Route::get('page', [
        'as' => 'admin.page',
        'uses' => 'Admin\PageController@index'
    ]);

    Route::get('page/add', [
        'as' => 'admin.page.add',
        'uses' => 'Admin\PageController@add'
    ]);

    Route::get('test', [
        'as' => 'admin.test',
        'uses' => 'Admin\TestController@index'
    ]); 

    Route::get('test/list_cols', [
        'as' => 'admin.test.list_cols',
        'uses' => 'Admin\TestController@list_cols'
    ]);
});

Route::get('/home', 'HomeController@index');
