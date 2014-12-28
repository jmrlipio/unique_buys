@extends('layouts.default')
@section('content')
<div class="row">
	<div class="container">
		<div id="single_product" class="col-md-12">	
			<h1>Shopping Cart & <span class="text_orange">Checkout</span></h1>

			<form action="https://www.paypal.com/cgi-bin/webscr" method="POST">
			  	<div class="table-responsive"> 
	                <table class="table table-striped table-bordered table-hover" id="product_table">
	                    <thead>
	                        <tr>
	                            <th>Product Code</th>
	                            <th>Product Name</th>
	                            <th>Unit Price</th>
	                            <th>Quantity</th>
	                            <th>Subtotal</th>                           
	                        </tr>
	                    </thead>
	                    <tbody>
	                         @foreach($products as $product)
	                            <tr>
	                            	<td>{{ $product->id }}</td>

	                                <td>
	                                	{{ HTML::image($product->image, $product->product_name, array('width'=>'65', 'height'=>'37')) }}                            
	                                	{{ $product->name }}
	                                </td>
	                                <td>{{ $product->price }}</td>
	                                <td>{{ $product->quantity }}</td>
	                                <td>
	                                	{{ $product->price }}
	                                	<a href="/store/removeitem/{{ $product->identifier }} ">
	                                		<i class="fa fa-times"></i>
	                                	</a>	                          
	                                </td>                            
	                            </tr>
	                        @endforeach 
	                            <tr class="total">
	                            	<td colspan="5">
	                            		Subtotal: {{ Cart::total() }}php<br/>
	                            		<span><strong>Total: {{ Cart::total() }}php </strong></span><br/>
	                            		{{-- Use only if internet is available for currency conversion
	                            			<span>Converted to USD: <strong>${{ $rounded_payment }} </strong></span><br/>
	                            		--}}
	                            		<input type="hidden" name="cmd" value="_xclick">
	                            		<input type="hidden" name="business" value="unique_buys@shop.com">
	                            		<input type="hidden" name="item_name" value="Unique Buys Store Purchase">
	                            		<input type="hidden" name="amount" value="{{ Cart::total() }}">
	                            		
	                            		{{--  Use only if internet is available for currency conversion
	                            		<input type="hidden" name="amount" value="{{ $rounded_payment }}">
	                            		--}}


	                            		<input type="hidden" name="first_name" value="{{ Auth::user()->first_name }}">
	                            		<input type="hidden" name="last_name" value="{{ Auth::user()->last_name }}">
	                            		<input type="hidden" name="email" value="{{ Auth::user()->email }}">

	                            		
	                            		{{ HTML::link('/', 'Continue Shopping', array('class'=>'btn btn-primary btn-sm', 'role'=>'button')) }}

	                            		{{ Form::submit('CHECKOUT WITH PAYPAL',array('class' => 'btn btn-success btn-sm')) }}
	                            	</td>
	                            </tr>
	                                                              
	                    </tbody> {{-- To hide comments in view source <!-- End of tbody --> --}}
	                </table>{{-- To hide comments in view source <!-- End of table --> --}}
	            </div> {{-- To hide comments in view source <!-- End of table-responsive --> --}}
			</form>
		</div>
	</div>
</div>
@stop