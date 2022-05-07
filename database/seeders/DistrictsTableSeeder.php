<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder {
	
	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run () {
		
		
		\DB::table('districts')
			->delete();
		
		\DB::table('districts')
			->insert([
				         0 =>
					         [
						         'id' => 1,
						         'name' => 'ناحیه اول',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 09:46:29',
						         'updated_at' => '2022-05-07 09:46:29',
					         ],
				         1 =>
					         [
						         'id' => 2,
						         'name' => 'ناحیه دوم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:26:56',
						         'updated_at' => '2022-05-07 10:26:56',
					         ],
				         2 =>
					         [
						         'id' => 3,
						         'name' => 'ناحیه سوم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:27:14',
						         'updated_at' => '2022-05-07 10:27:14',
					         ],
				         3 =>
					         [
						         'id' => 4,
						         'name' => 'ناحیه چهارم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:27:35',
						         'updated_at' => '2022-05-07 10:27:35',
					         ],
				         4 =>
					         [
						         'id' => 5,
						         'name' => 'ناحیه پنجم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:27:50',
						         'updated_at' => '2022-05-07 10:27:50',
					         ],
				         5 =>
					         [
						         'id' => 6,
						         'name' => 'ناحیه ششم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:27:58',
						         'updated_at' => '2022-05-07 10:27:58',
					         ],
				         6 =>
					         [
						         'id' => 7,
						         'name' => 'ناحیه هفتم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:28:06',
						         'updated_at' => '2022-05-07 10:28:06',
					         ],
				         7 =>
					         [
						         'id' => 8,
						         'name' => 'ناحیه هشتم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:28:14',
						         'updated_at' => '2022-05-07 10:28:14',
					         ],
				         8 =>
					         [
						         'id' => 9,
						         'name' => 'ناحیه نهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:28:22',
						         'updated_at' => '2022-05-07 10:28:22',
					         ],
				         9 =>
					         [
						         'id' => 10,
						         'name' => 'ناحیه دهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:28:32',
						         'updated_at' => '2022-05-07 10:28:32',
					         ],
				         10 =>
					         [
						         'id' => 11,
						         'name' => 'ناحیه یازدهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:28:46',
						         'updated_at' => '2022-05-07 10:28:46',
					         ],
				         11 =>
					         [
						         'id' => 12,
						         'name' => 'ناحیه دوازدهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:28:55',
						         'updated_at' => '2022-05-07 10:28:55',
					         ],
				         12 =>
					         [
						         'id' => 13,
						         'name' => 'ناحیه سیزدهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:29:10',
						         'updated_at' => '2022-05-07 10:29:10',
					         ],
				         13 =>
					         [
						         'id' => 14,
						         'name' => 'ناحیه چهاردهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:29:20',
						         'updated_at' => '2022-05-07 10:29:20',
					         ],
				         14 =>
					         [
						         'id' => 15,
						         'name' => 'ناحیه پانزدهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:29:30',
						         'updated_at' => '2022-05-07 10:29:30',
					         ],
				         15 =>
					         [
						         'id' => 16,
						         'name' => 'ناحیه شانزدهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:29:43',
						         'updated_at' => '2022-05-07 10:29:43',
					         ],
				         16 =>
					         [
						         'id' => 17,
						         'name' => 'ناحیه هفدهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:29:52',
						         'updated_at' => '2022-05-07 10:29:52',
					         ],
				         17 =>
					         [
						         'id' => 18,
						         'name' => 'ناحیه هژدهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:30:02',
						         'updated_at' => '2022-05-07 10:30:02',
					         ],
				         18 =>
					         [
						         'id' => 19,
						         'name' => 'ناحیه نزدهم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:30:11',
						         'updated_at' => '2022-05-07 10:30:11',
					         ],
				         19 =>
					         [
						         'id' => 20,
						         'name' => 'ناحیه بیستم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:30:25',
						         'updated_at' => '2022-05-07 10:30:25',
					         ],
				         20 =>
					         [
						         'id' => 21,
						         'name' => 'ناحیه بیست و یکم',
						         'state_id' => 14,
						         'country_id' => 1,
						         'created_at' => '2022-05-07 10:30:35',
						         'updated_at' => '2022-05-07 10:30:35',
					         ],
			         ]);
		
		
	}
}