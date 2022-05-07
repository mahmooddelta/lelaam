<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder {
	
	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run () {
		
		
		\DB::table('states')
			->delete();
		
		\DB::table('states')
			->insert([
				         0 =>
					         [
						         'id' => 1,
						         'country_id' => 1,
						         'name' => 'Badakhshan',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         1 =>
					         [
						         'id' => 2,
						         'country_id' => 1,
						         'name' => 'Badghis',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         2 =>
					         [
						         'id' => 3,
						         'country_id' => 1,
						         'name' => 'Baghlan',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         3 =>
					         [
						         'id' => 4,
						         'country_id' => 1,
						         'name' => 'Balkh',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         4 =>
					         [
						         'id' => 5,
						         'country_id' => 1,
						         'name' => 'Bamyan',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         5 =>
					         [
						         'id' => 6,
						         'country_id' => 1,
						         'name' => 'Daykundi',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         6 =>
					         [
						         'id' => 7,
						         'country_id' => 1,
						         'name' => 'Farah',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         7 =>
					         [
						         'id' => 8,
						         'country_id' => 1,
						         'name' => 'Faryab',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         8 =>
					         [
						         'id' => 9,
						         'country_id' => 1,
						         'name' => 'Ghazni',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         9 =>
					         [
						         'id' => 10,
						         'country_id' => 1,
						         'name' => 'Ghōr',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         10 =>
					         [
						         'id' => 11,
						         'country_id' => 1,
						         'name' => 'Helmand',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         11 =>
					         [
						         'id' => 12,
						         'country_id' => 1,
						         'name' => 'Herat',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         12 =>
					         [
						         'id' => 13,
						         'country_id' => 1,
						         'name' => 'Jowzjan',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         13 =>
					         [
						         'id' => 14,
						         'country_id' => 1,
						         'name' => 'Kabul',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         14 =>
					         [
						         'id' => 15,
						         'country_id' => 1,
						         'name' => 'Kandahar',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         15 =>
					         [
						         'id' => 16,
						         'country_id' => 1,
						         'name' => 'Kapisa',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         16 =>
					         [
						         'id' => 17,
						         'country_id' => 1,
						         'name' => 'Khost',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         17 =>
					         [
						         'id' => 18,
						         'country_id' => 1,
						         'name' => 'Kunar',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         18 =>
					         [
						         'id' => 19,
						         'country_id' => 1,
						         'name' => 'Kunduz Province',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         19 =>
					         [
						         'id' => 20,
						         'country_id' => 1,
						         'name' => 'Laghman',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         20 =>
					         [
						         'id' => 21,
						         'country_id' => 1,
						         'name' => 'Logar',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         21 =>
					         [
						         'id' => 22,
						         'country_id' => 1,
						         'name' => 'Nangarhar',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         22 =>
					         [
						         'id' => 23,
						         'country_id' => 1,
						         'name' => 'Nimruz',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         23 =>
					         [
						         'id' => 24,
						         'country_id' => 1,
						         'name' => 'Nuristan',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         24 =>
					         [
						         'id' => 25,
						         'country_id' => 1,
						         'name' => 'Paktia',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         25 =>
					         [
						         'id' => 26,
						         'country_id' => 1,
						         'name' => 'Paktika',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         26 =>
					         [
						         'id' => 27,
						         'country_id' => 1,
						         'name' => 'Panjshir',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         27 =>
					         [
						         'id' => 28,
						         'country_id' => 1,
						         'name' => 'Parwan',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         28 =>
					         [
						         'id' => 29,
						         'country_id' => 1,
						         'name' => 'Samangan',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         29 =>
					         [
						         'id' => 30,
						         'country_id' => 1,
						         'name' => 'Sar-e Pol',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         30 =>
					         [
						         'id' => 31,
						         'country_id' => 1,
						         'name' => 'Takhar',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         31 =>
					         [
						         'id' => 32,
						         'country_id' => 1,
						         'name' => 'Urozgan',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
				         32 =>
					         [
						         'id' => 33,
						         'country_id' => 1,
						         'name' => 'Zabul',
						         'created_at' => now()->toDateTimeString(),
						         'updated_at' => now()->toDateTimeString(),
					         ],
			         ]);
		
		
	}
}