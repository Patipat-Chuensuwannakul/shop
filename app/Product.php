<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $fillable = ['pro_name' , 'detail' , 'price' , 'quantity' , 'brand_id' , 'images' ];
	public function brands(){
		return $this->belongsTo('App\Brand');
	}

	public function images(){
		return $this->hasMany('App\Image');
	}
}
