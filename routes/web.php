<?php

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified'], 'namespace' => 'Admin'], function (){
	//Equivale ao acessar: /Admin
	Route::get('/', 'AdminController@index')->name('admin.home');

	Route::get('perfil', 'UserController@perfil')->name('profile');
	Route::get('alterar-senha', 'UserController@senha')->name('password');

	Route::post('update-profile', 'UserController@updateProfile')->name('profile.updateProfile');
	Route::post('update-password', 'UserController@updatePassword')->name('profile.updatePassword');
	Route::post('update-photo', 'UserController@updatePhoto')->name('profile.updatePhoto');
	//Route::resource('admin/categories', 'CategoryController');
	
	Route::get('teste', 'AdminController@teste')->name('teste');

	Route::get('teste1/{id}/{email}', 'AdminController@teste1')->name('teste1')->middleware('signed');
});



Route::get('/', 'Site\SiteController@index')->name('home');