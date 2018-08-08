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

//Route::get('/', 'HomeController@index');

Route::get('/', function () {
    return view('home');
});

Route::get('users', ['as' => 'users.show', 'uses' => 'UserController@show']);

Route::get('users/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::post('users/edit', ['as' => 'users.update', 'uses' => 'UserController@update']);

// Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');

// Route::group(['middleware' => 'locale'], function () {
//     Route::get('change-language/{language}', 'HomeController@changeLanguage')
//         ->name('user.change-language');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
