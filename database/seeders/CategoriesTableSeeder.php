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
                'id' => 1,
                'parent_id' => NULL,
                'name' => 'املاک و جایداد',
                'slug' => 'املاک-و-جایداد',
                'description' => NULL,
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'name' => 'وسایط نقلیه',
                'slug' => 'وسایط-نقلیه',
                'description' => NULL,
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => NULL,
                'name' => 'لوازم الکترونیکی',
                'slug' => 'لوازم-الکترونیکی',
                'description' => NULL,
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'name' => 'مربوط خانه',
                'slug' => 'مربوط-خانه',
                'description' => NULL,
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'name' => 'وسایل شخصی',
                'slug' => 'وسایل-شخصی',
                'description' => NULL,
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => NULL,
                'name' => 'حیوانات خانگی',
                'slug' => 'حیوانات-خانگی',
                'description' => NULL,
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => NULL,
                'name' => 'متفرقه',
                'slug' => 'متفرقه',
                'description' => NULL,
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => NULL,
            'name' => 'فروش مسکونی (آپارتمان، خانه، زمین)',
                'slug' => 'فروش-مسکونی-آپارتمان-خانه-زمین',
                'description' => NULL,
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => NULL,
            'name' => 'کرایه مسکونی (آپارتمان، خانه، زمین)',
                'slug' => 'کرایه-مسکونی-آپارتمان-خانه-زمین',
                'description' => NULL,
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => NULL,
            'name' => 'فروشی اداری و تجاری (دوکان، دفتر، صنعتی)',
                'slug' => 'فروشی-اداری-و-تجاری-دوکان-دفتر-صنعتی',
                'description' => NULL,
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => NULL,
            'name' => 'کرایه اداری و تجاری (دوکان، دفتر، صنعتی)',
                'slug' => 'کرایه-اداری-و-تجاری-دوکان-دفتر-صنعتی',
                'description' => NULL,
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => NULL,
                'name' => 'همه اعلانات املاک',
                'slug' => 'همه-اعلانات-املاک',
                'description' => NULL,
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            12 => 
            array (
                'id' => 13,
                'parent_id' => NULL,
                'name' => 'موتر',
                'slug' => 'موتر',
                'description' => NULL,
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            13 => 
            array (
                'id' => 14,
                'parent_id' => NULL,
                'name' => 'موتر سایکل',
                'slug' => 'موتر-سایکل',
                'description' => NULL,
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            14 => 
            array (
                'id' => 15,
                'parent_id' => NULL,
            'name' => 'صوتی و تصویری (کمره عکاسی و فیلم برداری، سیستم صوتی، تلویزیون و پروجکتور، کمره امنیتی)',
                'slug' => 'صوتی-و-تصویری-کمره-عکاسی-و-فیلم-برداری-سیستم-صوتی-تلویزیون-و-پروجکتور-کمره-امنیتی',
                'description' => NULL,
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            15 => 
            array (
                'id' => 16,
                'parent_id' => NULL,
                'name' => 'بایسکل',
                'slug' => 'بایسکل',
                'description' => NULL,
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            16 => 
            array (
                'id' => 17,
                'parent_id' => NULL,
                'name' => 'پرزه جات موتر',
                'slug' => 'پرزه-جات-موتر',
                'description' => NULL,
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            17 => 
            array (
                'id' => 18,
                'parent_id' => NULL,
                'name' => 'همه اعلانات وسایط نقلیه',
                'slug' => 'همه-اعلانات-وسایط-نقلیه',
                'description' => NULL,
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            18 => 
            array (
                'id' => 19,
                'parent_id' => NULL,
            'name' => 'موبایل و تبلت (موبایل، تبلت، سیم کارت، لوازم جانبی)',
                'slug' => 'موبایل-و-تبلت-موبایل-تبلت-سیم-کارت-لوازم-جانبی',
                'description' => NULL,
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            19 => 
            array (
                'id' => 20,
                'parent_id' => NULL,
                'name' => 'کامپیوتر و لپ تاپ',
                'slug' => 'کامپیوتر-و-لپ-تاپ',
                'description' => NULL,
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            20 => 
            array (
                'id' => 21,
                'parent_id' => NULL,
                'name' => 'همه اعلانات لوازم الکترونیکی',
                'slug' => 'همه-اعلانات-لوازم-الکترونیکی',
                'description' => NULL,
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            21 => 
            array (
                'id' => 22,
                'parent_id' => NULL,
                'name' => 'وسایل تزئینی خانه',
                'slug' => 'وسایل-تزئینی-خانه',
                'description' => NULL,
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            22 => 
            array (
                'id' => 23,
                'parent_id' => NULL,
                'name' => 'وسایل آشپزخانه',
                'slug' => 'وسایل-آشپزخانه',
                'description' => NULL,
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            23 => 
            array (
                'id' => 24,
                'parent_id' => NULL,
                'name' => 'همه اعلانات مربوط خانه',
                'slug' => 'همه-اعلانات-مربوط-خانه',
                'description' => NULL,
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            24 => 
            array (
                'id' => 25,
                'parent_id' => NULL,
                'name' => 'کیف، کفش، لباس',
                'slug' => 'کیف-کفش-لباس',
                'description' => NULL,
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            25 => 
            array (
                'id' => 26,
                'parent_id' => NULL,
                'name' => 'جواهرات، ساعت',
                'slug' => 'جواهرات-ساعت',
                'description' => NULL,
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            26 => 
            array (
                'id' => 27,
                'parent_id' => NULL,
                'name' => 'آرایشی، صحی',
                'slug' => 'آرایشی-صحی',
                'description' => NULL,
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            27 => 
            array (
                'id' => 28,
                'parent_id' => NULL,
                'name' => 'وسایل و اسباب بازی اطفال',
                'slug' => 'وسایل-و-اسباب-بازی-اطفال',
                'description' => NULL,
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            28 => 
            array (
                'id' => 29,
                'parent_id' => NULL,
                'name' => 'وسایل موسیقی',
                'slug' => 'وسایل-موسیقی',
                'description' => NULL,
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            29 => 
            array (
                'id' => 30,
                'parent_id' => NULL,
                'name' => 'همه اعلانات وسایل شخصی',
                'slug' => 'همه-اعلانات-وسایل-شخصی',
                'description' => NULL,
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            30 => 
            array (
                'id' => 31,
                'parent_id' => NULL,
                'name' => 'سایر املاک',
                'slug' => 'سایر-املاک',
                'description' => NULL,
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            31 => 
            array (
                'id' => 32,
                'parent_id' => NULL,
                'name' => 'سایر وسایط نقلیه',
                'slug' => 'سایر-وسایط-نقلیه',
                'description' => NULL,
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            32 => 
            array (
                'id' => 33,
                'parent_id' => NULL,
                'name' => 'کنسول، گیم و لوازم',
                'slug' => 'کنسول-گیم-و-لوازم',
                'description' => NULL,
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            33 => 
            array (
                'id' => 34,
                'parent_id' => NULL,
                'name' => 'کامره و لوازم',
                'slug' => 'کامره-و-لوازم',
                'description' => NULL,
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            34 => 
            array (
                'id' => 35,
                'parent_id' => NULL,
                'name' => 'لوازم کامپیوتر و مبایل',
                'slug' => 'لوازم-کامپیوتر-و-مبایل',
                'description' => NULL,
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            35 => 
            array (
                'id' => 36,
                'parent_id' => NULL,
                'name' => 'سایر لوازم الکترونیکی',
                'slug' => 'سایر-لوازم-الکترونیکی',
                'description' => NULL,
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            36 => 
            array (
                'id' => 37,
                'parent_id' => NULL,
                'name' => 'وسایل برقی خانه',
                'slug' => 'وسایل-برقی-خانه',
                'description' => NULL,
                'position' => 8,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            37 => 
            array (
                'id' => 38,
                'parent_id' => NULL,
                'name' => 'فرش، گلیم و قالیچه',
                'slug' => 'فرش-گلیم-و-قالیچه',
                'description' => NULL,
                'position' => 9,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            38 => 
            array (
                'id' => 39,
                'parent_id' => NULL,
                'name' => 'الماری و تخت‌خواب',
                'slug' => 'الماری-و-تخت-خواب',
                'description' => NULL,
                'position' => 10,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            39 => 
            array (
                'id' => 40,
                'parent_id' => NULL,
                'name' => 'مبل، فرنیچر و لوازم چوبی',
                'slug' => 'مبل-فرنیچر-و-لوازم-چوبی',
                'description' => NULL,
                'position' => 11,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            40 => 
            array (
                'id' => 41,
                'parent_id' => NULL,
                'name' => 'سایر وسایل خانه',
                'slug' => 'سایر-وسایل-خانه',
                'description' => NULL,
                'position' => 12,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            41 => 
            array (
                'id' => 42,
                'parent_id' => NULL,
                'name' => 'سایر وسایل شخصی',
                'slug' => 'سایر-وسایل-شخصی',
                'description' => NULL,
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            42 => 
            array (
                'id' => 43,
                'parent_id' => NULL,
                'name' => 'لوازم دوکان و کارخانه',
                'slug' => 'لوازم-دوکان-و-کارخانه',
                'description' => NULL,
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
            43 => 
            array (
                'id' => 44,
                'parent_id' => NULL,
                'name' => 'استخدام و کاریابی',
                'slug' => 'استخدام-و-کاریابی',
                'description' => NULL,
                'position' => 8,
                'is_visible' => 1,
                'created_at' => '2022-06-29 14:28:40',
                'updated_at' => '2022-06-29 14:28:40',
            ),
        ));
        
        
    }
}