<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;
use App\Categories;

class CategoriesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	
    	return view('add-category');
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
    		'category_name' => 'required|string' 
    	]);
    	return NULL;
    }

    protected function storeAction($data)
    {
    	DB::table('categories')->insert([
    		'name'=>$data->category_name,
    		'created_at'=>now(),
    		'updated_at'=>now(),
    	]);
    }
}
