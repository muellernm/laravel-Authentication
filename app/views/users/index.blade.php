@extends('layout.main')

@section('body-content')
<div><a href="{{URL::route('user-create')}}">New User</a></div>
	<p>{{ ($message) ? $message : ''; }}</p>
	<table class="table">
	<thead>
			<th>S.L</th>
			<th>User ID</th>
			<th>Name</th>
			<th>Email</th>
			
			<th colspan="2">Action</th>
	</thead>
	<tbody>
		
	<?php $ser = 1; ?>
    @foreach ($data as $user)
    <tr>
			<td> {{ $ser++ }} </td>
			<td> {{ $user->username }} </td>
			<td> {{ $user->name }} </td>
			<td> {{ $user->email }} </td>
			
			<td> 

			{{ Form::open(['route'=>['delete_user_destroy', $user->id], 'method'=>'delete']) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}

			</td><td> 
			{{ Form::open(['route'=>['user_get_edit', $user->id], 'method'=>'get']) }}
        {{ Form::submit('Edit', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
			
			</td>
		</tr>
       
    @endforeach

    </tbody>
		
	</table>


@stop
