<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('currencies')->delete();
        
        \DB::table('currencies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'افغانی',
                'symbol' => '؋',
                'is_active' => 1,
                'created_at' => '2022-05-08 04:25:05',
                'updated_at' => '2022-05-08 04:25:28',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'دالر',
                'symbol' => '$',
                'is_active' => 1,
                'created_at' => '2022-05-08 04:25:12',
                'updated_at' => '2022-05-08 04:25:12',
            ),
        ));
        
        
    }
}