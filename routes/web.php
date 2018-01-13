<?php

/*
|--------------------------------------------------------------------------
| Web Routes - Inventory - github.com/harrischristiansen/inventory
|--------------------------------------------------------------------------
*/

Route::get('/', 'InventoryController@index')->name('home');
Route::group(['prefix' => 'items'], function () {
	Route::get('', 'InventoryController@getList')->name('list');
	Route::get('create', 'InventoryController@getItemCreate')->name('createItem');
	Route::post('create', 'InventoryController@postItem')->name('createItem-post');
	Route::group(['prefix' => '{item}'], function () {
		Route::get('', 'InventoryController@getItem')->name('item');
		Route::get('edit', 'InventoryController@getItemEdit')->name('editItem');
		Route::post('edit', 'InventoryController@postItem')->name('editItem-post');
		Route::post('upload', 'InventoryController@postUploadPhoto')->name('uploadPhoto');
	});
});
Route::group(['prefix' => 'categories'], function () {
	Route::get('', 'CategoryController@getList')->name('categories');
	Route::post('create', 'CategoryController@postCategoryCreate')->name('createCategory');
	Route::get('typeahead', 'CategoryController@getTypeahead')->name('categoryTypeahead');
	Route::group(['prefix' => '{category}'], function () {
		Route::get('', 'CategoryController@getCategory')->name('category');
	});
});
Route::group(['prefix' => 'download'], function () {
	Route::get('csv', 'InventoryController@getDownloadCSV')->name('downloadCSV');
	Route::get('xlsx', 'InventoryController@getDownloadXLSX')->name('downloadXLSX');
});
