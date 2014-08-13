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
{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/slider.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/jquery.fractionslider.js') }}


{{-- <!-- =============== Product Thumbnails ===============  --> --}}

{{ HTML::script('js/toucheffects.js') }}

{{-- <!-- =============== End Product Thumbnails ===============  --> --}}
@yield('scripts')

</body>
</html>