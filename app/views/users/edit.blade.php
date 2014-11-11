@extends('layout.main')

@section('body-content')

	<h1>New User Add</h1>
	@if($errors->has())
   @foreach ($errors->all() as $error)
      <div class="warning">{{ $error }}</div>
  @endforeach
@endif
	{{ Form::open(array('route' => array('put_user_update', $user->id), 'method'=>'put')) }} 
<table class="table">
	<tbody>
	<tr>
		<td>User Name</td>
		<td>{{ Form::text('name', $user->name) }}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{ Form::text('email', $user->email) }}</td>
	</tr>
	<tr>
		<td>Country</td>
		<td>{{ Form::select('country_id', $country_options , Input::old('country_id')) }}</td>
	</tr>
    <tr>
		<td></td>
		<td>{{ Form::submit('Update User') }}</td>
	</tr>
    </tbody>
    
{{ Form::close() }}

@stop