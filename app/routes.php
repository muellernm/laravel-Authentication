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

Route::get('user/profile/{username}', array('as' => 'user-profile','uses' => 'UserController@userProfile'));

/*
	* Authenticated group 
*/
Route::group( array('before'=> 'auth' ), function(){

	Route::group(array('before'=> 'csrf'), function(){

		Route::post('user/change-password', array('as' => 'user-change-password-post','uses' => 'UserController@postChangePassword'));	
	});

	/*
		* Change Password
	*/
Route::get('user/change-password', array('as' => 'user-change-password','uses' => 'UserController@getChangePassword'));	/*
	/*
		* Sign Out
	*/
Route::get('user/sign-out', array('as' => 'user-sign-out','uses' => 'UserController@getSignOut'));

});

/*
	* Unauthenticated group 
*/

Route::group( array('before'=> 'guest' ), function(){
	/*
		* CSRF protection group
	*/
	Route::group(array('before'=> 'csrf'), function(){
		Route::post('user/new', array('as' => 'user-cretae-post','uses' => 'UserController@postCreate'));
		Route::post('user/sign-in', array('as' => 'user-sign-in-post','uses' => 'UserController@postSignIn'));
		Route::post('user/recover-password/', array('as' => 'user-forgot-password-post','uses' => 'UserController@postForgotPassword'));
	});

	Route::get('user/forgot-password', array('as' => 'user-forgot-password','uses' => 'UserController@getForgotPassword'));
	Route::get('user/recover-password/{code}', array('as' => 'user-recover-password','uses' => 'UserController@getRecoverPassword'));		

	Route::get('users', array('as' => 'user-list','uses' => 'UserController@getIndex'));
	Route::get('user/new', array('as' => 'user-create','uses' => 'UserController@getCreate'));
	Route::get('user/sign-in', array('as' => 'user-sign-in','uses' => 'UserController@getSignIn'));	
	
	Route::get('user/activate/{code}', array('as' => 'user-activate', 'uses'=>'UserController@getActivate'));

	Route::get('user/view/{id}', array('as' => 'user_get_edit','uses' => 'UserController@get_edit'));
	Route::put('user/update/{id}', array('as' => 'put_user_update','uses' => 'UserController@get_update'));
	Route::delete('user/destroy/{id}', array('as' => 'delete_user_destroy','uses' => 'UserController@destroy'));
	

});







