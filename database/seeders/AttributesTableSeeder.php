<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attributes')->delete();
        
        \DB::table('attributes')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'تعداد اتاق',
                'frontend_type' => 'select',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:35:03',
                'updated_at' => '2022-05-11 09:35:03',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'اعلان دهندگان',
                'frontend_type' => 'select',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:35:34',
                'updated_at' => '2022-05-11 09:35:34',
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'مساحت',
                'frontend_type' => 'text',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:35:45',
                'updated_at' => '2022-05-11 09:35:45',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'کمپنی',
                'frontend_type' => 'text',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:39:10',
                'updated_at' => '2022-05-11 09:39:10',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'مدل',
                'frontend_type' => 'text',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:39:17',
                'updated_at' => '2022-05-11 09:39:17',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'رنگ',
                'frontend_type' => 'text',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:39:24',
                'updated_at' => '2022-05-11 10:06:06',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'آپشن',
                'frontend_type' => 'text',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:39:35',
                'updated_at' => '2022-05-11 09:39:35',
            ),
        ));
        
        
    }
}