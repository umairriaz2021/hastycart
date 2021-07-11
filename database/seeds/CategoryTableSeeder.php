<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
            'section_id'=>1,
            'parent_id'=>0,
            'cat_title'=>'T-shirts',
            'cat_desc'=>'Best T-shirts',
            'image' => 'no-image.png',
            'meta_title' => 'T-shirts',
            'meta_desc' => 'Best T-shirts',
            'meta_key' => 'Tshirts',
            'slug' => 'categories/t-shirts',
            'status' => 1
            ],
            [
                'section_id'=>1,
                'parent_id'=>1,
                'cat_title'=>'Casual t-shirts',
                'cat_desc'=>'Best Casual T-shirts',
                'image' => 'no-image.png',
                'meta_title' => 'Casual Tshirts',
                'meta_desc' => 'Best Casual T-shirts',
                'meta_key' => 'Casual Tshirts',
                'slug' => 'categories/casual-tshirts',
                'status' => 1
            ]
        ];

        foreach($category as $cat){
            \App\Category::create($cat);
        }
    }
}
