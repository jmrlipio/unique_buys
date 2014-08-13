@extends('layouts.default')
@section('content')
<div class="row">
{{-- <!-- ======================== Slider Here ========================--> --}}
	<div class="slider-wrapper">
		<div class="responsive-container">
			<div class="slider">
				<div class="fs_loader"></div>
				<div class="slide">

					{{ HTML::image('images/01_box_top.png', 'images/01_box_top.png', array('width'=>'361', 
					'height'=>'354', 'data-position'=>'-152,142', 'data-in'=>'left', 'data-delay'=>'200',
					'data-out'=>'right')) }}
					
					{{ HTML::image('images/01_box_bottom.png', 'images/01_box_bottom.png', array('width'=>'422', 
					'height'=>'454', 'data-position'=>'138,-152', 'data-in'=>'bottomRight', 'data-delay'=>'200',
					)) }}

					{{ HTML::image('images/01_waves.png', 'images/01_waves.png', array('width'=>'1449', 
					'height'=>'115', 'data-position'=>'240,17', 'data-in'=>'left', 'data-delay'=>'','data-out'=>'left')) }}									
					
					<p 					
							data-position="60,30" data-in="top" data-step="1" data-out="top" data-ease-in="easeOutBounce"><span class="capLetter text_yellow">G</span>reat Deals</p>													
					<p 			
							data-position="180,30" data-in="left" data-step="2" data-delay="500">On different selected items!</p>		
					<p 		 	
							data-position="180,30" data-in="left" data-step="2" data-special="cycle" data-delay="3000">Big Discounts!</p>		
					<p 				
							data-position="180,30" data-in="left" data-step="2" data-special="cycle" data-delay="5500" data-out="none">Different payment options!</p>
															
					{{ HTML::image('images/samsungs5.png', 'images/samsungs5.png', array('data-position'=>'20,330', 
					'data-in'=>'bottomLeft', 'data-delay'=>'500', 'data-out'=>'fade', 'width'=>'auto', 'height'=>'auto')) }} 

				</div>
				<div class="slide" data-in="slideLeft">
					{{ HTML::image('images/02_big_boxes.png', 'images/02_big_boxes.png', array('data-fixed', 
					'data-position'=>'25,445', 'data-in'=>'fade', 'data-delay'=>'0','data-out'=>'right')) }}

					{{ HTML::image('images/02_small_boxes.png', 'images/02_small_boxes.png', array('data-position'=>'80,220',
					 'data-in'=>'fade', 'data-delay'=>'500','data-out'=>'bottomRight')) }}	

					{{ HTML::image('images/01_box_bottom.png', 'images/01_box_bottom.png', array('data-position'=>'138,-152',
					 'data-in'=>'bottomRight', 'data-delay'=>'200','data-out'=>'bottomRight')) }}
					
					<p 		class="claim"		
							data-position="60,30" data-in="top" data-step="1" data-out="top"><span class="capLetter text_yellow">O</span>rder now!</p>
									
					<p 		class="teaser" 	
							data-position="130,30" data-in="bottom" data-step="2" data-delay="500">And pay with paypal!</p>		
					
					<p 		class="teaser"	
							data-position="180,30" data-in="bottom" data-step="2" data-delay="1500">Fast transaction</p>
					
					<p 		class="teaser" 	
							data-position="230,30" data-in="bottom" data-step="2" data-delay="2500">Accepts major credit cards!</p>
					
					<p 		class="teaser"	
							data-position="270,30" data-in="bottom" data-step="2" data-delay="3500">Meet ups available!</p>
					
					<p 		class="teaser" 	
							data-position="310,30" data-in="bottom" data-step="2" data-delay="4500">See to appreciate!</p>
					
					{{ HTML::image('images/01_waves.png', 'images/01_waves.png', array('width'=>'1449', 'height'=>'115',
					 'data-position'=>'240,200', 'data-in'=>'right', 'data-step'=>'2',' data-ease-in'=>'easeOutCirc')) }}		

					{{ HTML::image('images/iphone5s.png', 'images/iphone5s.png', array('data-position'=>'40,380', 'width'=>'450', 'height'=>'300',
					 'data-in'=>'bottomRight', 'data-in'=>'fade', 'data-delay'=>'500','data-out'=>'bottomRight')) }}		

				</div>
			</div>
		</div>
	</div> {{-- <!-- ======================== End of Slider ======================== --> --}}

<div class="container">
	<div class="col-md-12" id="featured_products"> 
		<h1><span class="text_yellow">Featured</span> Products</h1>
		@foreach($featured_product as $fproduct)
			<div class="col-sm-6 col-md-3">
			    <a href="/store/view/{{ $fproduct->id }}" class="thumbnail">
			      {{ HTML::image($fproduct->image, $fproduct->image) }}
			 	</a>
				    <div class="caption">
				        <h4><a href="/store/view/{{ $fproduct->id }}"> {{ $fproduct->product_name }}</a> </h4>
				        <p>				   
				        	{{ Str::limit($fproduct->description, 19) }}
				        	<a href="/store/view/{{ $fproduct->id }}">Read more</a>
				        </p>
				        <p>Availability:
				        	<span class="text_green"> 
				        		{{Availability::displayClass($fproduct->availability) }}
				        	</span>

				        </p>
				        <h4>Price: <span class="text_orange">{{ $fproduct->price }}</span></h4>
				        <p>
				           <a href="/store/view/{{ $fproduct->id }}" class="btn btn-primary pull-left" role="button">View</a> 
				           
				           {{ Form::open(array('url'=>'store/addtocart', 'class'=>'custom_form_cart pull-left')) }}
				           {{ Form::hidden('quantity', 1) }}
				           {{ Form::hidden('id', $fproduct->id) }}
				           {{ Form::hidden('price', $fproduct->price) }}

				       	   {{ HTML::decode(Form::button('<i class="fa fa-shopping-cart fa-fw"></i>Add to Cart', array('class'=>'btn btn-success', 
		    	 			'type'=>'submit', 'value'=>'submit', 'role'=>'button'))) }}

				       	   {{ Form::close() }}
				       </p>
				    </div>
			</div>
		@endforeach
	</div>
	
{{-- <!-- ======================== End of Featured Product  ======================== --> --}}

	<div class="col-md-12" id="new_products">
		<h1>New<span class="text_yellow"> Arrivals</span></h1>

		@foreach($new_product as $nproduct)
		<div class="col-sm-6 col-md-3">
		    <a href="/store/view/{{ $nproduct->id }}" class="thumbnail">
		      {{ HTML::image($nproduct->image, $nproduct->image) }}</a>
			    <div class="caption">
			        <h4><a href="/store/view/{{ $nproduct->id }}">{{ $nproduct->product_name }}</a></h4>			       
			        <p>	
			        	{{ Str::limit($nproduct->description, 19) }}
			        	<a href="/store/view/{{ $nproduct->id }}">Read more</a>
			        </p>
			         <p>Availability:
			        	<span class="text_green"> 
			        		{{Availability::displayClass($nproduct->availability) }}
			        	</span>

			        </p>
			        <h4>Price: <span class="text_orange">{{ $nproduct->price }}</span></h4>
			        <p>
			           <a href="/store/view/{{ $nproduct->id }}" class="btn btn-primary pull-left" role="button">View</a> 

			           {{ Form::open(array('url'=>'store/addtocart', 'class'=>'custom_form_cart pull-left')) }}
			           {{ Form::hidden('quantity', 1) }}
			           {{ Form::hidden('id', $nproduct->id) }}
			           {{ Form::hidden('price', $nproduct->price) }}
			       	   {{ HTML::decode(Form::button('<i class="fa fa-shopping-cart fa-fw"></i>Add to Cart', array('class'=>'btn btn-success', 
	    	 			'type'=>'submit', 'value'=>'submit', 'role'=>'button'))) }}

			       	   {{ Form::close() }}
			           
			       </p>
			    </div>
		</div>
		@endforeach
	</div>	
</div> {{-- <!-- ======================== End of Container  ======================== --> --}}
@stop


