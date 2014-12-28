<?php
class StoreController extends BaseController{

	public function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=> array('postAddtocart', 'getCart', 'getRemoveitem','postAddcomment')));
	}

	public function getIndex(){	

		$featured_product = Product::where('isFeatured', 'true')
			->orderBy('created_at', 'desc')
			->take(4)
			->get();

		$new_product = Product::orderBy('created_at', 'desc')
			->take(4)
			->get();

         return View::make('pages.home',array('featured_product'=>$featured_product, 'new_product'=>$new_product));

	}

	public function getView($id){
		$product = Product::find($id);
		$reviews = $product->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(10);

/*		if(Auth::check()) {
			$data = DB::table('review')	
			 ->select('review.*', 'product.id','users.first_name','users.last_name')
				->join(DB::raw('users'), function($joins) {
					$joins->on('users.id', '=', 'review.user_id');
				 })	

				->join(DB::raw('product'), function($join) use ($id) {
		             $join->on('product.id', '=', 'review.product_id');
		         })

				->where('product.id', '=', DB::raw($id))
				->get();
			return View::make('store.view', array('product'=>$product, 'data'=>$data, 'reviews'=>$reviews));		
		}	

		return View::make('store.view')
			->with('product', Product::find($id))
			->with('review', Review::all());

		return View::make('store.view')			
			->with('product', Product::find($id));
*/

		return View::make('store.view', array('product'=>$product, 'reviews'=>$reviews));	
	}

	public function getCategory($cat_id){

		$product = Product::where('category_id', '=', $cat_id)->paginate(9);
		
		return View::make('store.category', compact('product', $product))
			->with('category', Category::find($cat_id));
	}

	public function getSearch(){
		
		$keyword = Input::get('keyword');
		$product = Product::where('product_name', 'LIKE', '%'.$keyword.'%')->get();
		$search_message = 'Sorry, Product not found';

		if(count($product) !=0){
			return View::make('store.search', array('product'=> $product, 'keyword'=> $keyword, '$search_message'=> $search_message));
		}

		return View::make('store.search')
			->with('product', $product)
			->with('keyword', $keyword)
			->with('search_message', $search_message);

		// return View::make('store.search')
		// 	->with('product', Product::where('product_name', 'LIKE', '%'.$keyword.'%')->get())
		// 	->with('keyword', $keyword);
	}

	public function getAllproduct(){

		return View::make('store.view_all')					
			->with('product', Product::orderBy('category_id', 'ASC')
			->paginate(9));
	}

	public function postAddcomment(){
		$id= Input::get('id');
		$review = new Review;
		$product = Product::find($id);
		$validator = Validator::make(Input::all(), Review::$rules);

	if ($validator->passes()) {
		// For saving a new review in the review table via product_id
		$review->user_id = Auth::user()->id;
		$review->comment = Input::get('comment');
		$review->rating = Input::get('rating');
		$review->product_id = $id;
		$review->save();

	   $this->recalculateRating($id, Input::get('rating'));
		return Redirect::to('store/view/'.$id.'#reviews-anchor')
			->with('review_posted',true);
		}
		return Redirect::to('store/view/'.$id.'#reviews-anchor')	
			->withErrors($validator)->withInput();
	}

	public function recalculateRating($id, $rating)
    {
    // For updating product table's rating_count and rating_cache via product_id
		$product = Product::find($id);

       	$reviews = $product->reviews()->notSpam()->approved();
        $avgRating = $reviews->avg('rating');
        $product->rating_cache = round($avgRating,1);
        $product->rating_count = $reviews->count();
        $product->save();
    }	

	public function postAddtocart(){
		$product = Product::find(Input::get('id'));
		$quantity = Input::get('quantity');		

		Cart::insert(array(
			'id'=>$product->id,
			'name'=>$product->product_name,
			'price'=>$product->price,
			'quantity'=>$quantity,
			'image'=>$product->image
		));

		return Redirect::to('store/cart');
	}

	public function getCart(){

		/* For converting currency, NOTE: Use only if internet is available */
		// Exchange::setCurrency('PHP','USD');
		// Exchange::setAmount(Cart::total());
		// $converted_payment = Exchange::getExchangeValue();
		// $rounded_payment = number_format($converted_payment, 2, '.', '');

		// return View::make('store.cart')->with('products', Cart::contents())
		// 	->with('rounded_payment', $rounded_payment);

		/*END*/

		return View::make('store.cart')->with('products', Cart::contents());
	}

	public function getRemoveitem($identifier){

		$item= Cart::item($identifier);
		$item->remove();

		return Redirect::to('store/cart');

	}
}