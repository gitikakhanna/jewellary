<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Categories extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = ['name'];
}
