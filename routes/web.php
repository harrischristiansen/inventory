<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'InventoryController@index')->name('home');
Route::get('/list', 'InventoryController@getList')->name('list');
Route::get('/object', 'InventoryController@getObject')->name('object');
