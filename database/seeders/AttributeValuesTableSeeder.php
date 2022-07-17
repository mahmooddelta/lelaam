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

        \DB::table('attribute_values')->insert([
            0 =>
                [
                    'id' => 1,
                    'attribute_id' => 1,
                    'name' => 'یک اتاق',
                    'is_active' => 1,
                    'created_at' => '2022-05-11 09:36:36',
                    'updated_at' => '2022-05-11 09:36:36',
                ],
            1 =>
                [
                    'id' => 2,
                    'attribute_id' => 1,
                    'name' => 'دو اتاق',
                    'is_active' => 1,
                    'created_at' => '2022-05-11 09:36:45',
                    'updated_at' => '2022-05-11 09:36:45',
                ],
            2 =>
                [
                    'id' => 3,
                    'attribute_id' => 1,
                    'name' => 'سه اتاق',
                    'is_active' => 1,
                    'created_at' => '2022-05-11 09:36:49',
                    'updated_at' => '2022-05-11 09:36:49',
                ],
            3 =>
                [
                    'id' => 4,
                    'attribute_id' => 1,
                    'name' => 'چهار اتاق',
                    'is_active' => 1,
                    'created_at' => '2022-05-11 09:36:56',
                    'updated_at' => '2022-05-11 09:36:56',
                ],
            4 =>
                [
                    'id' => 5,
                    'attribute_id' => 1,
                    'name' => 'پنج اتاق',
                    'is_active' => 1,
                    'created_at' => '2022-05-11 09:37:07',
                    'updated_at' => '2022-05-11 09:37:07',
                ],
            5 =>
                [
                    'id' => 6,
                    'attribute_id' => 1,
                    'name' => 'شش یا بیشتر',
                    'is_active' => 1,
                    'created_at' => '2022-05-11 09:37:18',
                    'updated_at' => '2022-05-11 09:37:18',
                ],
            6 =>
                [
                    'id' => 7,
                    'attribute_id' => 8,
                    'name' => 'شخصی',
                    'is_active' => 1,
                    'created_at' => '2022-05-11 09:37:30',
                    'updated_at' => '2022-05-11 09:37:30',
                ],
            7 =>
                [
                    'id' => 8,
                    'attribute_id' => 8,
                    'name' => 'راهنمای معاملات',
                    'is_active' => 1,
                    'created_at' => '2022-05-11 09:37:37',
                    'updated_at' => '2022-05-11 09:37:37',
                ],
        ]);

    }
}
