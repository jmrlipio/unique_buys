@extends('layouts.default')
@section('content')
<div class="row">
<!-- 	<div class="container"> -->
		<div class="col-md-12" id="all_products">
			<div id ="sidebar" class="col-md-3">
				@include('includes.sidebar')
			</div>

			<h1 >All<span class="text_yellow"> Products</span></h1><hr>
			<div class="col-md-9">
				@foreach($product as $prod)
				<div class="col-md-4 all_products">
				    <a href="/store/view/{{ $prod->id }}" class="thumbnail">
				      {{ HTML::image($prod->image, '$prod->image') }}</a>
					    <div class="caption">
					        <h3><a href="/store/view/{{ $prod->id }}">{{ $prod->product_name }}</a></h3>					        
					        <p>
					        	{{ Str::limit($prod->description, 19) }}
					        	<a href="/store/view/{{ $prod->id }}">Read more</a>
					        </p>
					        <p>Availability:
					        	<span class="text_green"> 
					        		{{Availability::displayClass($prod->availability) }}
					        	</span>
					        </p>
					        <h4>Price: <span class="text_orange">{{ $prod->price }}</span></h4>
					        <p>
					        	 <a href="/store/view/{{ $prod->id }}" class="btn btn-primary pull-left" role="button">View</a> 
					           <!-- <a href="/store/view/{{ $prod->id }}" class="btn btn-primary" role="button">View</a> 
					           <a href="#" class="btn btn-default" role="button">Add to Cart</a> -->
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
		</div>
		<div id="pagination_container">
			{{ $product->links() }}
		</div>
	<!-- </div> -->
</div>
@stop