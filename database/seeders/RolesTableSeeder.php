<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'super_admin',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:00:53',
                'updated_at' => '2022-07-20 16:00:53',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'guard_name' => 'web',
                'created_at' => '2022-07-20 16:00:53',
                'updated_at' => '2022-07-21 08:29:32',
            ),
        ));
        
        
    }
}