<?php
//Route::get('/', function(){
//	$post = DB::query('SELECT * FROM users');
	//print_r($post);
//})
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

// Route::get('/', function()
// {
// 	return View::make('home');
// });

Route::get('/', 
	array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

Route::get('user', 
	array(
	'as' => 'user',
	'uses' => 'UserController@user'
));


Route::get('new', 
	array(
	'as' => 'new',
	'uses' => 'UserController@add'
));


Route::post('/', 
	array(
	'as' => 'post',
	'uses' => 'UserController@add_new'
));

Route::get('user/delete/{user_id}', 'UserController@delete');



Route::get('(:any)', function($url)
{
	return $url;
});

