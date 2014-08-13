<?php

class Category extends Eloquent {
	
	protected $table = 'product_category';
	protected $fillable = array('category_name');

	// public static $rules = array('id'=>'required|minimum:6','name'=>'required|minimum:5');
	public static $rules = array('category_name'=>'required|min:5');

	public function products(){

		return $this->hasMany('Product');
	}
}