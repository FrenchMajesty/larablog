<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('/about', 'BloggerController@index')->name('about');

Route::get('/gallery', 'ImageController@gallery')->name('gallery');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function() {

	Route::get('/', 'AdminController@index')->name('panel.index');

	Route::get('/account', 'BloggerController@edit')->name('panel.account');

	Route::post('/account', 'BloggerController@update');

	Route::post('/password', 'BloggerController@passwordUpdate')->name('password.update');

});