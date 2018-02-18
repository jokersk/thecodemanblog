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

Route::get('/', 'member@login_form');
Route::post('/login', 'member@login');


Route::middleware(['checkLogin'])->group(function () {
    Route::get('blogs/list','blogsController@list');
    Route::get('blogs/detail/{id?}','blogsController@detail');
    Route::post('blogs/create','blogsController@create');
});





