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

        \DB::table('attribute_category')->insert([
            0 =>
                [
                    'id' => 1,
                    'category_id' => 1,
                    'attribute_id' => 1,
                ],
            1 =>
                [
                    'id' => 2,
                    'category_id' => 10,
                    'attribute_id' => 1,
                ],
            2 =>
                [
                    'id' => 3,
                    'category_id' => 11,
                    'attribute_id' => 1,
                ],
            3 =>
                [
                    'id' => 4,
                    'category_id' => 12,
                    'attribute_id' => 1,
                ],
            4 =>
                [
                    'id' => 5,
                    'category_id' => 13,
                    'attribute_id' => 1,
                ],
            5 =>
                [
                    'id' => 6,
                    'category_id' => 14,
                    'attribute_id' => 1,
                ],
            6 =>
                [
                    'id' => 7,
                    'category_id' => 15,
                    'attribute_id' => 3,
                ],
            7 =>
                [
                    'id' => 8,
                    'category_id' => 15,
                    'attribute_id' => 4,
                ],
            8 =>
                [
                    'id' => 9,
                    'category_id' => 15,
                    'attribute_id' => 5,
                ],
            9 =>
                [
                    'id' => 10,
                    'category_id' => 15,
                    'attribute_id' => 6,
                ],
            10 =>
                [
                    'id' => 11,
                    'category_id' => 1,
                    'attribute_id' => 2,
                ],
            11 =>
                [
                    'id' => 12,
                    'category_id' => 10,
                    'attribute_id' => 2,
                ],
            12 =>
                [
                    'id' => 13,
                    'category_id' => 11,
                    'attribute_id' => 2,
                ],
            13 =>
                [
                    'id' => 14,
                    'category_id' => 12,
                    'attribute_id' => 2,
                ],
            14 =>
                [
                    'id' => 15,
                    'category_id' => 13,
                    'attribute_id' => 2,
                ],
            15 =>
                [
                    'id' => 16,
                    'category_id' => 14,
                    'attribute_id' => 2,
                ],
            16 =>
                [
                    'id' => 17,
                    'category_id' => 1,
                    'attribute_id' => 7,
                ],
            17 =>
                [
                    'id' => 18,
                    'category_id' => 10,
                    'attribute_id' => 7,
                ],
            18 =>
                [
                    'id' => 19,
                    'category_id' => 11,
                    'attribute_id' => 7,
                ],
            19 =>
                [
                    'id' => 20,
                    'category_id' => 12,
                    'attribute_id' => 7,
                ],
            20 =>
                [
                    'id' => 21,
                    'category_id' => 13,
                    'attribute_id' => 7,
                ],
            21 =>
                [
                    'id' => 22,
                    'category_id' => 14,
                    'attribute_id' => 7,
                ],
            22 =>
                [
                    'id' => 23,
                    'category_id' => 1,
                    'attribute_id' => 8,
                ],
            23 =>
                [
                    'id' => 24,
                    'category_id' => 10,
                    'attribute_id' => 8,
                ],
            24 =>
                [
                    'id' => 25,
                    'category_id' => 11,
                    'attribute_id' => 8,
                ],
            25 =>
                [
                    'id' => 26,
                    'category_id' => 12,
                    'attribute_id' => 8,
                ],
            26 =>
                [
                    'id' => 27,
                    'category_id' => 13,
                    'attribute_id' => 8,
                ],
            27 =>
                [
                    'id' => 28,
                    'category_id' => 14,
                    'attribute_id' => 8,
                ],
            28 =>
                [
                    'id' => 29,
                    'category_id' => 5,
                    'attribute_id' => 9,
                ],
            29 =>
                [
                    'id' => 30,
                    'category_id' => 27,
                    'attribute_id' => 9,
                ],
            30 =>
                [
                    'id' => 31,
                    'category_id' => 28,
                    'attribute_id' => 9,
                ],
            31 =>
                [
                    'id' => 32,
                    'category_id' => 29,
                    'attribute_id' => 9,
                ],
            32 =>
                [
                    'id' => 33,
                    'category_id' => 30,
                    'attribute_id' => 9,
                ],
            33 =>
                [
                    'id' => 34,
                    'category_id' => 31,
                    'attribute_id' => 9,
                ],
            34 =>
                [
                    'id' => 35,
                    'category_id' => 32,
                    'attribute_id' => 9,
                ],
            35 =>
                [
                    'id' => 77,
                    'category_id' => 33,
                    'attribute_id' => 1,
                ],
            36 =>
                [
                    'id' => 78,
                    'category_id' => 33,
                    'attribute_id' => 2,
                ],
            37 =>
                [
                    'id' => 79,
                    'category_id' => 33,
                    'attribute_id' => 7,
                ],
            38 =>
                [
                    'id' => 80,
                    'category_id' => 33,
                    'attribute_id' => 8,
                ],
            39 =>
                [
                    'id' => 91,
                    'category_id' => 44,
                    'attribute_id' => 9,
                ],
        ]);

    }
}
