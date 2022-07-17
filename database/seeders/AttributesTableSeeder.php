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

        \DB::table('attributes')->insert([
            0 =>
                [
                    'id' => 1,
                    'name' => 'تعداد اتاق',
                    'frontend_type' => 'text',
                    'is_active' => 1,
                    'created_at' => '2022-06-29 14:28:40',
                    'updated_at' => '2022-06-29 15:14:27',
                ],
            1 =>
                [
                    'id' => 2,
                    'name' => 'مساحت',
                    'frontend_type' => 'text',
                    'is_active' => 1,
                    'created_at' => '2022-06-29 14:28:40',
                    'updated_at' => '2022-06-29 15:14:36',
                ],
            2 =>
                [
                    'id' => 3,
                    'name' => 'کمپنی',
                    'frontend_type' => 'text',
                    'is_active' => 1,
                    'created_at' => '2022-06-29 14:28:40',
                    'updated_at' => '2022-06-29 15:14:45',
                ],
            3 =>
                [
                    'id' => 4,
                    'name' => 'مدل',
                    'frontend_type' => 'text',
                    'is_active' => 1,
                    'created_at' => '2022-06-29 14:28:40',
                    'updated_at' => '2022-06-29 15:14:52',
                ],
            4 =>
                [
                    'id' => 5,
                    'name' => 'آپشن',
                    'frontend_type' => 'text',
                    'is_active' => 1,
                    'created_at' => '2022-06-29 14:28:40',
                    'updated_at' => '2022-06-29 15:14:59',
                ],
            5 =>
                [
                    'id' => 6,
                    'name' => 'رنگ',
                    'frontend_type' => 'text',
                    'is_active' => 1,
                    'created_at' => '2022-06-29 14:28:40',
                    'updated_at' => '2022-06-29 15:15:07',
                ],
            6 =>
                [
                    'id' => 7,
                    'name' => 'نوع اعلان',
                    'frontend_type' => 'select',
                    'is_active' => 1,
                    'created_at' => '2022-06-29 14:28:40',
                    'updated_at' => '2022-06-29 15:16:26',
                ],
            7 =>
                [
                    'id' => 8,
                    'name' => 'اعلان دهندگان',
                    'frontend_type' => 'select',
                    'is_active' => 1,
                    'created_at' => '2022-06-29 14:28:40',
                    'updated_at' => '2022-06-29 15:15:37',
                ],
            8 =>
                [
                    'id' => 9,
                    'name' => 'نوع اعلان',
                    'frontend_type' => 'select',
                    'is_active' => 1,
                    'created_at' => '2022-06-29 14:28:40',
                    'updated_at' => '2022-06-29 15:15:51',
                ],
        ]);

    }
}
