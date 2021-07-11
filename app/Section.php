<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Section extends Model
{
    public function categories(){
        return $this->hasMany(Category::class,'section_id')->where('parent_id',0)->with('subcategories');
    }
}
