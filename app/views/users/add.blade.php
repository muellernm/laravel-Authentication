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
		<button type="button" class="btn btn-warning">{{ $errors->first('name') }}</button>
			
		@endif

		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{ Form::text('email', Input::old('email')) }}
		
		@if($errors->has('email'))
				<button type="button" class="btn btn-warning">	{{ $errors->first('email') }}</button>
		@endif

		</td>
	</tr>
	<tr>
		<td>User Name</td>
		<td>{{ Form::text('username', Input::old('username'), array('class'=>'class="form-control"') ) }}

		@if($errors->has('username'))
				<button type="button" class="btn btn-warning">{{ $errors->first('username') }}</button>
		@endif

		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>{{ Form::password('password') }}

		@if($errors->has('password'))
				<button type="button" class="btn btn-warning">	{{ $errors->first('password') }}</button>
		@endif

		</td>
	</tr>
	<tr>
		<td>Re-Password</td>
		<td>{{ Form::password('password_again') }}

		@if($errors->has('password_again'))
			<button type="button" class="btn btn-warning">{{ $errors->first('password_again') }}</button>
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