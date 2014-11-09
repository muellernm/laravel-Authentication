<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
	@if(isset($title)) 
		{{ $title }}
	@else
		Laravel Title
	@endif
	</title>
	
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<style>
		@import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css);
		@import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css);
		@import url(//fonts.googleapis.com/css?family=Lato:700);
	</style>
</head>
<body>
	
	@include('layout.nav')
	@if(Session::has('message'))
		<p style="color:green">{{ Session::get('message') }}</p>
	@endif<div class="container">
		@yield('body-content')
	</div>
</body>
</html>
