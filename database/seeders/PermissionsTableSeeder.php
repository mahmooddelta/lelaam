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
                'name' => 'view_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'view_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'create_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'update_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'restore_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'restore_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'replicate_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'delete_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'delete_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'force_delete_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'force_delete_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'view_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'view_any_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'create_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'update_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'restore_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'restore_any_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'replicate_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'delete_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'delete_any_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'force_delete_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'force_delete_any_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'view_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'view_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'create_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'update_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'restore_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'restore_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'replicate_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'delete_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'delete_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'force_delete_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'force_delete_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'view_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'view_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'create_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'update_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'restore_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'restore_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'replicate_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'delete_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'delete_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'force_delete_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'force_delete_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'view_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'view_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'create_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'update_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'restore_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'restore_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'replicate_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'delete_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'delete_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'force_delete_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'force_delete_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'view_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'view_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'create_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'update_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'restore_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'restore_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'replicate_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'delete_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'delete_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'force_delete_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'force_delete_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'view_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'view_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'create_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'update_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'restore_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'restore_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'replicate_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'delete_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'delete_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'force_delete_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'force_delete_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'view_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'view_any_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'create_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'update_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'restore_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'restore_any_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'replicate_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'delete_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'delete_any_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'force_delete_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'force_delete_any_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'view_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'view_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'create_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'update_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'restore_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'restore_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'replicate_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'delete_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'delete_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'force_delete_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'force_delete_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'view_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'view_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'create_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'update_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'restore_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'restore_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'replicate_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'delete_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'delete_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'force_delete_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'force_delete_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'view_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'view_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'create_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'update_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'restore_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'restore_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'replicate_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'delete_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'delete_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'force_delete_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'force_delete_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'view_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'view_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'create_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'update_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'restore_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'restore_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'replicate_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'delete_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'force_delete_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'force_delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'page_FilamentGoogleAnalyticsDashboard',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'page_ShieldSetting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'page_MyProfile',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:14',
                'updated_at' => '2022-07-27 10:26:14',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'widget_TodayAdStats',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'widget_AdStats',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'widget_PageViewsWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'widget_VisitorsWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'widget_ActiveUsersOneDayWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'widget_ActiveUsersSevenDayWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'widget_ActiveUsersFourteenDayWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'widget_ActiveUsersTwentyEightDayWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'widget_SessionsWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'widget_SessionsDurationWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'widget_SessionsByCountryWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'widget_SessionsByDeviceWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'widget_MostVisitedPagesWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'widget_TopReferrersListWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'widget_DashboardStats',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'widget_AdsChart',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:26:15',
                'updated_at' => '2022-07-27 10:26:15',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'export_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'import_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'export_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'import_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'export_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'import_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'export_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'import_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'export_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'import_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'export_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'import_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'export_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'import_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'export_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'import_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'export_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'import_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'export_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'import_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'export_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'import_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'export_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'import_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-27 10:29:15',
                'updated_at' => '2022-07-27 10:29:15',
            ),
        ));
        
        
    }
}