<?php

use Illuminate\Http\Request;
use App\Models\blogs;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('blogs-list', function()
{
    return response()->json(blogs::all()->toArray());
});

Route::get('blog/{id}', function($id)
{   
    $blog = blogs::find($id);
    return response()->json($blog->toArray());

});

Route::post('postblog', 'blogsController@postComment' );
Route::get('getComments/{blog_id}','blogsController@getComments');
