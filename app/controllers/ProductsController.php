<?php

class ProductsController extends BaseController {

	public function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex()
	{
		$categories = array();

		foreach (Category::all() as $category) {
			$categories[$category->id] = $category->category_name;
		}

	// ==================== WORKING ====================
		return View::make('products.index', [
			'products' => Product::orderBy('created_at', 'desc')
			->paginate(3)
			], compact('categories'));
	// ==================== END ====================

		// $products = Product::orderBy('created_at', 'desc')->paginate(2);

		// return View::make('products.index',array('products'=>$products, 'product_category'=>$categories));

	}

	public function postCreate(){
		$validator = Validator::make(Input::all(), Product::$rules);

		if($validator->passes()){
			$product = new Product;			
			$product->id = Input::get('id');
			$product->product_name = Input::get('product_name');
			$product->isFeatured = Input::get('isFeatured');
			$product->category_id = Input::get('category_id');
			//$product->availability = Input::get('availability');
			
			$product->price = Input::get('price');
			$product->slug =Str::slug($product->product_name);			
			$product->description = Input::get('description');

	// ==================== For image uploading and resizing ====================
			$image = Input::file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/products/' . $filename);
            Image::make($image->getRealPath())->resize(468, 249)->save($path);
            $product->image = 'images/products/'.$filename;

		// ==================== Code from Tutorial====================
			// $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
			// Image::make($image->getRealPath())->resize(468,249)->save('public/images/products/'.$filename);
			// $product->image = 'images/products/'.$filename;
		// ==================== END ====================

			$product-> save();

			return Redirect::to('admin/products')
			->with('uploaded_message','New Product Uploaded');
		}
		return Redirect::to('admin/products')
			->with('message','Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy(){
		$product = Product::find(Input::get('id'));
		
		if($product){
		   File::delete('public/'.$product->image);
		   $product->delete();
		   return Redirect::to('admin/products')
			->with('message','Product deleted');
		}

		return Redirect::to('admin/products')
			->with('message','Something went wrong, please try again.');
	}

	// public function postToggleAvailability(){
	// 	$product = Product::find(Input::get('id'));	

	// 	if($product){

	// 		$product->availability = Input::get('availability');
	// 		$product-> save();

	// 		return Redirect::to('admin/products')
	// 		->with('message','Product Updated');
	// 	}
	// 	return Redirect::to('admin/products')
	// 		->with('message','Invalid Product');
	// }

	public function postEdit(){
		$product = Product::find(Input::get('id'));	

		if($product){

			$product->availability = Input::get('availability');
			$product->isFeatured = Input::get('isFeatured');
			$product->product_name = Input::get('product_name');			
			$product->price = Input::get('price');
			$product->slug = Input::get('slug');
			$product->description = Input::get('description');

			$product-> save();

			return Redirect::to('admin/products')
			->with('updated_message','Product Updated');
		}
		return Redirect::to('admin/products')
			->with('message','Invalid Product');
	}

}