<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'view_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'view_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'create_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'delete_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'delete_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'update_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'export_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'view_adreport',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'view_any_adreport',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'create_adreport',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'delete_adreport',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'delete_any_adreport',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'update_adreport',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'export_adreport',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'view_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'view_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'create_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'delete_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'delete_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'update_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'export_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'view_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'view_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'create_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'delete_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'delete_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'update_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'export_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'view_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'view_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'create_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'delete_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'delete_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'update_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'export_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'view_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'view_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'create_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'delete_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'delete_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'update_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'export_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'view_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'view_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'create_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'delete_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'delete_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'update_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'export_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'view_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'view_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'create_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'delete_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'delete_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'update_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'export_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'view_reporttype',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'view_any_reporttype',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'create_reporttype',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'delete_reporttype',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'delete_any_reporttype',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'update_reporttype',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'export_reporttype',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'view_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'view_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'create_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'delete_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'delete_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'update_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'export_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'view_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'view_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'create_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'delete_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'delete_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'update_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'export_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'view_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'view_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'create_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'delete_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'update_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'export_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'page_filament_google_analytics_dashboard',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:03',
                'updated_at' => '2022-07-20 16:01:03',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'page_my_profile',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'widget_today_ad_stats',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'widget_ad_stats',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'widget_page_views_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'widget_visitors_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'widget_active_users_one_day_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'widget_active_users_seven_day_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'widget_active_users_fourteen_day_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'widget_active_users_twenty_eight_day_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'widget_sessions_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'widget_sessions_duration_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'widget_sessions_by_country_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'widget_sessions_by_device_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:04',
                'updated_at' => '2022-07-20 16:01:04',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'widget_most_visited_pages_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:05',
                'updated_at' => '2022-07-20 16:01:05',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'widget_top_referrers_list_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:05',
                'updated_at' => '2022-07-20 16:01:05',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'widget_dashboard_stats',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:05',
                'updated_at' => '2022-07-20 16:01:05',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'widget_ads_chart',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:01:05',
                'updated_at' => '2022-07-20 16:01:05',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'view_ad_report',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'view_any_ad_report',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'create_ad_report',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'delete_ad_report',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'delete_any_ad_report',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'update_ad_report',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'export_ad_report',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'view_report_type',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'view_any_report_type',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'create_report_type',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'delete_report_type',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'delete_any_report_type',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'update_report_type',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'export_report_type',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 08:25:58',
                'updated_at' => '2022-07-21 08:25:58',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'page_dashboard',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 10:06:58',
                'updated_at' => '2022-07-21 10:06:58',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'widget_account_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 10:06:58',
                'updated_at' => '2022-07-21 10:06:58',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'widget_filament_info_widget',
                'guard_name' => 'web',
                'created_at' => '2022-07-21 10:06:58',
                'updated_at' => '2022-07-21 10:06:58',
            ),
        ));
        
        
    }
}