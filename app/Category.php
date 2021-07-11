<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Section;
class Category extends Model
{
   public function sections(){
       return $this->belongsTo(Section::class,'section_id')->select('id','sec_title');
   }

    public function subcategories(){
        return $this->hasMany(Category::class,'parent_id')->where('status',1);
    }

    public function categories(){
        return $this->belongsTo(Category::class,'parent_id')->select('id','cat_title');
    }
}
