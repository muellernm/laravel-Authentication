@extends('layout.main')

@section('body-content')

	<h1>New User Add</h1>
{{ Form::open(array('route' => array('user_add'))) }} 
<table class="table">
	<tbody>
	<tr>
		<td>User Name</td>
		<td>{{ Form::text('name', Input::old('name')) }}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{ Form::text('email', Input::old('email')) }}</td>
	</tr>
	<tr>
		<td>Country</td>
		<td>{{ Form::select('country_id', $country_options , Input::old('country_id')) }}</td>
	</tr>
    <tr>
		<td></td>
		<td>{{ Form::submit('Add New') }}</td>
	</tr>
    </tbody>
    
{{ Form::close() }}

@stop