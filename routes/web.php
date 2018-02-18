<?php

Auth::routes();

Route::model('image', 'App\Model\Image');

Route::model('post', 'App\Model\Blog');

Route::get('/', 'PostController@index')->name('index');

Route::get('/about', 'BloggerController@index')->name('about');

Route::get('/post/{slug}', 'PostController@view')->name('post');

Route::get('/gallery', 'ImageController@gallery')->name('gallery');

Route::get('/home', 'AdminController@redirect')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/change-theme/{color}', 'HomeController@changeTheme')->name('theme');

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function() {

	Route::get('/', 'AdminController@index')->name('panel.index');

	Route::get('/account', 'BloggerController@edit')->name('panel.account');

	Route::post('/account', 'BloggerController@update');

	Route::post('/password', 'BloggerController@passwordUpdate')->name('password.update');

	Route::group(['prefix' => '/gallery'], function() {

		Route::get('/', 'ImageController@manager')->name('panel.gallery');

		Route::get('/add', 'ImageController@add')->name('panel.gallery.add');

		Route::post('/add', 'ImageController@create');

		Route::get('/{image}', 'ImageController@edit')->name('panel.gallery.edit');

		Route::post('/{image}/update', 'ImageController@update')->name('panel.gallery.update');

		Route::post('/{image}/delete', 'ImageController@delete')->name('panel.gallery.delete');

	});

	Route::group(['prefix' => '/post'], function() {

		Route::get('/', 'PostController@manager')->name('panel.post');

		Route::get('/add', 'PostController@add')->name('panel.post.add');

		Route::post('/add', 'PostController@create');

		Route::get('/{post}', 'PostController@edit')->name('panel.post.edit');

		Route::post('/{post}/update', 'PostController@update')->name('panel.post.update');

		Route::post('/{post}/delete', 'PostController@delete')->name('panel.post.delete');

	});

});