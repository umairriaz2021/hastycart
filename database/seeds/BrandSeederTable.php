<?php

use Illuminate\Database\Seeder;

class BrandSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['id'=>1,'name'=>'levis','status'=>1],
            ['id'=>2,'name'=>'safinas','status'=>1],
            ['id'=>3,'name'=>'gul ahmed','status'=>1]
        ];
    
        foreach($brands as $brnd){
            \App\Brand::create($brnd);
        }
    
    }
}
