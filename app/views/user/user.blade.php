@extends('layout.main')

@section('body-content')
	<table class="table">
	<thead>
			<th>User ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Created Date</th>
	</thead>
	<tbody>
		
	
    @foreach ($data as $user)
    <tr>
			<td> {{ $user->id }} </td>
			<td> {{ $user->name }} </td>
			<td> {{ $user->email }} </td>
			<td> {{ $user->created_at }} </td>
		</tr>
       
    @endforeach

    </tbody>
		
	</table>


@stop
