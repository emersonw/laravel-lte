<?php

Auth::routes(['verify' => true]);


Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin'], function (){
	//Equivale ao acessar: /Admin
	Route::get('/', 'AdminController@index')->name('admin.home');

	Route::get('perfil', 'UserController@index')->name('profile');
	Route::post('update-profile', 'UserController@updateProfile')->name('profile.updateProfile');
	Route::post('update-password', 'UserController@updatePassword')->name('profile.updatePassword');
	Route::post('update-photo', 'UserController@updatePhoto')->name('profile.updatePhoto');
	//Route::resource('admin/categories', 'CategoryController');
});


Route::get('/', 'Site\SiteController@index')->name('home');