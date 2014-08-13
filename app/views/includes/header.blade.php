<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
     	</button>
      	<a class="navbar-brand" href="{{ URL::to('/') }}">Unique Buys</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      	<ul class="nav navbar-nav">        
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="nav_cat">Shop by Category <span class="caret"></span></a>
	          	<ul class="dropdown-menu" role="menu">
		            @foreach($nav_cat as $cat)
		              	<li> {{ HTML::link('/store/category/'.$cat->id, $cat->category_name) }} </li>
		              	<li class="divider"></li>
		            @endforeach
		        </ul>
	        </li>
     	 </ul>

     	{{ Form::open(array('url'=>'store/search', 'method'=>'get', 'class'=>'navbar-form navbar-left', 'role'=>'search', 'id'=>'custom-search')) }}
	    	<div class="input-group custom-search-form">
	    	 	{{ Form::text('keyword', null, array('placeholder'=>'search by keyword', 'class'=>'form-control', 'required')) }}
		    	 <span class="input-group-btn">
		    	 	{{ HTML::decode(Form::button('<i class="fa fa-search"></i>', array('class'=>'btn btn-default', 
		    	 	'type'=>'submit', 'value'=>'submit')))  }}		    	 
		    	 </span>
	    	</div>
      	{{ Form::close() }}
    
	    <ul class="nav navbar-nav navbar-right">
		   	@if(Auth::check())
		   	  	<li class="dropdown">    
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i>{{ Auth::user()->first_name }}<span class="caret"></span></a>
		         	<ul class="dropdown-menu" role="menu">
		           		            	
		            	@if(Auth::user()->role == 1)
		            		<li>
		            			<a href="{{ URL::to('/admin') }}"><i class="fa fa-gear fa-fw"></i> Dashboard</a>
		            		</li>

		            	@else 
		            		<li><a href="#">Order History</a></li>
		            	@endif
		            	<li>
		   					<a href="{{ URL::to('users/signout') }}"><i class="fa fa-sign-out fa-fw"></i> Sign Out</a>
		   				</li>
		            </ul>
		        </li>
	        @else	        	
		        <li class="dropdown">    
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i>Sign in <span class="caret"></span></a>
		         	<ul class="dropdown-menu" role="menu">		            
		   				<li>
		   					<a href="{{ URL::to('users/signin') }}"><span id="icon_gly" class="glyphicon glyphicon-log-in"></span>Sign In</a>
		   				</li>
		            	<li>
		            		<a href="{{ URL::to('users/newaccount') }}"><i class="fa fa-gear fa-fw"></i> Register</a>
		            	</li>
		            </ul>
		        </li>
          @endif
	        
	        <li>
	        	<a href="{{ URL::to('store/cart') }}">{{ HTML::image('images/blue-cart.gif', 'View Cart') }} View Cart</a>
	        </li>
	    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


