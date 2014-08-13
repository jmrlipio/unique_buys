@extends('layouts.default')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-4 new_account_container">	
				<h1><span class="text_orange">Create</span> new account</h1>

				@if($errors->has())
					<div id="form-errors">
						<p>The following errors have occured:</p>
						<div class="alert alert-danger">
							@foreach($errors->all() as $error)
								<a class="alert-link" href="#">{{ $error }}</a><br/>
							@endforeach
						</div>
					</div>
				@endif
				
					{{ Form::open(array('url'=>'users/create')) }}
				
						{{ Form::label('first_name') }}
						{{ Form::text('first_name',null,array('placeholder'=>'Input name', 'class'=> 'form-control create_new_account','required')) }}

						{{ Form::label('last_name') }}
						{{ Form::text('last_name',null,array('placeholder'=>'Input last name', 'class'=> 'form-control create_new_account','required' )) }}

						{{ Form::label('email') }}
						{{ Form::text('email',null,array('placeholder'=>'Input email', 'class'=> 'form-control create_new_account','required')) }}

						{{ Form::label('password') }}
						{{ Form::password('password',array('placeholder'=>'Input password','class'=> 'form-control create_new_account','required')) }}

						{{ Form::label('password_confirmation') }}
						{{ Form::password('password_confirmation',array('placeholder'=>'Confirm password', 'class'=> 'form-control create_new_account')) }}

						{{ Form::label('telephone') }}
						{{ Form::text('telephone',null,array('placeholder'=>'Input telephone', 'class'=> 'form-control create_new_account','required')) }}
				
						{{ Form::submit('Create new Account', array('class' => 'btn btn-primary')) }}
					{{ Form::close() }}
			
		</div>
	</div>
</div>
@stop