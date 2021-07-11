<?php

use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => 1,
            'product_id' => 2,
            'image' => 'no-image.png',
            'status' => 1
        ];

        \App\ProductImage::insert($data);
    }
}
