<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.head')
</head>
<body>
	<div id="wrapper">
		<div class="container-fluid">

			<header class="row">
				@include('includes.header')
			</header>
			
			<div id="main">
				@yield('content')	
			</div>

			<footer class="row">
				@include('includes.footer')
			</footer>
		</div>
	</div>

{{ Minify::javascript(array('/js/jquery.js', '/js/slider.js', '/js/bootstrap.min.js', 
'/js/jquery.fractionslider.js', '/js/modernizr.custom.js', '/js/toucheffects.js')) }}

@yield('scripts')

</body>
</html>