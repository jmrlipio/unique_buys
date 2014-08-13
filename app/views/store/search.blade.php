@extends('layouts.default')
@section('content')
<div class="row">
	<div id="search-result" class="col-md-12">
		<div id ="sidebar" class="col-md-3">
			@include('includes.sidebar')
		</div>	
		
		<div class="col-md-9">	
			<h1>Search Results for: <em><span class='text_orange'> {{{ $keyword }}}</em> </h1>
			<hr>
			@if(isset($search_message))
				<div class="alert alert-info" role="alert">
					<p><em>{{ $search_message }}</em><br/></p>
				</div>
			@endif			
			
			@foreach($product as $prod)
				<div class="col-sm-6 col-md-4 searched_product">
				    <a href="/store/view/{{ $prod->id }}" class="thumbnail">
				      {{ HTML::image($prod->image, $prod->image) }}
				 	</a>
				    <div class="caption">
				        <h3><a href="/store/view/{{ $prod->id }}"> {{{ $prod->product_name }}}</a> </h3>
				        <p>
				        	{{{ Str::limit($prod->description, 23) }}}
				        	<a href="/store/view/{{ $prod->id }}">Read more</a>
				        </p>

				        <h5>Availability:
				        	<span class="text_green"> 
				        		{{{Availability::displayClass($prod->availability) }}}
				        	</span>

				        </h5>
				        <h4>Price: <span class="text_orange">{{ $prod->price }}</span></h4>
				        <p>				           
					       <a href="/store/view/{{ $prod->id }}" class="btn btn-primary pull-left" role="button">View</a> 
				           {{ Form::open(array('url'=>'store/addtocart', 'class'=>'custom_form_cart pull-left')) }}
					           {{ Form::hidden('quantity', 1) }}
					           {{ Form::hidden('id', $prod->id) }}
					           {{ Form::hidden('price', $prod->price) }}
					       	   {{ HTML::decode(Form::button('<i class="fa fa-shopping-cart fa-fw"></i>Add to Cart', array('class'=>'btn btn-success', 
			    	 			'type'=>'submit', 'value'=>'submit', 'role'=>'button'))) }}
				       	   {{ Form::close() }}
				       </p>
				    </div>
				</div>
			@endforeach
		</div>
		<hr>
	</div>
</div>
@stop