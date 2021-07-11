<?php

use Illuminate\Database\Seeder;
use App\ProductAttribute;
class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productData = [
            ['id'=>1,'product_id'=>2,'size'=>'medium','price'=>120,'stock'=>200,'sku'=>'abc123','status'=>1],
            ['id'=>2,'product_id'=>3,'size'=>'small','price'=>110,'stock'=>190,'sku'=>'abc122','status'=>1],
            ['id'=>3,'product_id'=>4,'size'=>'large','price'=>90,'stock'=>150,'sku'=>'abc123','status'=>1]
        ];


        ProductAttribute::insert($productData);



    }
}
