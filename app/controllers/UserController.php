<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function user()
	{
		$data = DB::table('users')
					->leftJoin('country', 'users.country_id', '=', 'country.id')
        			->paginate(15);
		//$data = User::all();
		return View::make('user.user', $data);
	}

	public function add()
	{
		$country_options = DB::table('country')->orderBy('country_name', 'asc')->lists('country_name','id');
		return View::make('user.add')->with('country_options',$country_options);
	}

	public function add_new()
	{
		$user = new User;
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->country_id = Input::get('country_id');
		$user->save();
		return Redirect::to('user')->with('message', 'New User created');
	}
	public function delete($userid)
	{
		$user = User::find($userid);
		$user->delete();

	}

}