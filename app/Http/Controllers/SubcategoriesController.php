<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;
use App\Subcategories;
use App\Categories;

class SubcategoriesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$allcategories = Categories::all();
    	$allsubcategories = Subcategories::all();
    	return view('add-subcategory', compact('allcategories', 'allsubcategories'));
    }

    protected function store(Request $request)
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
    		'subcategory_name' => 'required|string' 
    	]);
    }

    protected function storeAction($data)
    {
    	Subcategories::insert([
    		'category_id' => $data->category,
			'subcategory_name' => $data->subcategory_name,
			'created_at' => now(),
			'updated_at' => now()
    	]);
    }

    protected function edit(Request $request)
    {   
        $invalid = $this->editValidator($request);
        if(!empty($invalid))
        {
            $request->session()->flash('flashFailure', $invalid);
            return redirect()->back()->withInput($request->input());
        }
        $this->editAction($request);
        return redirect()->back();
    }

    protected function editValidator($data)
    {
        $data->validate([
            'editsubcatname' => 'required|string' 
        ]);   
    }

    protected function editAction($data)
    {
        Subcategories::where('id', $data->editsubcatid)->update(['subcategory_name' => $data->editsubcatname]);
    }

    //validate unique condition missing for sub category...add it after
}
