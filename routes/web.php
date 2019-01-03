<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// routes for add category
Route::get('/add-category', 'CategoriesController@index');
Route::post('/add-category/add', 'CategoriesController@store');
Route::post('/add-category/edit', 'CategoriesController@edit');

// routes for sub category
Route::get('/category/add-subcategory', 'SubcategoriesController@index');
Route::post('/category/add-subcategory/add', 'SubcategoriesController@store');
Route::post('/category/add-subcategory/edit', 'SubcategoriesController@edit');

//routes for add products
Route::get('/add-products', 'ProductsController@index');
Route::post('/save-product', 'ProductsController@store');

//routes for show products
Route::get('/show-products', 'EditProductsController@index');
Route::get('/show-products/remove/{productcode}', 'EditProductsController@remove');
Route::get('/show-products/edit/{productcode}', 'EditProductsController@edit');
Route::get('/update-product/{productcode}', 'EditProductsController@update');