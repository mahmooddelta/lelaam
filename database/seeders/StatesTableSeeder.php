<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_id' => 1,
                'name' => 'کابل',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            1 => 
            array (
                'id' => 2,
                'country_id' => 1,
                'name' => 'هرات',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            2 => 
            array (
                'id' => 3,
                'country_id' => 1,
                'name' => 'قندهار',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            3 => 
            array (
                'id' => 4,
                'country_id' => 1,
                'name' => 'بامیان',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            4 => 
            array (
                'id' => 5,
                'country_id' => 1,
                'name' => 'مزارشریف',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            5 => 
            array (
                'id' => 6,
                'country_id' => 1,
                'name' => 'ننگرهار',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            6 => 
            array (
                'id' => 7,
                'country_id' => 1,
                'name' => 'غور',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            7 => 
            array (
                'id' => 8,
                'country_id' => 1,
                'name' => 'لغمان',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            8 => 
            array (
                'id' => 9,
                'country_id' => 1,
                'name' => 'کندوز',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            9 => 
            array (
                'id' => 10,
                'country_id' => 1,
                'name' => 'زابل',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            10 => 
            array (
                'id' => 11,
                'country_id' => 1,
                'name' => 'بغلان',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            11 => 
            array (
                'id' => 12,
                'country_id' => 1,
                'name' => 'بدخشان',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            12 => 
            array (
                'id' => 13,
                'country_id' => 1,
                'name' => 'بادغیس',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            13 => 
            array (
                'id' => 14,
                'country_id' => 1,
                'name' => 'میدان وردک',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            14 => 
            array (
                'id' => 15,
                'country_id' => 1,
                'name' => 'لوگر',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            15 => 
            array (
                'id' => 16,
                'country_id' => 1,
                'name' => 'سمنگان',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            16 => 
            array (
                'id' => 17,
                'country_id' => 1,
                'name' => 'تخار',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            17 => 
            array (
                'id' => 18,
                'country_id' => 1,
                'name' => 'نورستان',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            18 => 
            array (
                'id' => 19,
                'country_id' => 1,
                'name' => 'فاریاب',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            19 => 
            array (
                'id' => 20,
                'country_id' => 1,
                'name' => 'سرپل',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            20 => 
            array (
                'id' => 21,
                'country_id' => 1,
                'name' => 'پکتیا',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            21 => 
            array (
                'id' => 22,
                'country_id' => 1,
                'name' => 'فراه',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            22 => 
            array (
                'id' => 23,
                'country_id' => 1,
                'name' => 'هلمند',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            23 => 
            array (
                'id' => 24,
                'country_id' => 1,
                'name' => 'نیمروز',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            24 => 
            array (
                'id' => 25,
                'country_id' => 1,
                'name' => 'غزنی',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            25 => 
            array (
                'id' => 26,
                'country_id' => 1,
                'name' => 'ارزگان',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            26 => 
            array (
                'id' => 27,
                'country_id' => 1,
                'name' => 'کاپیسا',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            27 => 
            array (
                'id' => 28,
                'country_id' => 1,
                'name' => 'پروان',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            28 => 
            array (
                'id' => 29,
                'country_id' => 1,
                'name' => 'پنجشیر',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            29 => 
            array (
                'id' => 30,
                'country_id' => 1,
                'name' => 'جوزجان',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            30 => 
            array (
                'id' => 31,
                'country_id' => 1,
                'name' => 'خوست',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            31 => 
            array (
                'id' => 32,
                'country_id' => 1,
                'name' => 'کنر',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            32 => 
            array (
                'id' => 33,
                'country_id' => 1,
                'name' => 'دایکندی',
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
        ));
        
        
    }
}