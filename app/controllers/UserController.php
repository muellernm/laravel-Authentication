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
	// private $user;

	// function __construct($user){
	// 	$this->user = $user; 
	// }

	public function getIndex()
	{
		$data = User::all();
		//$message = ($message) ? $message : 'N/A';
		return View::make('users.index', array('data'=>$data, 'message'=>'Hello') )
		->with('title', 'User List')
		->with('ser', 1);
	}

	public function getCreate()
	{
		$country_options = Country::lists( 'name', 'id' );
		return View::make('users.add')
		->with('country_options',$country_options)
		->with('title', 'New User');
	}

	public function postCreate()
	{

		$validation = User::validate(Input::all() );
		if($validation->fails())
		{
			return Redirect::route('user-create')
			->withErrors($validation)			
			->withInput();
		}
		else
		{
			$name             = Input::get('name');
			$email            = Input::get('email');
			$username         = Input::get('username');
			$password         = Input::get('password');
			$code         	  = str_random(60);
			$active       	  = 0;

			/*
				* Extra fields are added below
			*/
			$country_id    	  = Input::get('country_id');
			$address		  = Input::get('address');
			$hobbies          = implode(',', Input::get('hobby'));
			$gender			  = Input::get('gender');

			$destinationPath 	 = '';
		    $filename        	 = '';

		    if (Input::hasFile('image')) {

		        $file            = Input::file('image');
		        $destinationPath = 'public/img/uploads/';
		        $filename        = str_random(6) . '_' . $file->getClientOriginalName();      
		        $uploadSuccess   = $file->move($destinationPath, $filename);
		        $dbFileName      = './img/uploads/'.$filename;
		    }

			

			$user             = new User;
			$user->name       = $name ;
			$user->email      = $email;
			$user->username   = $username;
			$user->password   = Hash::make($password);
			$user->code       = $code;
			$user->active     = $active ;

			/*
				* Save Extra Fields to DB
			*/

			$user->country_id = $country_id;
			$user->address 	  = $address;
			$user->hobbies    = $hobbies;
			$user->gender     = $gender;
			$user->file       = $dbFileName;

			$user->save();

			 // Mail::send('emails.auth.activate', array('link'=> URL::route('user-activate', $code), 'username'=>$username ), 
			 // 	function($message) use ($user) {
				// $message->to($user->email, $user->username)
				// ->subject('Your Account Activation');
			//});

			return Redirect::route('user-list')->with('message', 'New User created Successfully!')->with('message_type', 'success');
		}
		
	}
	 public function destroy($id)
	 {

	 	User::find($id)->delete();
	 	return Redirect::route('user-list')
	 	->with('message', 'User Deleted Successfully')
	 	->with('message_type', 'delete');

	 }
	
	public function get_edit($id)
	{
		$country_options = Country::lists( 'name', 'id' );
		$user = User::find($id);
		return View::make('users.edit', array('user'=> $user))->with('country_options', $country_options);

	}

	public function get_update($id)
	{
		
		$validation = User::validate(Input::all() );
		if($validation->fails())
		{
			return Redirect::route('user_get_edit', $id)->withErrors($validation)->withInput();
		}
		else
		{

			if (Input::hasFile('image')) {

		        $file            = Input::file('image');
		        $destinationPath = 'public/img/uploads/';
		        $filename        = str_random(6) . '_' . $file->getClientOriginalName();      
		        $uploadSuccess   = $file->move($destinationPath, $filename);
		        $dbFileName      = './img/uploads/'.$filename;
		    }
		    else{

		    	 $dbFileName      = Input::file('old_image');
		    }

		    $user = User::find($id);
            $user->name       = Input::get('name');
            $user->email      = Input::get('email');
            $user->file       = $dbFileName;
            $user->save();

            $destinationPath 	 = '';
		    $filename        	 = '';

		    

   			//  Mail::send('emails.auth.activate', array('link'=> URL::route('user-activate', $user->code), 'username'=>$username ), function($message) use $user {
			// 	$message->to($user->email, $user->name)
			// 	->subject('Your Account Activation');
			// });

            return Redirect::to('users')->with('message', 'User Updated Successfully!');
		}


	} 
	
	public function getActivate($code){
		$user = User::where('code', '=', $code)->where('active', '=', 0);
		if($user->count())
		{
			$user = $user->first();
			//Update the user profile
			$user->active = 1;
			$user->code = '';

			if($user->save()){
				return Redirect::route('home')->with('message', 'Activated | Now you can sign in');
			}
		}

		return Redirect::route('home')->with('message', 'We could not activate your acoount. Please try again later');

	}

	public function getSignIn(){
		return View::make('users.sign-in');
	}

	public function postSignIn(){

		$validation = User::validateSignIn(Input::all() );
		if($validation->fails())
		{
			return Redirect::route('user-sign-in')->withErrors($validation)->withInput();
		}
		else
		{
			$remember = (Input::has('remember')) ? true : false;
			$auth = Auth::attempt(array(
					'email' => Input::get('email'),
					'password' => Input::get('password'),
					'active' => 1
				), $remember);
            if($auth){
            	return Redirect::intended('/')
            			->with('message', 'Sign in Successfully!')
            			->with('message_type', 'success');
            }
            else{
            	return Redirect::route('user-sign-in')
            			->with('message', 'Unauthorised sign in')
            			->with('message_type', 'danger')
            		;
            }

		}

		return Redirect::route('user-sign-in')->with('message', 'Unauthorised sign in or are you activated ?');


	}

	public function getSignOut(){
		Auth::logout();
		return Redirect::route('home');
	}

	public function getChangePassword(){
		return View::make('users.password');
	}

	public function postChangePassword(){
		$validation = User::validateChangePassword(Input::all() );

		if($validation->fails())
		{
			return Redirect::route('user-change-password')->withErrors($validation);
		}
		else
		{
			$user         = User::find(Auth::user()->id);

			$oldpassword  = Input::get('oldpassword');
			$password     = Input::get('password');

			if( Hash::check( $oldpassword, $user->getAuthPassword() ) )
			{
				$user->password = Hash::make($password);
				if( $user->save() )
				{
					return Redirect::route('home')->with('message', 'Your Password has been Changed');
				}
			}
            else
            {
            	return Redirect::route('user-change-password')->with('message', 'You old password is incorrect');
            }

		}

		return Redirect::route('user-change-password')->with('message', 'You can not change the password');

	}

	public function userProfile($username){
		$user = User::where('username', '=', $username);

		if( $user->count() )
		{
			$user = $user->first();
			return View::make('users.profile')->with('user', $user);
		}

		return App::abort(404);
	}

	public function getForgotPassword(){
		return View::make('users.forgot');
	}

	public function postForgotPassword(){
		$validation = Validator::make(Input::all(), array(
			'email' => 'required|email')
			);
		if($validation->fails())
		{
			return Redirect::route('user-forgot-password')->withErrors($validation)->withInput();
		}
		else
		{
			$user = User::where('email', '=', Input::get('email') );
			if( $user->count() ){
				$user = $user->first();

				//Generate new code and temp_password
				$code     = str_random(60);
				$password = str_random(10);

				$user->code = $code;
				$user->password_temp = Hash::make($password);

				if( $user->save() ){
					Mail::send('emails.auth.forgot', array('link'=> URL::route('user-recover-password', $code), 'username'=>$user->username, 'password'=>$password ), function($message) use ($user) {
					$message->to($user->email, $user->username)
					->subject('Your New Password');
					});

					return Redirect::route('home')->with('message', 'A new Password has been send to your email');
				}
			}

		}

		return Redirect::route('user-forgot-password')->with('message', 'You can not request new password');
	}

	public function getRecoverPassword($code){
		$user = User::where('code', '=', $code)->where('password_temp', '!=', '');
		if($user->count())
		{
			$user                = $user->first();
			$user->password      = $user->password_temp;
			$user->password_temp = '';
			$user->code          = '';

			if($user->save()){
				return Redirect::route('home')->with('message', 'Account Recovered | Now you can sign in with your new password');
			}
		}

		return Redirect::route('home')->with('message', 'We could not Recovered your acoount. Please try again later');

	}

}