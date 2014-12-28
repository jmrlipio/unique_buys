<h3>
	<span class="text_yellow">Shop</span> by Category
</h3>				
<ul class="list-group">
	<li class="list-group-item">
		{{ HTML::link('/store/allproduct','All Products') }}
	</li>
	@foreach($nav_cat as $cat)
		<li class="list-group-item"> {{ HTML::link('/store/category/'.$cat->id, $cat->category_name) }}</li>
	@endforeach
</ul>
