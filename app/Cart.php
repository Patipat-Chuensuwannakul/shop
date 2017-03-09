<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
	protected $fillable = ['pro_id' , 'quantity' , 'size' , 'session'];
	//

}
