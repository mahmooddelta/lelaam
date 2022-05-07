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
					         ],
				         1 =>
					         [
						         'id' => 2,
						         'country_id' => 1,
						         'name' => 'Badghis',
					         ],
				         2 =>
					         [
						         'id' => 3,
						         'country_id' => 1,
						         'name' => 'Baghlan',
					         ],
				         3 =>
					         [
						         'id' => 4,
						         'country_id' => 1,
						         'name' => 'Balkh',
					         ],
				         4 =>
					         [
						         'id' => 5,
						         'country_id' => 1,
						         'name' => 'Bamyan',
					         ],
				         5 =>
					         [
						         'id' => 6,
						         'country_id' => 1,
						         'name' => 'Daykundi',
					         ],
				         6 =>
					         [
						         'id' => 7,
						         'country_id' => 1,
						         'name' => 'Farah',
					         ],
				         7 =>
					         [
						         'id' => 8,
						         'country_id' => 1,
						         'name' => 'Faryab',
					         ],
				         8 =>
					         [
						         'id' => 9,
						         'country_id' => 1,
						         'name' => 'Ghazni',
					         ],
				         9 =>
					         [
						         'id' => 10,
						         'country_id' => 1,
						         'name' => 'Ghōr',
					         ],
				         10 =>
					         [
						         'id' => 11,
						         'country_id' => 1,
						         'name' => 'Helmand',
					         ],
				         11 =>
					         [
						         'id' => 12,
						         'country_id' => 1,
						         'name' => 'Herat',
					         ],
				         12 =>
					         [
						         'id' => 13,
						         'country_id' => 1,
						         'name' => 'Jowzjan',
					         ],
				         13 =>
					         [
						         'id' => 14,
						         'country_id' => 1,
						         'name' => 'Kabul',
					         ],
				         14 =>
					         [
						         'id' => 15,
						         'country_id' => 1,
						         'name' => 'Kandahar',
					         ],
				         15 =>
					         [
						         'id' => 16,
						         'country_id' => 1,
						         'name' => 'Kapisa',
					         ],
				         16 =>
					         [
						         'id' => 17,
						         'country_id' => 1,
						         'name' => 'Khost',
					         ],
				         17 =>
					         [
						         'id' => 18,
						         'country_id' => 1,
						         'name' => 'Kunar',
					         ],
				         18 =>
					         [
						         'id' => 19,
						         'country_id' => 1,
						         'name' => 'Kunduz Province',
					         ],
				         19 =>
					         [
						         'id' => 20,
						         'country_id' => 1,
						         'name' => 'Laghman',
					         ],
				         20 =>
					         [
						         'id' => 21,
						         'country_id' => 1,
						         'name' => 'Logar',
					         ],
				         21 =>
					         [
						         'id' => 22,
						         'country_id' => 1,
						         'name' => 'Nangarhar',
					         ],
				         22 =>
					         [
						         'id' => 23,
						         'country_id' => 1,
						         'name' => 'Nimruz',
					         ],
				         23 =>
					         [
						         'id' => 24,
						         'country_id' => 1,
						         'name' => 'Nuristan',
					         ],
				         24 =>
					         [
						         'id' => 25,
						         'country_id' => 1,
						         'name' => 'Paktia',
					         ],
				         25 =>
					         [
						         'id' => 26,
						         'country_id' => 1,
						         'name' => 'Paktika',
					         ],
				         26 =>
					         [
						         'id' => 27,
						         'country_id' => 1,
						         'name' => 'Panjshir',
					         ],
				         27 =>
					         [
						         'id' => 28,
						         'country_id' => 1,
						         'name' => 'Parwan',
					         ],
				         28 =>
					         [
						         'id' => 29,
						         'country_id' => 1,
						         'name' => 'Samangan',
					         ],
				         29 =>
					         [
						         'id' => 30,
						         'country_id' => 1,
						         'name' => 'Sar-e Pol',
					         ],
				         30 =>
					         [
						         'id' => 31,
						         'country_id' => 1,
						         'name' => 'Takhar',
					         ],
				         31 =>
					         [
						         'id' => 32,
						         'country_id' => 1,
						         'name' => 'Urozgan',
					         ],
				         32 =>
					         [
						         'id' => 33,
						         'country_id' => 1,
						         'name' => 'Zabul',
					         ],
			         ]);
		
		
	}
}