<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder {
	
	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run () {
		
		
		\DB::table('countries')
			->delete();
		
		\DB::table('countries')
			->insert([
				         0 =>
					         [
						         'id' => 1,
						         'iso3' => 'AFG',
						         'name' => 'افغانستان',
						         'phone_code' => '93',
						         'status' => 1,
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:18:39',
					         ],
				         1 =>
					         [
						         'id' => 2,
						         'iso3' => 'IR',
						         'name' => 'ایران',
						         'phone_code' => '98',
						         'status' => 1,
						         'created_at' => '2022-05-07 07:02:02',
						         'updated_at' => '2022-05-07 10:18:56',
					         ],
			         ]);
		
		
	}
}