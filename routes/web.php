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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('users/show', ['as' => 'users.show', 'uses' => 'UsersController@show']);

Route::get('users/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::post('users/edit', ['as' => 'users.update', 'uses' => 'UsersController@update']);

Auth::routes();

Route::resource('posts', 'PostsController');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'), function () {
    Route::get('/', 'PagesController@home');

    Route::get('/users', 'UsersController@index');
    Route::get('/users/{id?}/edit', 'UsersController@edit');
    Route::post('/users/{id?}/edit', 'UsersController@update');

    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');

    Route::resource('products', 'ProductsController');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/product', 'ProductController@product')->name('product');

Route::get('/product/details/{id}','ProductController@productDetails');

Route::post('/comments/store','CommentController@store');
