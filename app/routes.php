<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home','uses' => 'HomeController@home'));

Route::get('users', array('as' => 'user_list','uses' => 'UserController@get_index'));
Route::get('user/new', array('as' => 'new_user','uses' => 'UserController@add'));
Route::post('user/add', array('as' => 'user_add','uses' => 'UserController@add_new'));
Route::get('user/view/{id}', array('as' => 'user_get_edit','uses' => 'UserController@get_edit'));
Route::post('user/edit', array('as' => 'user_edit','uses' => 'UserController@edit'));
Route::put('user/update/{id}', array('as' => 'user_update','uses' => 'UserController@get_update'));
Route::delete('user/destroy/{id}', array('as' => 'user_destroy','uses' => 'UserController@destroy'));





