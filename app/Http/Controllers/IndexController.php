<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Product;
use App\Brand;
use App\Cart;
use DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class IndexController extends Controller {

	public function getIndex(){
		$retrieve = Product::get();
		return view('shop.show_product' , compact('retrieve'));
	}
	public function getRegister(){
		return view('shop.register_new');
	}
	public function getAccount(){
		$user = Auth::user()->id;
		$data = "SELECT * FROM users WHERE id = '$user'";
		$data_user = DB::select($data);
		// compact('data_user');
		// return ['data_user'][0]['id'];
		// return $data_user->name;
		// $retrieve = Response::json($data_user);
	    // return compact('data_user');
	    // return $data_user['data_user']['id'];
	    // return view('shop.account' , ['data' => $data_user->pro_name]);
	    return view('shop.account' , compact('data_user'));
		// return view('shop.account')->with('data_user');
		// return view('shop.account' , ['retrieve' => $data_user->name]);
	}
	public function getCheckout($session){
		$data1 ="SELECT carts.id , carts.pro_id , carts.quantity , carts.created_at , products.pro_name , products.price , carts.size , brands.brand_name
						FROM `carts`
						LEFT JOIN products
						ON carts.pro_id = products.id
						JOIN brands ON products.brand_id = brands.id
						WHERE carts.session like '$session'";
		$data2 ="SELECT SUM((products.price)*(carts.quantity)) AS Total_price
						FROM `carts`
						LEFT JOIN products
						ON carts.pro_id = products.id
						JOIN brands ON products.brand_id = brands.id
						WHERE carts.session like '$session'";
		$data_carts = DB::select($data1);
		$total = DB::select($data2);
		// dd($total[0]->Total_price);
		// $data_carts[0]->id
		return view('shop.checkout' , compact('data_carts'))->with('total',$total[0]->Total_price);
	}
	public function getLogin(){
		return view('auth.login');
	}
	public function getLogout(){
		Auth::logout();
		return redirect('/index');
	}
}
//make_dialog.dialog
////		$retrieve = Cart::->leftJoin('products','')
/*		$retrieve = Cart::select('products.price','products.pro_name','carts.id','carts.session','carts.quantity','carts.size')->leftJoin('products',function($leftJoin)use($pro_id){
				$leftJoin->on('carts.pro_id', '=', 'products.id');
				$leftJoin->on(DB:raw('products.id'),DB::(raw('='),DB::raw("'.$pro_id.'")));
		});*/
//		$get = Product::get()->where('id','retrieve['pro_id']');
