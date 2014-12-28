@extends('layouts.default')
@section('content')

<div class="container">
@foreach(array_chunk($products->getCollection()->all(), 3) as $row)
	<div class="row">	
	@foreach($row as $product)
		<article class="col-md-4 mtop">
			 <div class="panel panel-primary">
			    <div class="panel-heading">
			        {{ $product->product_name }}
			    </div>
			    <div class="panel-body">
			    	<figure class="photo_container photo_container_maximize center">
						<img src="{{ $product->image }}" alt="{{ $product->image }}" data-toggle="modal" data-target="#myModal{{$product->id}}">
					</figure>

					<!-- Modal -->
                        <div class="modal fade" id="myModal{{$product->id}}" tabindex="{{ $product->product_name }}-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"> {{ $product->product_name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                       {{ $product->description }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Add to Cart</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

		        	<p>{{ Str::words($product->description,30) }}</p>
		    	</div>
			    <div class="panel-footer">
			       Price: <strong>{{ $product->price }}php</strong> 
			    </div>
			</div>
			<!-- <div class="all_product_container">				
				<figure class="photo_container photo_container_maximize center">
					<img src="{{ $product->image }}" alt="{{ $product->image }}">
				</figure>
			</div>

			<div class="body">
				<h2>{{ $product->product_name }}</h2>
				<p>{{ Str::words($product->description,30) }}</p>
				<h3>Price: <strong>{{ $product->price }}</strong> </h3>
			</div> -->
		

			<!-- <div class="col-md-9">
				<div class="all_product_details">
					<h2>{{ $product->product_name }}</h2>
					<p>{{ $product->description }}</p>
					<h3>Price: {{ $product->price }}php</h3>
				</div>
			</div> -->
		</article>
		@endforeach
	</div>  <!-- End of Row -->
@endforeach
	
	<div id="pagination_container">
		{{ $products->links() }}
	</div>
</div>

@stop
 