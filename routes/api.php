<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('list','\App\Http\Controllers\AjaxController@list');

// Route::get('list','\App\Http\Controllers\IndexController@list');
Route::get('search','\App\Http\Controllers\AjaxController@search');

Route::get('search_index','\App\Http\Controllers\AjaxController@search_index');
Route::get('adopters','\App\Http\Controllers\AjaxController@list_adopted');
Route::get('animals','\App\Http\Controllers\AjaxController@list_animals');
