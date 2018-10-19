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
    	return view('add-subcategory', compact('allcategories'));
    }
}
