<?php

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified'], 'namespace' => 'Admin'], function (){
	//Equivale ao acessar: /Admin
	Route::get('/', 'AdminController@index')->name('admin.home');

	Route::get('alterar-perfil', 'UserController@perfil')->name('profile');
	Route::get('alterar-senha', 'UserController@senha')->name('password');

	Route::get('alterar-email', 'UserController@email')->name('email');
	Route::post('send-email-auth', 'UserController@sendEmailAuth')->name('profile.sendEmailAuth');
	Route::get('autenticar-email/{id}/{token_email}', 'UserController@emailAuth')->name('profile.emailAuth')->middleware('signed');

	Route::post('update-profile', 'UserController@updateProfile')->name('profile.updateProfile');
	Route::post('update-password', 'UserController@updatePassword')->name('profile.updatePassword');
	Route::post('update-photo', 'UserController@updatePhoto')->name('profile.updatePhoto');
	//Route::resource('admin/categories', 'CategoryController');
});

Route::get('/', 'Site\SiteController@index')->name('home');