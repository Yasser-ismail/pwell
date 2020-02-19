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

/************************************************************
 *                                                           *
 *                    Guest Routes                           *
 *                                                           *
 *************************************************************/

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::post('/contactus', 'HomeController@storeMessage')->name('message.store');



/************************************************************
 *                                                           *
 *                    user Routes                            *
 *                                                           *
 *************************************************************/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');





/************************************************************
 *                                                           *
 *                    Admin Routes                           *
 *                                                           *
 *************************************************************/

Route::group(['prefix'=>'admin', 'namespace'=>'BackEnd', 'middleware'=>'admin'], function (){

   //dashboard
    Route::get('/', 'HomeController@index')->name('admin.home');


    //users
    Route::resource('users', 'UsersController');

    //category
    Route::resource('categories', 'CategoriesController');

    //slider
    Route::resource('sliders', 'SlidersController');

    //place
    Route::resource('places', 'PlacesController');

    //place's photos
    Route::get('places/upload/{id}', 'PlacesController@upload')->name('places.upload');
    Route::post('places/upload', 'PlacesController@storePhotos')->name('places.photos.store');
    Route::get('places/upload/index/{id}', 'PlacesController@PhotosIndex')->name('places.photos.index');
    Route::get('places/photos/delete', 'PlacesController@deletePhotos')->name('photos.delete');
    Route::get('places/photo/delete/{id}', 'PlacesController@deletePhoto')->name('photo.delete');

    //messages

    Route::resource('messages', 'MessagesController')->only('index', 'edit', 'destroy');

    Route::post('messages/replay/{id}', 'MessagesController@replyMessage')->name('reply');
});
