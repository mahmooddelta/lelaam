<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attribute_values')->delete();
        
        \DB::table('attribute_values')->insert(array (
            0 => 
            array (
                'id' => 5,
                'attribute_id' => 4,
                'name' => 'یک اتاق',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:36:36',
                'updated_at' => '2022-05-11 09:36:36',
            ),
            1 => 
            array (
                'id' => 6,
                'attribute_id' => 4,
                'name' => 'دو اتاق',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:36:45',
                'updated_at' => '2022-05-11 09:36:45',
            ),
            2 => 
            array (
                'id' => 7,
                'attribute_id' => 4,
                'name' => 'سه اتاق',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:36:49',
                'updated_at' => '2022-05-11 09:36:49',
            ),
            3 => 
            array (
                'id' => 8,
                'attribute_id' => 4,
                'name' => 'چهار اتاق',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:36:56',
                'updated_at' => '2022-05-11 09:36:56',
            ),
            4 => 
            array (
                'id' => 9,
                'attribute_id' => 4,
                'name' => 'پنج اتاق',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:37:07',
                'updated_at' => '2022-05-11 09:37:07',
            ),
            5 => 
            array (
                'id' => 10,
                'attribute_id' => 4,
                'name' => 'شش یا بیشتر',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:37:18',
                'updated_at' => '2022-05-11 09:37:18',
            ),
            6 => 
            array (
                'id' => 11,
                'attribute_id' => 5,
                'name' => 'شخصی',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:37:30',
                'updated_at' => '2022-05-11 09:37:30',
            ),
            7 => 
            array (
                'id' => 12,
                'attribute_id' => 5,
                'name' => 'راهنمای معاملات',
                'is_active' => 1,
                'created_at' => '2022-05-11 09:37:37',
                'updated_at' => '2022-05-11 09:37:37',
            ),
        ));
        
        
    }
}