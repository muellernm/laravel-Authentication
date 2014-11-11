@extends('layout.main')

@section('body-content')

	<h1>User Sign In</h1>
{{ Form::open(array('route' => array('user-sign-in-post'))) }} 
<table class="table">
	<tbody>
	
	<tr>
		<td align="right">Email</td>
		<td>{{ Form::text('email') }}

		@if($errors->has('email'))
					{{ $errors->first('email') }}
		@endif

		</td>
	</tr>
	<tr>
		<td align="right">Password</td>
		<td>{{ Form::password('password') }}

		@if($errors->has('password'))
					{{ $errors->first('password') }}
		@endif

		</td>
	</tr>
	<tr>
		<td align="right"> {{ Form::checkbox('remember') }} </td>
		<td><label for="remember">Remember</label></td>
	</tr>
	
    <tr>
		<td></td>
		<td>{{ Form::submit('Sign In') }}</td>
	</tr>
    </tbody>
    
{{ Form::close() }}

@stop