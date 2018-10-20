<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable=[
    	'category', 'subcategory', 'product_code', 'product_name', 'price', 'discount', 'description', 'item_package_qty', 'gender' 
    ];
}
