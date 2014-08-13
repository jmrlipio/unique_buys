@extends('layouts.admin_default')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12" id="category_content">

        	<h1>Admin Panel Categories</h1>
        	@if(Session::has('category_message'))
				<div class="alert alert-success" role="alert">
					<p>{{ Session::get('category_message') }}<br/></p>
				</div>
			@elseif (Session::has('category_deleted_message'))
				<div class="alert alert-info" role="alert">
					<p>{{ Session::get('category_deleted_message') }}<br/></p>
				</div>
			@endif
        	<hr>
        	<p>Here you can view, delete, create new categories</p>

        	{{ Form::open(array('url'=>'admin/categories/destroy')) }}
    	<div class="row">
    		<div class="col-md-8">
	        	<ul class="list-group">
	        		@foreach($nav_cat as $cat)	        				    
                        <li class="list-group-item">
                        	{{$cat->category_name}}
		        				{{ Form::hidden('id',$cat->id) }}
		        				{{ HTML::decode(Form::button('<i class="fa fa-times"></i>', array('class'=>'btn btn-warning btn-circle btn-sm pull-right', 
		    	 			'type'=>'submit', 'value'=>'submit', 'title'=>'Delete')))  }}
                        </li>                       
	           		@endforeach
	        {{ Form::close() }}
	        	</ul>
	        </div>
		</div>
	
    	<div class="col-md-8">
			<h2>Create New Category</h2><hr>

			@if($errors->has())
				<div id="form-errors">
					<p>The following errors have occured:</p>
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
							<a class="alert-link" href="#">{{ $error }}</a><br/>
						@endforeach
					</div>
					<!-- <ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul> -->
				</div>
			@endif

				{{ Form::open(array('url'=>'admin/categories/create')) }}

				<p>
					{{ Form::label('category_name') }}
					{{ Form::text('category_name',null,array('placeholder'=>'Input category name', 'class'=> 'form-control')) }}
				</p>

				{{ Form::submit('Create Category', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div><!--  End of col-md-12 -->
	</div> <!-- End of row -->
</div><!--  End of page-wrappper -->

@stop