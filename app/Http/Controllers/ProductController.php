<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Product;
use App\Brand;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller {

	public function index()
	{
		$retrieve = Product::get();
		return view('products.index' , compact('retrieve'));
	}

	public function create()
	{
		$retrieve = Brand::get()->lists('brand_name','id');
		return view('products.create' , compact('retrieve'));
	}

	public function store(ProductRequest $request)
	{
		$retrieve = new Product($request->all());
		if($request->hasFile('images')){
			$image_filename = $request->file('images')->getClientOriginalName();
			$image_name = date("Ymd-His-").$image_filename;
			$public_path = 'images/products/';
			$destination = base_path()."/public/".$public_path;
			$request->file('images')->move($destination,$image_name);
			$retrieve->images = $public_path.$image_name;
			$retrieve->save();
		}
//		Product::create($retrieve);
		return redirect('products');
	}

	public function edit($id)
	{
		$retrieve = Product::find($id);
		if(empty($retrieve))
			abort(404);
		return view('products.edit' , compact('retrieve'));
	}

	public function update($id , ProductRequest $request)
	{
		$retrieve = Product::findOrFail($id);
		$retrieve->update($request->all());
		if($request->hasFile('image')){
			$image_filename = $request->file('image')->getClientOriginalName();
			$image_name = date("Ymd-His-").$image_filename;
			$public_path = 'images/articles/';
			$destination = base_path()."/public/".$public_path;
			$request->file('image')->move($destination,$image_name);
			$retrieve->image = $public_path.$image_name;
			$retrieve->save();
		}
		return redirect('products');
	}

	public function destroy($id)
	{
		$retrieve = Product::findOrFail($id);
		$retrieve->delete();
		return redirect('products');
	}

}
