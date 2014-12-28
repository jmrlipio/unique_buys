@extends('layouts.admin_default')
@section('content')
	
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12" id="admin_container">

			<h1>Admin Panel Products</h1>
			@if(Session::has('uploaded_message'))
				<div class="alert alert-success" role="alert">
					<p>{{ Session::get('uploaded_message') }}<br/></p>
				</div>
			@elseif (Session::has('updated_message'))
				<div class="alert alert-info" role="alert">
					<p>{{ Session::get('updated_message') }}<br/></p>
				</div>
			@endif
			<hr>
			<p>Here you can view, delete, create new products</p>
			
				@foreach($products as $product)		
				
				<div class="col-md-12 admin_content">
				{{ Form::open(array('url'=>'admin/products/destroy'))}}
			            	 {{ Form::hidden('id', $product->id) }}
			            	<!--  {{ Form::submit('Delete',array('class' => 'btn btn-danger btn-sm pull-right')) }} -->
			            	{{ HTML::decode(Form::button('<i class="fa fa-times"></i>', array('class'=>'btn btn-warning btn-circle btn-sm pull-right', 
		    	 			'type'=>'submit', 'value'=>'submit', 'title'=>'Delete')))  }}
			             {{ Form::close() }}					
				{{ Form::open(array('url'=>'admin/products/edit')) }}	
					<div class="col-md-4">						
						<div class="admin_product_container">
							{{ HTML::image($product->image, $product->product_name) }}
							<h3>Price:</h3>
								{{ Form::text('price', $product->price, array('placeholder' => $product->price,'class' => 'form-control')) }} 
						</div>
					</div>

					<div class="col-md-8">	
							{{ Form::hidden('id',$product->id) }}
							{{ Form::select('availability', array('1'=> 'In Stock', '0'=> 'Out of Stock'), $product->availability) }} <br/>

							{{ Form::hidden('id',$product->id) }}
							{{ Form::label('isFeatured', 'Featured Product:');}}<br/>
							{{ Form::select('isFeatured', array('true'=> 'Yes', 'false'=> 'No'), $product->isFeatured) }} <br/>

		                    {{ Form::label('product_name', 'Product Name:');}}
		                    {{ Form::text('product_name', $product->product_name, array('placeholder' => 'Insert product name','class' => 'form-control')) }}

		                    {{ Form::label('slug', 'Slug:');}}
		                    {{ Form::text('slug', $product->slug, array('placeholder' => 'Insert product slug','class' => 'form-control')) }}
		                   
			           		{{ Form::label('description', 'Description:');}}
		                    {{ Form::textarea('description', $product->description, array('placeholder' => $product->description,'class' => 'form-control','rows'=>'5')) }}

		             		                   
		                    {{ Form::submit('Update',array('class' => 'btn btn-success btn-sm pull-right')) }}
			            
			            {{ Form::close() }}
					</div>	           
		        </div>
					
				@endforeach
			
			<div id="pagination_container">
				{{ $products->links() }}
			</div>
	


	<h2>Create New Product</h2><hr>

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

<div class="row">
{{ Form::open(array('url'=>'admin/products/create', 'files'=>true)) }}
	<div class="col-md-6">  
			{{ Form::label('isFeatured', 'Featured Product:')}}<br/> 

		@forelse($products as $product)		       
			{{ Form::select('isFeatured', array('true'=> 'Yes', 'false'=> 'No'), $product->isFeatured) }}
	    @empty	       		
	       	{{ Form::select('isFeatured', array('true'=> 'Yes', 'false'=> 'No'), 'false') }}<br/>
		@endforelse

	       {{ Form::label('image','Choose an image:') }}
		   {{ Form::file('image', array('onchange' => 'readURL(this);', 'required')) }}

	       {{ Form::label('category_id', 'Category:') }}
		   {{ Form::select('category_id', $categories, null, array('class'=>'form-control')) }}

		   {{ Form::label('product_name','Product Name:') }}
		   {{ Form::text('product_name', null, array('class'=>'form-control', 'required')) }}

		   {{ Form::label('description', 'Description:') }}
		   {{ Form::textarea('description',null, array('class'=>'form-control','rows'=>'3','placeholder'=>'Add description', 'required')) }}
		   
	       {{ Form::label('price','Price:') }}
		   {{ Form::text('price', null, array('class'=>'form-control','placeholder'=>'Add price', 'required')) }}
		
		{{ Form::submit('Upload Product', array('class' => 'btn btn-primary mtop')) }}
	</div> <!-- ============== END of col-lg-6 ================= --> 
	<div class="col-md-6">
		<div id="admin_upload_image_container">
			{{ HTML::image('images/thumbnail.jpg',null, array('alt'=>'Preview', 'id'=>'preview')) }}			
		</div>
	</div>
</div>	  
	
{{ Form::close() }}

		</div> <!-- End of "col-lg-12 -->
	</div> <!-- End of row -->
</div> <!-- End of page-wrapper -->



<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@stop