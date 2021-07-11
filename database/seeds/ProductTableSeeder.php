<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecord = [
            [
                'category_id'=>3,
                'section_id' => 1,
                'product_title' => 'Best Formal T-shirts for Men',
                'product_sku' => '9230013',
                'product_color' => 'red',
                'product_price' => 80,
                'product_discount' => 5,
                'product_weight'   => 5,
                'product_video'   => '',
                'product_image'   => 'no-image.png',
                'product_desc'   => 'This is best Formal Tshirts for men',
                'wash_care' => 'Yes Care',
                'fabric' => 'cotton',
                'pattern'  => 'simple',
                'sleeve'   => 'short sleeves',
                'fit'     => 'loose',
                'occassion'  => 'bussiness formal',
                'slug'  => 'best-formal-tshirts',
                'meta_title' => 'Best Formal T-shirts for Men',
                'meta_keywords' => 'Formal',
                'meta_desc' => 'Best formal t-shirts for men',
                'is_featured' => 'no',
                'status' => 1
            ],
            [
                'category_id'=>4,
                'section_id' => 2,
                'product_title' => 'Best Formal T-shirts for Women',
                'product_sku' => '9230013',
                'product_color' => 'red',
                'product_price' => 80,
                'product_discount' => 5,
                'product_weight'   => 200,
                'product_video'   => '',
                'product_image'   => 'no-image.png',
                'product_desc'   => 'This is best Formal Tshirts for women',
                'wash_care' => 'Yes Care',
                'fabric' => 'cotton',
                'pattern'  => 'simple',
                'sleeve'   => 'short sleeves',
                'fit'     => 'loose',
                'occassion'  => 'bussiness formal',
                'slug'  => 'best-formal-tshirts',
                'meta_title' => 'Best Formal T-shirts for Women',
                'meta_keywords' => 'Formal',
                'meta_desc' => 'Best formal t-shirts for Women',
                'is_featured' => 'yes',
                'status' => 1
            ]
        ];


        \App\Product::insert($productRecord);
    }
}
