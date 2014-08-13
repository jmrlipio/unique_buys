@extends('layouts.default')
@section('content')
<div class="container signin">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			
			@if(Session::has('signout_message'))
				<div class="alert alert-info" role="alert">
					<p>{{ Session::get('signout_message') }}<br/></p>
				</div>
			@endif

				@if($errors->has())
				<div id="form-errors">									
						@foreach($errors->all() as $error)
							@if( strpos($error,'Thank') !== FALSE)
								<div class="alert alert-success" role="alert">
									<p>{{ $error }}<br/></p>
								</div>
							@else
								<!-- <p>The following errors have occured:</p> -->
								<div class="alert alert-danger">
									<a class="alert-link" href="#">{{ $error }}</a><br/>
								</div>

							@endif
						@endforeach
					
				</div>
			@endif

			 <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
			{{ Form::open(array('url'=>'users/signin')) }}

				<fieldset>
					<!-- {{ Form::label('email') }} -->
					<div class="form-group input-group form_sign-in">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span>
						</span>
						{{ Form::email('email',null,array('placeholder'=>'E-mail', 'class'=> 'form-control')) }}
					</div>
					<!-- {{ Form::label('password') }} -->
					
					<div class="form-group input-group form_sign-in">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
						</span>
						{{ Form::password('password',array('placeholder'=>'Password','class'=> 'form-control')) }}
					</div>

					<div class="checkbox">
	                    <label>
	                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
	                    </label>
	                </div>

					{{ Form::submit('Sign in', array('class' => 'btn btn-lg btn-success btn-block')) }}
				</fieldset>
			{{ Form::close() }}
				<!-- {{ HTML::link('users/register', 'Register', array('class' => 'btn btn-primary')) }} -->
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4" id="new_customer">
			<h3>I'm a new customer</h3>
			<p>You can create an account in just a few simple steps.</p>
			<p>Click below to begin</p>
			{{ Form::open(array('url'=>'users/newaccount','method'=>'get')) }}
				{{ Form::submit('Create account', array('class' => 'btn btn-lg btn-primary btn-block')) }}
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop