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
    return view('welcome');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware'=>['admin_auth']], function() {
    Route::resource('users', 'UserController', ['excpt'=>['show']]);
    Route::group(['prefix' => 'users/{user_id}'], function () {
        Route::resource('reports', 'ReportController', ['excpt'=>['show']]);
    });
});
Route::group(['middleware'=>['auth']], function() {
    Route::get('password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
    Route::post('password', 'Auth\ChangePasswordController@changePassword')->name('password.change');
    Route::resource('users', 'UserController', ['only'=>['show']]);
    Route::group(['prefix' => 'users/{user_id}'], function () {
        Route::resource('reports', 'ReportController', ['only'=>['show']]);
        
    });
});

