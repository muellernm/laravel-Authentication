@extends('layout.main')

@section('body-content')

@if(Auth::check())
	<p>Welcome {{ Auth::user()->username }}</p>
@else
	<p>Welcome guest</p>
@endif
	
@stop