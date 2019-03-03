<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Product extends Model
{
    
    public $guarded = [];

    public function category(){
    	return $this->hasOne(Category::class);
    }
=======
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
	use HasMediaTrait;

    public $guarded = [];

    protected static function boot(){
    	parent::boot();

    	static::creating(function($product){
    		$product->slug = str_slug($product->title);
    	});
    }

    public function category()
    {
    	return $this->hasOne(Category::class);
    }

>>>>>>> hasan-dev
}
