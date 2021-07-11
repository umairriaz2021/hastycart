<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecord = [
            [
                'name' => 'Umair Riaz',
                
                'password' => bcrypt('admin123'),
                'email' => 'umair@gmail.com',
                'type' => 'super admin',
                'mobile' => 4211012
            ],
            [
                'name' => 'Khurram Riaz',
                
                'password' => bcrypt('admin123'),
                'email' => 'khurram@gmail.com',
                'type' => 'admin',
                'mobile' => 4211012
            ],
            [
                'name' => 'Farrukh Riaz',
                
                'password' => bcrypt('admin123'),
                'email' => 'farrukh@gmail.com',
                'type' => 'customer',
                'mobile' => 4211012
            ],
            [
                'name' => 'Ahmer Riaz',
                
                'password' => bcrypt('admin123'),
                'email' => 'ahmer@gmail.com',
                'type' => 'subscriber',
                'mobile' => 4211012
            ]
        ];

        foreach($adminRecord as $record){
            \App\Admin::create($record);
        }
    }
}
