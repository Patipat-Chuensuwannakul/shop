<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Product;
use App\Brand;
use App\Cart;
use Input;
use DB;
use Illuminate\Support\Facades\Response;
//use Illuminate\Http\Request;

class AjaxController extends Controller {

	public function getcart(){
		if(Request::ajax()){
			$input = Request::all();
			return DB::table('carts')
			    ->selectRaw('sum(quantity) as sum')
			    ->where('session', $input['session'])
			    ->lists('sum');
		}
	}

	public function store(){
		if(Request::ajax()){
			$input = Request::all();
			$session = $input['session'];
			$quantity = $input['quantity'];
			$pro_id = $input['pro_id'];
			// $sql =	"SELECT products.quantity
			// 				FROM carts
			// 				JOIN products
			// 				ON carts.pro_id = products.id
			// 				WHERE products.id = '$pro_id' AND carts.session LIKE '$session'
			// 				GROUP BY products.quantity";
			$sql = "SELECT quantity FROM products WHERE id = '$pro_id'";
			$output = DB::select($sql);
			// dd($input['quantity']);
			// dd($output);
			if($quantity>$output[0]->quantity){
				echo "<script>alert('Your input is over AND The number of product is ".$output[0]->quantity."    !!!');</script>";
				// return DB::table('carts')
			 	//    ->selectRaw('sum(quantity) as sum')
			 	//    ->where('session', $input['session'])
			 	//    ->lists('sum');
				$sql = "SELECT sum(quantity) AS sum FROM carts WHERE session = '$session'";
				$output = DB::select($sql);
				print_r($output[0]->sum);
			}else{
			// dd($input['quantity']);
				Cart::create($input);
				return DB::table('carts')
				    ->selectRaw('sum(quantity) as sum')
				    ->where('session', $input['session'])
				    ->lists('sum');
			}
		}
	}

	public  function getdata(){
		if(Request::ajax()){
			$data = Input::all();
	//		$retrieve = $data['id'];
			$retrieve = Product::where('id' , '=' , $data['id'])->get();
	//		print_r($retrieve);
			return Response::json($retrieve);
			die;
		}
	}


}
