<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
         //$this->call(AdminTableSeeder::class);
        //  $this->call(ProductTableSeeder::class);
        //  $this->call(ProductAttributeSeeder::class);
        //  $this->call(ProductImageSeeder::class);
         $this->call(BrandSeederTable::class);
    }
}
