<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Section;
use App\ProductAttribute;
class Product extends Model
{
    protected $guard = [];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id')->where('status',1);
    }

    public function sections(){
        return $this->belongsTo(Section::class,'section_id');
    }

    public function attributes(){
         return $this->hasMany(ProductAttribute::class);
    }
    public function images(){
        return $this->hasMany(\App\ProductImage::class);
    }
}
