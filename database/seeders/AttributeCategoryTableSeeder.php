<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttributeCategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attribute_category')->delete();
        
        \DB::table('attribute_category')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'attribute_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 10,
                'attribute_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 11,
                'attribute_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 12,
                'attribute_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 13,
                'attribute_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 14,
                'attribute_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 15,
                'attribute_id' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 15,
                'attribute_id' => 4,
            ),
            8 => 
            array (
                'id' => 9,
                'category_id' => 15,
                'attribute_id' => 5,
            ),
            9 => 
            array (
                'id' => 10,
                'category_id' => 15,
                'attribute_id' => 6,
            ),
            10 => 
            array (
                'id' => 11,
                'category_id' => 1,
                'attribute_id' => 2,
            ),
            11 => 
            array (
                'id' => 12,
                'category_id' => 10,
                'attribute_id' => 2,
            ),
            12 => 
            array (
                'id' => 13,
                'category_id' => 11,
                'attribute_id' => 2,
            ),
            13 => 
            array (
                'id' => 14,
                'category_id' => 12,
                'attribute_id' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'category_id' => 13,
                'attribute_id' => 2,
            ),
            15 => 
            array (
                'id' => 16,
                'category_id' => 14,
                'attribute_id' => 2,
            ),
            16 => 
            array (
                'id' => 17,
                'category_id' => 1,
                'attribute_id' => 7,
            ),
            17 => 
            array (
                'id' => 18,
                'category_id' => 10,
                'attribute_id' => 7,
            ),
            18 => 
            array (
                'id' => 19,
                'category_id' => 11,
                'attribute_id' => 7,
            ),
            19 => 
            array (
                'id' => 20,
                'category_id' => 12,
                'attribute_id' => 7,
            ),
            20 => 
            array (
                'id' => 21,
                'category_id' => 13,
                'attribute_id' => 7,
            ),
            21 => 
            array (
                'id' => 22,
                'category_id' => 14,
                'attribute_id' => 7,
            ),
            22 => 
            array (
                'id' => 23,
                'category_id' => 1,
                'attribute_id' => 8,
            ),
            23 => 
            array (
                'id' => 24,
                'category_id' => 10,
                'attribute_id' => 8,
            ),
            24 => 
            array (
                'id' => 25,
                'category_id' => 11,
                'attribute_id' => 8,
            ),
            25 => 
            array (
                'id' => 26,
                'category_id' => 12,
                'attribute_id' => 8,
            ),
            26 => 
            array (
                'id' => 27,
                'category_id' => 13,
                'attribute_id' => 8,
            ),
            27 => 
            array (
                'id' => 28,
                'category_id' => 14,
                'attribute_id' => 8,
            ),
            28 => 
            array (
                'id' => 29,
                'category_id' => 5,
                'attribute_id' => 9,
            ),
            29 => 
            array (
                'id' => 30,
                'category_id' => 27,
                'attribute_id' => 9,
            ),
            30 => 
            array (
                'id' => 31,
                'category_id' => 28,
                'attribute_id' => 9,
            ),
            31 => 
            array (
                'id' => 32,
                'category_id' => 29,
                'attribute_id' => 9,
            ),
            32 => 
            array (
                'id' => 33,
                'category_id' => 30,
                'attribute_id' => 9,
            ),
            33 => 
            array (
                'id' => 34,
                'category_id' => 31,
                'attribute_id' => 9,
            ),
            34 => 
            array (
                'id' => 35,
                'category_id' => 32,
                'attribute_id' => 9,
            ),
            35 => 
            array (
                'id' => 77,
                'category_id' => 33,
                'attribute_id' => 1,
            ),
            36 => 
            array (
                'id' => 78,
                'category_id' => 33,
                'attribute_id' => 2,
            ),
            37 => 
            array (
                'id' => 79,
                'category_id' => 33,
                'attribute_id' => 7,
            ),
            38 => 
            array (
                'id' => 80,
                'category_id' => 33,
                'attribute_id' => 8,
            ),
            39 => 
            array (
                'id' => 91,
                'category_id' => 44,
                'attribute_id' => 9,
            ),
        ));
        
        
    }
}