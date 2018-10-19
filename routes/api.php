<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/category/add-subcategory/add', function(Request $request){
	DB::table('subcategories')->insert([
			'category_id' => $request->category,
			'subcategory_name' => $request->subcategory,
			'created_at' => now(),
			'updated_at' => now()
	]);
	return 'hey';
});
