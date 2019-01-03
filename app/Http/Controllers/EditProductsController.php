<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use DateTime;
use App\Subcategories;
use App\Categories;

class EditProductsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$products = DB::table('products')->get();
    	return view('show-products', compact('products'));
    }

    public function remove($productcode)
    {
    	dd($productcode);
    }

    public function edit($productcode)
    {
        $product = DB::table('products')->where('product_code', $productcode)->first();
        $subcategories = DB::table('subcategories')->where('category_id', $product->category)->get();
        $metalinfo = DB::table('metalinfo')->where('product_code', $productcode)->first();
        $otherinfo = DB::table('otherinfo')->where('product_code', $productcode)->first();
        $pricedesc = DB::table('pricedesc')->where('product_code', $productcode)->first();
        $productdimension = DB::table('productdimension')->where('product_code', $productcode)->first();

        return view('edit-product', compact('product', 'subcategories', 'metalinfo', 'otherinfo', 'pricedesc', 'productdimension'));
    }
    public function update(Request $request, $productcode)
    {
        dd($productcode);
    }
}
