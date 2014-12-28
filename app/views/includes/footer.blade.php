<div id="footer">
	<div class="col-md-3">
		<h5>MY ACCOUNT</h5>
			<a href="{{ URL::to('users/signin') }}">Sign in</a><br/>
			<a href="{{ URL::to('users/newaccount') }}">Register</a>
	</div>

	<div class="col-md-3">
		<h5>INFORMATION</h5>
			<a href="#">Terms of Use</a><br/>
			<a href="#">Privacy Policy</a>
	</div>

	<div class="col-md-3">
		<h5>EXTRAS</h5>
			<a href="#">About us</a><br/>
			<a href="#">Contact us</a>
	</div>

	<div class="col-md-3">
        <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
        <a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
       {{-- <!--  <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a> --> --}}
        <a class="btn btn-social-icon btn-pinterest"><i class="fa fa-pinterest"></i></a>
        <a class="btn btn-social-icon btn-tumblr"><i class="fa fa-tumblr"></i></a>
        <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>

        {{ HTML::image('images/pm.gif', 'Cards', array('class'=>'mtop pm')) }}
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<small>© Copyright 2013 Unique Buys</small>
		</div>
	</div>
</div>
