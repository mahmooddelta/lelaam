<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use function now;

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
						         'name' => 'Afghanistan',
						         'status' => 1,
						         'phone_code' => '93',
						         'iso3' => 'AFG',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
			         ]);
		
		
	}
}