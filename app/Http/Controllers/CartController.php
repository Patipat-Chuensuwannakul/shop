<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cart;
use Input;
use Request;
use DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {

	public function update($id)
	{	
		$data = Input::all();
		$sql ="SELECT products.quantity
						FROM `carts`
						LEFT JOIN products
						ON carts.pro_id = products.id
						JOIN brands ON products.brand_id = brands.id
						WHERE carts.id='$id'";
		$output = DB::select($sql);
		// dd($data['quantity']);
		// dd($output[0]->quantity);
		if($data['quantity']>$output[0]->quantity){
			echo "<script>alert('Your input is over !!!');</script>";
			return redirect('index/checkout/'.Auth::user()->name);
		}else{
			$cart = Cart::findOrFail($id);
			$cart->update($data);
			return redirect('index/checkout/'.Auth::user()->name);
		}
	}
	public function destroy($id)
	{
		$cart = Cart::findOrFail($id);
		$cart->delete();
		return redirect('index/checkout/'.Auth::user()->name);
	}

}
