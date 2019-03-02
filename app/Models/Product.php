<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public $guarded = [];

    public function category(){
    	return $this->hasOne(Category::class);
    }
}
