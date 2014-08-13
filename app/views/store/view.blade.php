@extends('layouts.default')
@section('content')
<div class="row">
	<div id="single_product" class="col-md-12">	
		<div id ="sidebar" class="col-md-3">
			@include('includes.sidebar')
		</div>
		<h1><span class="text_blue2">{{ $product->product_name }}</span></h1><hr>
		<div class="col-md-9">
			<div class="col-md-4">
				<div class="thumbnail">
					 {{ HTML::image($product->image, $product->image) }}
				</div>
			</div>
			<div class="col-md-5">					
				<p><strong>Description:</strong> {{ $product->description }} </p>
				<hr>
	           {{ Form::open(array('url'=>'store/addtocart', 'class'=>'custom_form_cart pull-left')) }}
		           {{ Form::selectRange('number', 1, 5, null, ['class' => 'form-control','name'=>'quantity','id'=>'product-qty']) }}
		           {{ Form::hidden('id', $product->id) }}
		           {{ Form::hidden('product_name', $product->product_name)}}
		           {{ Form::hidden('price', $product->price) }}
		       	   {{ HTML::decode(Form::button('<i class="fa fa-shopping-cart fa-fw"></i>Add to Cart', array('class'=>'btn btn-success', 
    	 			'type'=>'submit', 'value'=>'submit', 'role'=>'button'))) }}
	       	   {{ Form::close() }}
			</div>
			<div class="col-md-3 add_lborder">
				<h2> <span class="text_orange">{{ $product->price }}</span>php </h2>
				<p><strong>Availability:
					<span class="text_green">
						{{ Availability::displayClass($product->availability) }}
					</span>
					</strong> 
				</p>
				<p><strong>Product Code:</strong> {{ $product->id }} </p>
			</div>
		</div>	

        <div class="col-md-9">
        	<div class="row">
              	<div class="ratings">
	                <p class="pull-right">{{$product->rating_count}} {{ Str::plural('review', $product->rating_count);}}</p>
	                <p>
	                    @for ($i=1; $i <= 5 ; $i++)
	                      <span class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
	                    @endfor
	                    {{ number_format($product->rating_cache, 1);}} stars
	                </p>
	            </div>
	        </div>
        </div>
	    
		<div class="col-md-9 col-md-offset-3">
		   	<div class="well" id="reviews-anchor">
              	<div class="row">
                
                  @if(Session::get('errors'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <h5>There were errors while submitting this review:</h5>
                       @foreach($errors->all('<li>:message</li>') as $message)
                          {{$message}}
                       @endforeach
                    </div>
                  @endif
                  @if(Session::has('review_posted'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been posted!</h5>
                    </div>
                  @endif
                  @if(Session::has('review_removed'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been removed!</h5>
                    </div>
                  @endif

            	</div>
	            <div class="text-right">
	            	<a href="#reviews-anchor" id="open-review-box" class="btn btn-primary">Leave a Review</a>
	            </div>
             
	            <div class="row" id="post-review-box" style="display:none;">
	                <div class="col-md-12">
	                {{ Form::open(array('url'=>'store/addcomment')) }}
	                 	{{ Form::hidden('id',$product->id) }}
	                	{{ Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
	                 	{{ Form::textarea('comment', null, array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','placeholder'=>'Enter your review here...'))}}
		                <div class="text-right">
		                    <div class="stars starrr" data-rating="{{Input::old('rating',0)}}"></div>
		                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Cancel</a>
		                    <button class="btn btn-success btn-sm" type="submit">Save</button>
		                    <!-- <button type="button" class="btn btn-info btn-circle"><i class="fa fa-check"></i>
                            </button> -->
		                </div>
	                {{Form::close()}}
	                </div>
	            </div>

              @foreach($reviews as $review)
             	<hr>
                <div class="row">
	                <div class="col-md-12">
	                    @for ($i=1; $i <= 5 ; $i++)
	                      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
	                    @endfor                   
	                    {{ 
	                    	$fullname = $review->user->first_name.' '.$review->user->last_name;
	                    	$review->user ? $fullname : 'Anonymous'
	                    }} <span class="pull-right text-muted"><i class="fa fa-clock-o fa-fw"></i><em>{{$review->timeago}}</em></span> 
	                    
	                    <p>{{{$review->comment}}}</p>
	                </div>
                </div>
              @endforeach
              {{ $reviews->links(); }}              
        </div>
	</div>
	{{-- <!-- =============================== Comment Section END ============================== --> --}}	
</div>

@stop
@section('scripts')
  {{HTML::script('js/expanding.js')}}
  {{HTML::script('js/starrr.js')}}

  <script type="text/javascript">
    $(function(){

      // initialize the autosize plugin on the review text area
      $('#new-review').autosize({append: "\n"});

      var reviewBox = $('#post-review-box');
      var newReview = $('#new-review');
      var openReviewBtn = $('#open-review-box');
      var closeReviewBtn = $('#close-review-box');
      var ratingsField = $('#ratings-hidden');

      openReviewBtn.click(function(e)
      {
        reviewBox.slideDown(400, function()
          {
            $('#new-review').trigger('autosize.resize');
            newReview.focus();
          });
        openReviewBtn.fadeOut(100);
        closeReviewBtn.show();
      });

      closeReviewBtn.click(function(e)
      {
        e.preventDefault();
        reviewBox.slideUp(300, function()
          {
            newReview.focus();
            openReviewBtn.fadeIn(200);
          });
        closeReviewBtn.hide();
        
      });

      // If there were validation errors we need to open the comment form programmatically 
      @if($errors->first('comment') || $errors->first('rating'))
        openReviewBtn.click();
      @endif

      // Bind the change event for the star rating - store the rating value in a hidden field
      $('.starrr').on('starrr:change', function(e, value){
        ratingsField.val(value);
      });
    });
  </script>
@stop
