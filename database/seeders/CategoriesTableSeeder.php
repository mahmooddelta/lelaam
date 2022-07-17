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
                'description' => '',
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'name' => 'وسایط نقلیه',
                'slug' => 'وسایط-نقلیه',
                'description' => '',
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => NULL,
                'name' => 'لوازم الکترونیکی',
                'slug' => 'لوازم-الکترونیکی',
                'description' => '',
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'name' => 'مربوط خانه',
                'slug' => 'مربوط-خانه',
                'description' => '',
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'name' => 'وسایل شخصی',
                'slug' => 'وسایل-شخصی',
                'description' => '',
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => NULL,
                'name' => 'حیوانات خانگی',
                'slug' => 'حیوانات-خانگی',
                'description' => '',
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            6 => 
            array (
                'id' => 9,
                'parent_id' => NULL,
                'name' => 'متفرقه',
                'slug' => 'متفرقه',
                'description' => '',
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            7 => 
            array (
                'id' => 10,
                'parent_id' => 1,
            'name' => 'فروش مسکونی (آپارتمان، خانه، زمین)',
                'slug' => 'فروش-مسکونی-آپارتمان-خانه-زمین',
                'description' => '',
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            8 => 
            array (
                'id' => 11,
                'parent_id' => 1,
            'name' => 'کرایه مسکونی (آپارتمان، خانه، زمین)',
                'slug' => 'کرایه-مسکونی-آپارتمان-خانه-زمین',
                'description' => '',
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            9 => 
            array (
                'id' => 12,
                'parent_id' => 1,
            'name' => 'فروشی اداری و تجاری (دوکان، دفتر، صنعتی)',
                'slug' => 'فروشی-اداری-و-تجاری-دوکان-دفتر-صنعتی',
                'description' => '',
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            10 => 
            array (
                'id' => 13,
                'parent_id' => 1,
            'name' => 'کرایه اداری و تجاری (دوکان، دفتر، صنعتی)',
                'slug' => 'کرایه-اداری-و-تجاری-دوکان-دفتر-صنعتی',
                'description' => '',
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            11 => 
            array (
                'id' => 14,
                'parent_id' => 1,
                'name' => 'همه اعلانات املاک',
                'slug' => 'همه-اعلانات-املاک',
                'description' => '',
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            12 => 
            array (
                'id' => 15,
                'parent_id' => 2,
                'name' => 'موتر',
                'slug' => 'موتر',
                'description' => '',
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            13 => 
            array (
                'id' => 16,
                'parent_id' => 2,
                'name' => 'موتر سایکل',
                'slug' => 'موتر-سایکل',
                'description' => '',
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            14 => 
            array (
                'id' => 17,
                'parent_id' => 3,
            'name' => 'صوتی و تصویری (کمره عکاسی و فیلم برداری، سیستم صوتی، تلویزیون و پروجکتور، کمره امنیتی)',
                'slug' => 'صوتی-و-تصویری-کمره-عکاسی-و-فیلم-برداری-سیستم-صوتی-تلویزیون-و-پروجکتور-کمره-امنیتی',
                'description' => '',
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            15 => 
            array (
                'id' => 18,
                'parent_id' => 2,
                'name' => 'بایسکل',
                'slug' => 'بایسکل',
                'description' => '',
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            16 => 
            array (
                'id' => 19,
                'parent_id' => 2,
                'name' => 'پرزه جات موتر',
                'slug' => 'پرزه-جات-موتر',
                'description' => '',
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            17 => 
            array (
                'id' => 20,
                'parent_id' => 2,
                'name' => 'همه اعلانات وسایط نقلیه',
                'slug' => 'همه-اعلانات-وسایط-نقلیه',
                'description' => '',
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            18 => 
            array (
                'id' => 21,
                'parent_id' => 3,
            'name' => 'موبایل و تبلت (موبایل، تبلت، سیم کارت، لوازم جانبی)',
                'slug' => 'موبایل-و-تبلت-موبایل-تبلت-سیم-کارت-لوازم-جانبی',
                'description' => '',
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            19 => 
            array (
                'id' => 22,
                'parent_id' => 3,
                'name' => 'کامپیوتر و لپ تاپ',
                'slug' => 'کامپیوتر-و-لپ-تاپ',
                'description' => '',
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            20 => 
            array (
                'id' => 23,
                'parent_id' => 3,
                'name' => 'همه اعلانات لوازم الکترونیکی',
                'slug' => 'همه-اعلانات-لوازم-الکترونیکی',
                'description' => '',
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            21 => 
            array (
                'id' => 24,
                'parent_id' => 4,
                'name' => 'وسایل تزئینی خانه',
                'slug' => 'وسایل-تزئینی-خانه',
                'description' => '',
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            22 => 
            array (
                'id' => 25,
                'parent_id' => 4,
                'name' => 'وسایل آشپزخانه',
                'slug' => 'وسایل-آشپزخانه',
                'description' => '',
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            23 => 
            array (
                'id' => 26,
                'parent_id' => 4,
                'name' => 'همه اعلانات مربوط خانه',
                'slug' => 'همه-اعلانات-مربوط-خانه',
                'description' => '',
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            24 => 
            array (
                'id' => 27,
                'parent_id' => 5,
                'name' => 'کیف، کفش، لباس',
                'slug' => 'کیف-کفش-لباس',
                'description' => '',
                'position' => 1,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            25 => 
            array (
                'id' => 28,
                'parent_id' => 5,
                'name' => 'جواهرات، ساعت',
                'slug' => 'جواهرات-ساعت',
                'description' => '',
                'position' => 2,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            26 => 
            array (
                'id' => 29,
                'parent_id' => 5,
                'name' => 'آرایشی، صحی',
                'slug' => 'آرایشی-صحی',
                'description' => '',
                'position' => 3,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            27 => 
            array (
                'id' => 30,
                'parent_id' => 5,
                'name' => 'وسایل و اسباب بازی اطفال',
                'slug' => 'وسایل-و-اسباب-بازی-اطفال',
                'description' => '',
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            28 => 
            array (
                'id' => 31,
                'parent_id' => 5,
                'name' => 'وسایل موسیقی',
                'slug' => 'وسایل-موسیقی',
                'description' => '',
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            29 => 
            array (
                'id' => 32,
                'parent_id' => 5,
                'name' => 'همه اعلانات وسایل شخصی',
                'slug' => 'همه-اعلانات-وسایل-شخصی',
                'description' => '',
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            30 => 
            array (
                'id' => 33,
                'parent_id' => 1,
                'name' => 'سایر املاک',
                'slug' => 'سایر-املاک',
                'description' => '',
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            31 => 
            array (
                'id' => 34,
                'parent_id' => 2,
                'name' => 'سایر وسایط نقلیه',
                'slug' => 'سایر-وسایط-نقلیه',
                'description' => '',
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            32 => 
            array (
                'id' => 35,
                'parent_id' => 3,
                'name' => 'کنسول، گیم و لوازم',
                'slug' => 'کنسول-گیم-و-لوازم',
                'description' => '',
                'position' => 4,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            33 => 
            array (
                'id' => 36,
                'parent_id' => 3,
                'name' => 'کامره و لوازم',
                'slug' => 'کامره-و-لوازم',
                'description' => '',
                'position' => 5,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            34 => 
            array (
                'id' => 37,
                'parent_id' => 3,
                'name' => 'لوازم کامپیوتر و مبایل',
                'slug' => 'لوازم-کامپیوتر-و-مبایل',
                'description' => '',
                'position' => 6,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            35 => 
            array (
                'id' => 38,
                'parent_id' => 3,
                'name' => 'سایر لوازم الکترونیکی',
                'slug' => 'سایر-لوازم-الکترونیکی',
                'description' => '',
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            36 => 
            array (
                'id' => 39,
                'parent_id' => 4,
                'name' => 'وسایل برقی خانه',
                'slug' => 'وسایل-برقی-خانه',
                'description' => '',
                'position' => 8,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            37 => 
            array (
                'id' => 40,
                'parent_id' => 4,
                'name' => 'فرش، گلیم و قالیچه',
                'slug' => 'فرش-گلیم-و-قالیچه',
                'description' => '',
                'position' => 9,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            38 => 
            array (
                'id' => 41,
                'parent_id' => 4,
                'name' => 'الماری و تخت‌خواب',
                'slug' => 'الماری-و-تخت-خواب',
                'description' => '',
                'position' => 10,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            39 => 
            array (
                'id' => 42,
                'parent_id' => 4,
                'name' => 'مبل، فرنیچر و لوازم چوبی',
                'slug' => 'مبل-فرنیچر-و-لوازم-چوبی',
                'description' => '',
                'position' => 11,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            40 => 
            array (
                'id' => 43,
                'parent_id' => 4,
                'name' => 'سایر وسایل خانه',
                'slug' => 'سایر-وسایل-خانه',
                'description' => '',
                'position' => 12,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            41 => 
            array (
                'id' => 44,
                'parent_id' => 5,
                'name' => 'سایر وسایل شخصی',
                'slug' => 'سایر-وسایل-شخصی',
                'description' => '',
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            42 => 
            array (
                'id' => 45,
                'parent_id' => 1,
                'name' => 'لوازم دوکان و کارخانه',
                'slug' => 'لوازم-دوکان-و-کارخانه',
                'description' => '',
                'position' => 7,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
            43 => 
            array (
                'id' => 46,
                'parent_id' => NULL,
                'name' => 'استخدام و کاریابی',
                'slug' => 'استخدام-و-کاریابی',
                'description' => '',
                'position' => 8,
                'is_visible' => 1,
                'created_at' => '2022-07-12 15:25:11',
                'updated_at' => '2022-07-12 15:25:11',
            ),
        ));
        
        
    }
}