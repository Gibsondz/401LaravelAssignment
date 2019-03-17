<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('admin', 'AdminController@index');
Route::get('admin/users', 'AdminController@userindex');
Route::get('admin/users/{id}', 'AdminController@usershow');
Route::get('admin/books', 'AdminController@bookindex');
Route::get('admin/books/editbook/{id}', 'AdminController@editbook');
Route::get('admin/books/{id}', 'AdminController@bookshow');
Route::get('admin/addbook', 'AdminController@addbookform');
Route::get('admin/subscriptions', 'AdminController@subscriptionindex');
Route::get('admin/comments', 'AdminController@commentsindex');
Route::get('admin/addsubscription', 'AdminController@addsubscriptionform');

Route::post('admin/users/{id}', 'AdminController@editrole');
Route::post('admin/addbook', 'AdminController@addbook');
Route::post('admin/books/delete/{id}', 'AdminController@deletebook');
Route::patch('admin/books/{id}', 'AdminController@updatebook');
Route::post('admin/subscriptions/delete/{id}', 'AdminController@deletesubscription');
Route::post('admin/addsubscription', 'AdminController@addsubscription');

Route::resource('books', 'BookController');

Route::post('books/subscribe/{id}', 'BookController@subscribe');
Route::post('books/unsubscribe/{id}', 'BookController@unsubscribe');
Route::post('books/comment/{id}', 'BookController@comment');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
