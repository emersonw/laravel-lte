<?php

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin'], function (){
	//Equivale ao acessar: /admin
	Route::get('/', 'AdminController@index')->name('admin.home');

	Route::get('perfil', 'UserController@index')->name('profile');
	Route::post('update-profile', 'UserController@updateProfile')->name('profile.updateProfile');
	Route::post('update-password', 'UserController@updatePassword')->name('profile.updatePassword');

	//Route::resource('admin/categories', 'CategoryController');
});


Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

