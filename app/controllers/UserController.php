<?php

class UserController extends \BaseController {

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

	public function get_index()
	{
		$data = User::all();
		//$message = ($message) ? $message : 'N/A';
		return View::make('users.index', array('data'=>$data, 'message'=>'Hello') )->with('title', 'User List');
	}

	public function add()
	{
		$country_options = DB::table('country')->orderBy('country_name', 'asc')->lists('country_name','id');
		return View::make('users.add')->with('country_options',$country_options)->with('title', 'New User');
	}

	public function add_new()
	{

		$validation = User::validate(Input::all() );
		if($validation->fails())
		{
			return Redirect::to('new_user')->withErrors($validation)->withInput();
		}
		else
		{
			$user = new User;
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			//$user->country_id = Input::get('country_id');
			$user->save();
			return Redirect::to('users')->with('message', 'New User created Successfully!');
		}
		
	}
	 public function destroy($id)
	 {

	 	User::find($id)->delete();
	 	return Redirect::to('users')->with('message', 'User Deleted');

	 }
	
	public function get_edit($id)
	{
		$country_options = DB::table('country')->orderBy('country_name', 'asc')->lists('country_name','id');
		$user = User::find($id);
		return View::make('users.edit', array('user'=> $user))->with('country_options', $country_options);

	}

	public function get_update($id)
	{
		
		$validation = User::validate(Input::all() );
		if($validation->fails())
		{
			return Redirect::route('user_update')->withErrors($validation)->withInput();
		}
		else
		{
			$user = User::find($id);
            $user->name       = Input::get('name');
            $user->email      = Input::get('email');
            $user->save();
            return Redirect::to('users')->with('message', 'User Updated Successfully!');
		}


	} 
	
	

}