<?php

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin'], function (){
	//Equivale ao acessar: /admin
	Route::get('/', 'AdminController@index')->name('admin.home');

	Route::get('profile', 'UserController@index')->name('profile');
	Route::post('profile-update', 'UserController@update')->name('profile.update');

	//Route::resource('admin/categories', 'CategoryController');
});


Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

