@extends('layout.admin_main')

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
		<td>{{ Form::select('country_id', $country_options, $user->country_id) }}</td>
	</tr>
	<tr>
		<td>Address</td>
		<td>{{ Form::textarea('address', $user->address, ['size' => '30x5']) }}</td>
	</tr>
    <tr>
		<td>Address</td>
		<td>	
		<?php $hobbies = explode(',', $user->hobby); ?>
		{{ 

		Form::checkbox('hobby[]', 'cricket', (in_array('cricket', $hobbies)) ) }}Cricket
		{{ Form::checkbox('hobby[]', 'football', $user->hobby) }}football
		{{ Form::checkbox('hobby[]', 'basket_ball', $user->hobby) }}Basket Ball</td>
	</tr>
    <tr>
		<td>Country</td>
		<td>{{ Form::select('country_id', $country_options , Input::old('country_id')) }}</td>
	</tr>
    <tr>
		<td>Photo</td>
		<td>
		{{ Form::hidden('old_image', $user->file) }}
		<img class="img-responsive" src="{{ asset($user->file) }}" width="70" height="80" ></td>
	</tr> 
    <tr>
		<td></td>
		<td>{{ Form::submit('Update User') }}</td>
	</tr>
    </tbody>
    
    @foreach($phones as $phone)
    	{{ $phone->phone.'<br />' }}
    @endforeach
{{ Form::close() }}

@stop