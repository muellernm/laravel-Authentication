@extends('layout.main')

@section('body-content')

	<h1>New User Add</h1>
{{ Form::open(array('route' => array('user-cretae-post'), 'files'=>true)) }} 
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
	<tr><td colspan="3"><h2>Extra Fields</h2></td></tr>
	<tr>
		<td>Country</td>
		<td>{{ Form::select('country_id', $country_options , Input::old('country_id')) }}
		@if($errors->has('country_id'))
			<button type="button" class="btn btn-warning">{{ $errors->first('country_id') }}</button>
		@endif

		</td>
	</tr>
	<tr>
		<td>Address</td>
		<td>{{ Form::textarea('address', null, ['size' => '30x5']) }}

		@if($errors->has('address'))
			<button type="button" class="btn btn-warning">{{ $errors->first('address') }}</button>
		@endif

		</td>
	</tr>
	<tr>
		<td>Check Box</td>
		<td>
		{{ Form::checkbox('hobby[]', 'cricket') }}Cricket
		{{ Form::checkbox('hobby[]', 'football') }}football
		{{ Form::checkbox('hobby[]', 'basket_ball') }}Basket Ball
		@if($errors->has('hobbyhobby'))
			<button type="button" class="btn btn-warning">{{ $errors->first('hobby') }}</button>
		@endif

		</td>
	</tr>
	<tr>
		<td>Radio Button</td>
		<td>
		{{ Form::radio('gender', 'Male', true) }} Male
		{{ Form::radio('gender', 'Female', false) }} Female

		@if($errors->has('password_again'))
			<button type="button" class="btn btn-warning">{{ $errors->first('password_again') }}</button>
		@endif

		</td>
	</tr>
	<tr>
		<td>File Field</td>
		<td>{{ Form::file('image'); }}

		@if($errors->has('imageimage'))
			<button type="button" class="btn btn-warning">{{ $errors->first('image') }}</button>
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