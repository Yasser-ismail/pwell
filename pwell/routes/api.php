<?php

use Illuminate\Http\Request;

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


Route::group(['prefix'=>'/v1', 'namespace'=>'Api'], function (){
    Route::post('login', 'LoginController@login');
    Route::post('register', 'RegisterController@register');
});
Route::group(['prefix'=>'/v1', 'namespace'=>'Api', 'middleware'=>'auth:api'], function (){
    Route::get('home', 'HomeController@index');
    Route::get('category/{id}', 'HomeController@showCategory');
    Route::get('place/{id}', 'HomeController@showPlace');

});
