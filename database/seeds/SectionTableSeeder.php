<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sec = [
            ['sec_title'=>'Men','sec_desc'=>'Men Clothing','status'=>1],
            ['sec_title'=>'Women','sec_desc'=>'Women Clothing','status'=>1],
            ['sec_title'=>'Kids','sec_desc'=>'Kids Clothing','status'=>1]
            
        ];

        foreach($sec as $s){
            \App\Section::create($s);
        }
    }
}
