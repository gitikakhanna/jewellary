<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Subcategories extends Model
{
    protected $fillable=[
    	'category_id', 'subcategory_name'
    ];
}
