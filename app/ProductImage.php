<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_id','image','status','created_at','updated_at'];

    public function products(){
        return $this->belongsTo(Product::class,'product_id')->select('id','product_title','product_sku','product_color');
    }

}
