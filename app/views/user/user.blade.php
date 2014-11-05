@extends('layout.main')

@section('body-content')
<div><a href="{{URL::route('new')}}">New User</a></div>
	<table class="table">
	<thead>
			<th>User ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Country</th>
			<th>Created Date</th>
			<th>Action</th>
	</thead>
	<tbody>
		
	
    @foreach ($data as $user)
    <tr>
			<td> {{ $user->id }} </td>
			<td> {{ $user->name }} </td>
			<td> {{ $user->email }} </td>
			<td> {{ $user->country_name }} </td>
			<td> {{ $user->created_at }} </td>
			<td> 
			<a href="{{URL::route('new')}}">Edit</a> 
			
			</td>
		</tr>
       
    @endforeach

    </tbody>
		
	</table>


@stop
