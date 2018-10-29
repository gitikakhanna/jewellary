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

    public function remove()
    {
    	dd('hey');
    }
}
