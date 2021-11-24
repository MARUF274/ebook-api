<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController; 

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
Route::get('/me','App\Http\Controllers\AuthController@me');

Route::post('register', 'App\Http\Controllers\AuthController@register');
Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::get('ebook', 'App\Http\Controllers\BookController@index');

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('ebook', 'App\Http\Controllers\BookController@store');
    Route::put('ebook/{id}', 'App\Http\Controllers\BookController@update');
    Route::delete('ebook/{id}', 'App\Http\Controllers\BookController@destroy');

    Route::post('author', 'App\Http\Controllers\AuthorController@store');
    Route::put('author/{id}', 'App\Http\Controllers\AuthorController@update');
    Route::delete('author/{id}', 'App\Http\Controllers\AuthorController@destroy');


    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
});
// // Route::resource('ebook', BookController::class);
// Route::resource('author', AuthorController::class);
 