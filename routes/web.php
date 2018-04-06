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
Route::post("/register","member@postRegister");

Route::middleware(['checkLogin'])->group(function () {
    Route::get('data/blogs/list','blogsController@list');
    Route::get('getBlogData/{id?}','blogsController@detail');
    Route::post('data/blogs/create','blogsController@create');
    Route::get('data/blogs/delete/{blogId}',"blogsController@delete");
    Route::get('updateStatus/{blogid}/{status}','blogsController@updateStatus');
    // Route::get('tags/list','tagsController@list');
    // Route::post('tags/create','tagsController@create');

    Route::get('data/tags/list','tagsController@list');
    Route::get('getTagData/{id?}','tagsController@get');
    Route::post('data/tags/save','tagsController@save');
    Route::get('data/tags/delete/{id}','tagsController@delete');
    

    Route::get('blogs/{vue_capture?}', function () {
        return view('template');
    })->where('vue_capture', '[\/\w\.-]*');

    Route::get('tags/{vue_capture?}', function () {
        return view('template');
    })->where('vue_capture', '[\/\w\.-]*');


});



Route::get("test",function(){
    return \Request::getClientIp(true);
});







