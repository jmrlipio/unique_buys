<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showProduct()
	{
		//$categories = DB::table('product_category')->get();
		$categories = Category::all();
		$featured_product = Product::where('isFeatured', 'true')
			->orderBy('created_at', 'desc')
			->take(4)
			->get();

		$new_product = Product::orderBy('created_at', 'desc')
			->take(4)
			->get();

		// $featured_product = DB::table('product')
		// 	->where('isFeatured', 'true')
		// 	->orderBy('created_at', 'desc')
		// 	->take(4)
		// 	->get();

		// $new_product = DB::table('product')
  //           ->orderBy('created_at', 'desc')
  //           ->take(4)
  //           ->get();

         return View::make('pages.home',array('featured_product'=>$featured_product, 'new_product'=>$new_product, 'categories'=>$categories));
		
	}

}
