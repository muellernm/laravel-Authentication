@extends('layout.main')

@section('body-content')

	<h1>New User Add</h1>
{{ Form::open(array('route' => array('user-cretae-post'))) }} 
<table class="table">
	<tbody>
	<tr>
		<td>Name</td>
		<td>{{ Form::text('name', Input::old('name')) }}

		@if($errors->has('name'))
			{{ $errors->first('name') }}
		@endif

		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{ Form::text('email', Input::old('email')) }}
		
		@if($errors->has('email'))
					{{ $errors->first('email') }}
		@endif

		</td>
	</tr>
	<tr>
		<td>User Name</td>
		<td>{{ Form::text('username', Input::old('username')) }}

		@if($errors->has('username'))
					{{ $errors->first('username') }}
		@endif

		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>{{ Form::password('password') }}

		@if($errors->has('password'))
					{{ $errors->first('password') }}
		@endif

		</td>
	</tr>
	<tr>
		<td>Re-Password</td>
		<td>{{ Form::password('password_again') }}

		@if($errors->has('password_again'))
					{{ $errors->first('password_again') }}
		@endif

		</td>
	</tr>
	
    <tr>
		<td></td>
		<td>{{ Form::submit('Add New') }}</td>
	</tr>
    </tbody>
    
{{ Form::close() }}

@stop