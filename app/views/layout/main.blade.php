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
	<!-- Latest compiled and minified JavaScript -->

	{{ HTML::script('js/jquery-1.11.0.min.js') }}
	{{ HTML::script('js/jquery-migrate-1.2.1.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/bootstrap-theme.min.css') }}
	
</head>
<body>
	
	@include('layout.nav')
	@if(Session::has('message'))
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> {{ Session::get('message') }}</strong>
</div>
</button></div>
	@endif<div class="container">
		@yield('body-content')
	</div>
</body>
</html>
