<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'name' => 'املاک و جایداد',
                'slug' => 'املاک-و-جایداد',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 07:18:13',
                'updated_at' => '2022-05-11 09:31:50',
            ),
            1 => 
            array (
                'id' => 10,
                'parent_id' => 2,
                'name' => 'خرید و فروش آپارتمان، خانه و زمین',
                'slug' => 'خرید-و-فروش-آپارتمان-خانه-و-زمین',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 07:20:00',
                'updated_at' => '2022-05-11 09:30:51',
            ),
            2 => 
            array (
                'id' => 11,
                'parent_id' => 2,
                'name' => 'کرایه آپارتمان، خانه و زمین',
                'slug' => 'کرایه-آپارتمان-خانه-و-زمین',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 07:20:23',
                'updated_at' => '2022-05-11 09:31:06',
            ),
            3 => 
            array (
                'id' => 12,
                'parent_id' => 2,
                'name' => 'خرید و فروش دکان، تجاری و اداری',
                'slug' => 'خرید-و-فروش-دکان-تجاری-و-اداری',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 07:20:40',
                'updated_at' => '2022-05-11 09:31:16',
            ),
            4 => 
            array (
                'id' => 13,
                'parent_id' => 2,
                'name' => 'لوازم دکان و کارخانه',
                'slug' => 'لوازم-دکان-و-کارخانه',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 07:21:00',
                'updated_at' => '2022-05-11 09:31:27',
            ),
            5 => 
            array (
                'id' => 14,
                'parent_id' => NULL,
                'name' => 'وسایط نقلیه',
                'slug' => 'وسایط-نقلیه',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:13:44',
                'updated_at' => '2022-05-11 09:13:44',
            ),
            6 => 
            array (
                'id' => 15,
                'parent_id' => 14,
                'name' => 'موتر',
                'slug' => 'موتر',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:14:31',
                'updated_at' => '2022-05-11 09:14:31',
            ),
            7 => 
            array (
                'id' => 16,
                'parent_id' => 14,
                'name' => 'موتر سایکل',
                'slug' => 'موتر-سایکل',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:14:43',
                'updated_at' => '2022-05-11 09:14:43',
            ),
            8 => 
            array (
                'id' => 17,
                'parent_id' => 14,
                'name' => 'بایسکل',
                'slug' => 'بایسکل',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:14:55',
                'updated_at' => '2022-05-11 09:14:55',
            ),
            9 => 
            array (
                'id' => 18,
                'parent_id' => 14,
                'name' => 'پرزه جات موتر',
                'slug' => 'پرزه-جات-موتر',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:15:15',
                'updated_at' => '2022-05-11 09:15:15',
            ),
            10 => 
            array (
                'id' => 19,
                'parent_id' => 14,
                'name' => 'سایر وسایط نقلیه',
                'slug' => 'سایر-وسایط-نقلیه',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:15:32',
                'updated_at' => '2022-05-11 09:15:32',
            ),
            11 => 
            array (
                'id' => 20,
                'parent_id' => NULL,
                'name' => 'لوازم الکترونیکی',
                'slug' => 'لوازم-الکترونیکی',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:20:33',
                'updated_at' => '2022-05-11 09:20:33',
            ),
            12 => 
            array (
                'id' => 21,
                'parent_id' => 20,
                'name' => 'کامپیوتر و لپ تاپ',
                'slug' => 'کامپیوتر-و-لپ-تاپ',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:20:55',
                'updated_at' => '2022-05-11 09:20:55',
            ),
            13 => 
            array (
                'id' => 22,
                'parent_id' => 20,
                'name' => 'موبایل و تبلت',
                'slug' => 'موبایل-و-تبلت',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:21:10',
                'updated_at' => '2022-05-11 09:21:10',
            ),
            14 => 
            array (
                'id' => 23,
                'parent_id' => 20,
                'name' => 'کنسول، گیم و لوازم',
                'slug' => 'کنسول-گیم-و-لوازم',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:21:33',
                'updated_at' => '2022-05-11 09:21:33',
            ),
            15 => 
            array (
                'id' => 24,
                'parent_id' => 20,
                'name' => 'صوتی و تصویری',
                'slug' => 'صوتی-و-تصویری',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:21:46',
                'updated_at' => '2022-05-11 09:21:46',
            ),
            16 => 
            array (
                'id' => 25,
                'parent_id' => 20,
                'name' => 'کامره و لوازم',
                'slug' => 'کامره-و-لوازم',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:22:23',
                'updated_at' => '2022-05-11 09:22:23',
            ),
            17 => 
            array (
                'id' => 26,
                'parent_id' => 20,
                'name' => 'لوازم کامپیوتری و مبایل',
                'slug' => 'لوازم-کامپیوتری-و-مبایل',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:22:40',
                'updated_at' => '2022-05-11 09:22:40',
            ),
            18 => 
            array (
                'id' => 27,
                'parent_id' => 20,
                'name' => 'سایر لوازم الکترونیکی',
                'slug' => 'سایر-لوازم-الکترونیکی',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:22:56',
                'updated_at' => '2022-05-11 09:22:56',
            ),
            19 => 
            array (
                'id' => 28,
                'parent_id' => NULL,
                'name' => 'حیوانات خانگی',
                'slug' => 'حیوانات-خانگی',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:24:26',
                'updated_at' => '2022-05-11 09:24:26',
            ),
            20 => 
            array (
                'id' => 29,
                'parent_id' => NULL,
                'name' => 'استخدام  کاریابی',
                'slug' => 'استخدام-کاریابی',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-11 09:24:40',
                'updated_at' => '2022-05-11 09:24:40',
            ),
            21 => 
            array (
                'id' => 30,
                'parent_id' => NULL,
                'name' => 'مربوط به خانه',
                'slug' => 'مربوط-به-خانه',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-14 03:53:23',
                'updated_at' => '2022-05-14 03:53:23',
            ),
            22 => 
            array (
                'id' => 31,
                'parent_id' => NULL,
                'name' => 'وسایل شخصی',
                'slug' => 'وسایل-شخصی',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-14 03:53:31',
                'updated_at' => '2022-05-14 03:53:31',
            ),
            23 => 
            array (
                'id' => 32,
                'parent_id' => NULL,
                'name' => 'متفرقه',
                'slug' => 'متفرقه',
                'description' => NULL,
                'position' => 0,
                'is_visible' => 1,
                'created_at' => '2022-05-14 03:54:24',
                'updated_at' => '2022-05-14 03:54:24',
            ),
        ));
        
        
    }
}