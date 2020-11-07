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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/deploy', 'DeployController@deploy')->name('deploy')->middleware('auth');
Route::post('/post', 'PostController@index')->name('post')->middleware('auth');
Route::get('/post', 'PostController@index')->name('post')->middleware('auth');
Route::get('/my-posts', 'PostController@myposts')->name('my-posts')->middleware('auth');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth'],], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('category', 'HomeController@category')->name('category');
    Route::post('category', 'AdminController@category')->name('category');
});
