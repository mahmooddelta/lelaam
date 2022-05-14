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
                'name' => 'view_user',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:06',
                'updated_at' => '2022-05-14 14:44:06',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'view_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:06',
                'updated_at' => '2022-05-14 14:44:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'create_user',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:06',
                'updated_at' => '2022-05-14 14:44:06',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'delete_user',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:06',
                'updated_at' => '2022-05-14 14:44:06',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:06',
                'updated_at' => '2022-05-14 14:44:06',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'update_user',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:06',
                'updated_at' => '2022-05-14 14:44:06',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'export_user',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:06',
                'updated_at' => '2022-05-14 14:44:06',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'view_ad',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'view_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'create_ad',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'delete_ad',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'delete_any_ad',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'update_ad',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'export_ad',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'view_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'view_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'create_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'delete_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'delete_any_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'update_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'export_attribute',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'view_category',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'view_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'create_category',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'delete_category',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'delete_any_category',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'update_category',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'export_category',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'view_country',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'view_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'create_country',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'delete_country',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'delete_any_country',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'update_country',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'export_country',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'view_currency',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'view_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'create_currency',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'delete_currency',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'delete_any_currency',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'update_currency',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'export_currency',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'view_district',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'view_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'create_district',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'delete_district',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'delete_any_district',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'update_district',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'export_district',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'view_setting',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'view_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'create_setting',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'delete_setting',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'delete_any_setting',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'update_setting',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'export_setting',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'view_role',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'view_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'create_role',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'delete_role',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'delete_any_role',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'update_role',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'export_role',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'view_state',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'view_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'create_state',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'delete_state',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'delete_any_state',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'update_state',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'export_state',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'view_dashboard',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'view_my_profile',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:07',
                'updated_at' => '2022-05-14 14:44:07',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'view_account_widget',
                'guard_name' => 'web',
                'created_at' => '2022-05-14 14:44:08',
                'updated_at' => '2022-05-14 14:44:08',
            ),
        ));
        
        
    }
}