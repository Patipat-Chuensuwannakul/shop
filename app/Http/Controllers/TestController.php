<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Input;
//use Illuminate\Http\Request;

class TestController extends Controller {

/*	public function index(){
		return view('make_dialog.dialog');
	}	*/

/*	public function test(Illuminate\Http\Request $request){
		if ($request->isMethod('post')){
            return Response::json(['response' => 'This is post method']); 

        }

    //    return response()->json(['response' => 'This is get method']);
	}			*/

	public function index(){
		return view('shop.show_product' , compact('retrieve'));
	}

	public  function getdata(){
		if(Request::ajax()){
			$data = Input::all();
			print_r($data);
			die;
		}
	}
}
