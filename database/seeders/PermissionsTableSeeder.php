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
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'view_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'create_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'update_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'restore_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'restore_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'replicate_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'reorder_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'delete_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'delete_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'force_delete_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'force_delete_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'view_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'view_any_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'create_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'update_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'restore_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'restore_any_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'replicate_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'reorder_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'delete_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'delete_any_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'force_delete_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'force_delete_any_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'view_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'view_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'create_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'update_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'restore_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'restore_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'replicate_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'reorder_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'delete_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'delete_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'force_delete_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'force_delete_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'view_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'view_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'create_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'update_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'restore_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'restore_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:43',
                'updated_at' => '2022-07-30 10:48:43',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'replicate_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'reorder_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'delete_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'delete_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'force_delete_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'force_delete_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'view_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'view_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'create_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'update_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'restore_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'restore_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'replicate_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'reorder_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'delete_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'delete_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'force_delete_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'force_delete_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'view_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'view_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'create_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'update_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'restore_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'restore_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'replicate_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'reorder_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'delete_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'delete_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'force_delete_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'force_delete_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'view_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'view_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'create_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'update_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'restore_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'restore_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'replicate_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'reorder_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'delete_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'delete_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'force_delete_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'force_delete_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'view_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'view_any_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'create_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'update_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'restore_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'restore_any_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'replicate_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'reorder_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'delete_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'delete_any_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'force_delete_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'force_delete_any_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'view_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'view_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'create_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'update_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'restore_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'restore_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'replicate_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'reorder_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'delete_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'delete_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'force_delete_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'force_delete_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'view_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'view_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'create_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'update_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'restore_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'restore_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'replicate_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'reorder_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'delete_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'delete_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'force_delete_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'force_delete_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:44',
                'updated_at' => '2022-07-30 10:48:44',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'view_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'view_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'create_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'update_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'restore_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'restore_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'replicate_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'reorder_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'delete_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'delete_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'force_delete_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'force_delete_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'view_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'view_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'create_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'update_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'restore_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'restore_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'replicate_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'reorder_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'delete_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'force_delete_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'force_delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'page_FilamentGoogleAnalyticsDashboard',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'page_MyProfile',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'widget_TodayAdStats',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:45',
                'updated_at' => '2022-07-30 10:48:45',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'widget_AdStats',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:46',
                'updated_at' => '2022-07-30 10:48:46',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'widget_PageViewsWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:46',
                'updated_at' => '2022-07-30 10:48:46',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'widget_VisitorsWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:46',
                'updated_at' => '2022-07-30 10:48:46',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'widget_ActiveUsersOneDayWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:46',
                'updated_at' => '2022-07-30 10:48:46',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'widget_ActiveUsersSevenDayWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:46',
                'updated_at' => '2022-07-30 10:48:46',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'widget_ActiveUsersFourteenDayWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:47',
                'updated_at' => '2022-07-30 10:48:47',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'widget_ActiveUsersTwentyEightDayWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:47',
                'updated_at' => '2022-07-30 10:48:47',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'widget_SessionsWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:47',
                'updated_at' => '2022-07-30 10:48:47',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'widget_SessionsDurationWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:47',
                'updated_at' => '2022-07-30 10:48:47',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'widget_SessionsByCountryWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:47',
                'updated_at' => '2022-07-30 10:48:47',
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'widget_SessionsByDeviceWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:48',
                'updated_at' => '2022-07-30 10:48:48',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'widget_MostVisitedPagesWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:48',
                'updated_at' => '2022-07-30 10:48:48',
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'widget_TopReferrersListWidget',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:48',
                'updated_at' => '2022-07-30 10:48:48',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'widget_DashboardStats',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:48',
                'updated_at' => '2022-07-30 10:48:48',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'widget_AdsChart',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:48:48',
                'updated_at' => '2022-07-30 10:48:48',
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'export_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:32',
                'updated_at' => '2022-07-30 10:51:32',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'import_ad',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:32',
                'updated_at' => '2022-07-30 10:51:32',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'export_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:32',
                'updated_at' => '2022-07-30 10:51:32',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'import_ad::report',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:32',
                'updated_at' => '2022-07-30 10:51:32',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'export_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:32',
                'updated_at' => '2022-07-30 10:51:32',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'import_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:32',
                'updated_at' => '2022-07-30 10:51:32',
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'export_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'import_category',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'export_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'import_country',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'export_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'import_currency',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'export_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'import_district',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'export_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'import_report::type',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'export_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'import_role',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'export_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'import_setting',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'export_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'import_state',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:33',
                'updated_at' => '2022-07-30 10:51:33',
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'export_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:34',
                'updated_at' => '2022-07-30 10:51:34',
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'import_user',
                'guard_name' => 'web',
                'created_at' => '2022-07-30 10:51:34',
                'updated_at' => '2022-07-30 10:51:34',
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'view_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'view_any_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'create_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'update_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'restore_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'restore_any_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'replicate_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'reorder_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'delete_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'delete_any_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'force_delete_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'force_delete_any_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'export_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'import_blog::category',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'view_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'view_any_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'create_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'update_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'restore_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'restore_any_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'replicate_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'reorder_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'delete_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'delete_any_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'force_delete_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'force_delete_any_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'export_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'import_blog::post',
                'guard_name' => 'web',
                'created_at' => '2022-07-31 11:25:41',
                'updated_at' => '2022-07-31 11:25:41',
            ),
        ));
        
        
    }
}