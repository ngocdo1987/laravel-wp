<?php

Route::group(['middleware' => 'web', 'prefix' => 'ecommerce', 'namespace' => 'Modules\Ecommerce\Http\Controllers'], function()
{
    Route::get('/', 'EcommerceController@index');
});
