<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/list', function () {
    return view('pages/list');
});

Route::get('/object', function () {
    return view('pages/object');
});
