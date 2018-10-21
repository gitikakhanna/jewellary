<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;
use App\Subcategories;
use App\Categories;

class ProductsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$categories = Categories::all();
    	return view('add-products', compact('categories'));
    }
    public function store(Request $request)
    {	
    	$invalid = $this->storeValidator($request);
    	if(!empty($invalid))
    	{
    		$request->session()->flash('flashFailure', $invalid);
    		return redirect()->back()->withInput($request->input());
    	}
    	$this->storeAction($request);
    	return redirect()->back();
    }
    protected function storeValidator($data)
    {
    	$data->validate([
    		'product_name' => 'required|string' 
    	]);
    	return NULL;
    }
    protected function storeAction($data)
    {
    	$rand_product_code = $data->category." ".mt_rand(0, 10000);
    	DB::table('products')->insert([
    		'category' => $data->category,
    		'subcategory' => $data->subcategory,
    		'product_code' => $rand_product_code,
    		'product_name' => $data->product_name,
    		'price'=> $data->price,
    		'discount' => $data->discount,
    		'description' => $data->description,
    		'item_package_qty' => $data->package_qty,
    		'gender' => $data->gender,
    		'image' => 'no image',
    		'availability' => $data->availability,
    		'created_at'=>now(),
    		'updated_at' => now(),
    	]);
    	DB::table('productdimension')->insert([
    		'product_code'=>$rand_product_code,
    		'width'=>$data->width,
    		'height'=>$data->height,
    		'weight'=>$data->weight,
    		'created_at'=>now(),
    		'updated_at' => now(),
    	]);
    	DB::table('metalinfo')->insert([
    		'product_code'=>$rand_product_code,
    		'metal_type'=>$data->metal_type,
    		'metal_weight'=>$data->metal_weight,
    		'color'=>$data->metal_color,
    		'clarity'=>$data->metal_clarity,
    		'created_at'=>now(),
    		'updated_at' => now(),
    	]);
		DB::table('pricedesc')->insert([
    		'product_code'=>$rand_product_code,
    		'metal'=>$data->metal_charges,
    		'making'=>$data->making_charges,
    		'tax'=>$data->tax_charges,
    		'created_at'=>now(),
    		'updated_at' => now(),
    	]);
		DB::table('otherinfo')->insert([
    		'product_code'=>$rand_product_code,
    		'wearing_style'=>$data->wearing_style,
    		'occasion'=>$data->occassion,
    		'theme'=>$data->theme,
    		'featured'=>$data->featured,
    		'created_at'=>now(),
    		'updated_at' => now(),
    	]);


    }
}
