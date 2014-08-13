<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.admin_head')
</head>
<body>
	<div id="wrapper">
		
		<header>
			@include('includes.admin_header')
		</header>

		<div id="main">
			@yield('content')
		</div>
	</div>

{{ HTML::script('js/jquery.js')}}
{{ HTML::script('js/bootstrap.min.js')}}

@yield('admin_scripts')

</body>
</html>