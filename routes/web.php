<?php

use Illuminate\Support\Facades\Route;
use App\Models;
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


Route::resource('animal','\App\Http\Controllers\AnimalController');
Route::resource('rescuer','\App\Http\Controllers\RescuerController');
Route::resource('adopter','\App\Http\Controllers\AdopterController');
Route::resource('user','\App\Http\Controllers\UserController');
Route::resource('illness','\App\Http\Controllers\IllnessController');
Route::resource('contact','\App\Http\Controllers\ContactUsController');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\AjaxController::class, 'index'])->name('/');
Route::get('/search', [App\Http\Controllers\AjaxController::class, 'search_index'])->name('search');
