<?php

class CategoriesController extends BaseController {

	public function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex()
	{
		return View::make('categories.index');
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(), Category::$rules);

		if($validator->passes()){
			$category = new Category;
			$category->category_name = Input::get('category_name');
			//$category->id = Input::get('id');
			$category-> save();

			return Redirect::to('admin/categories')
			->with('category_message','New Category Created');
		}
		return Redirect::to('admin/categories')
			->with('message','Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy(){
		$category = Category::find(Input::get('id'));
		
		if($category){
			$category->delete();
		   return Redirect::to('admin/categories')
			->with('category_deleted_message','Category deleted');
		}

		return Redirect::to('admin/categories')
			->with('message','Something went wrong, please try again.');
	}
}