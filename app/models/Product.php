<?php

class Product extends Eloquent {
	
	protected $table = 'product';

    protected $fillable = array('category_id','product_name', 'description','slug','image','price','availability','isFeatured');

    public static $rules = array(
    	'category_id'=>'required|integer',
    	'product_name'=>'required|min:5',
    	'description'=>'required|min:10',
    	'price'=>'required|numeric',
    	'isFeatured'=>'required',
    	'availability'=>'integer',
    	'image'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
    	);

    public function category(){
    	return $this->belongsTo('Category');
    }

    public function reviews()
    {
        return $this->hasMany('Review');
    }

/*    public function recalculateRating($rating)
    {
        $reviews = $this->reviews()->notSpam()->approved();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating,1);
        $this->rating_count = $reviews->count();
        $this->save();
    }
*/
}