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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('cross')->get('blogs-list', function()
{
    return response()->json(blogs::all()->toArray());
});

Route::middleware('cross')->get('blog/{id}', function($id)
{
    return response()->json(blogs::find($id)->toArray());
});