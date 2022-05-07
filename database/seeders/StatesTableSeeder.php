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
						         'name' => 'بدخشان',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:19:11',
					         ],
				         1 =>
					         [
						         'id' => 2,
						         'country_id' => 1,
						         'name' => 'بادغیس',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:19:22',
					         ],
				         2 =>
					         [
						         'id' => 3,
						         'country_id' => 1,
						         'name' => 'بغلان',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:19:33',
					         ],
				         3 =>
					         [
						         'id' => 4,
						         'country_id' => 1,
						         'name' => 'بلخ',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:19:43',
					         ],
				         4 =>
					         [
						         'id' => 5,
						         'country_id' => 1,
						         'name' => 'بامیان',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:19:51',
					         ],
				         5 =>
					         [
						         'id' => 6,
						         'country_id' => 1,
						         'name' => 'دایکندی',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:20:00',
					         ],
				         6 =>
					         [
						         'id' => 7,
						         'country_id' => 1,
						         'name' => 'فراه',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:20:24',
					         ],
				         7 =>
					         [
						         'id' => 8,
						         'country_id' => 1,
						         'name' => 'فاریاب',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:20:33',
					         ],
				         8 =>
					         [
						         'id' => 9,
						         'country_id' => 1,
						         'name' => 'غزنی',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:20:41',
					         ],
				         9 =>
					         [
						         'id' => 10,
						         'country_id' => 1,
						         'name' => 'غور',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:21:10',
					         ],
				         10 =>
					         [
						         'id' => 11,
						         'country_id' => 1,
						         'name' => 'هلمند',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:21:25',
					         ],
				         11 =>
					         [
						         'id' => 12,
						         'country_id' => 1,
						         'name' => 'هرات',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:21:39',
					         ],
				         12 =>
					         [
						         'id' => 13,
						         'country_id' => 1,
						         'name' => 'جوزجان',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:22:05',
					         ],
				         13 =>
					         [
						         'id' => 14,
						         'country_id' => 1,
						         'name' => 'کابل',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:22:12',
					         ],
				         14 =>
					         [
						         'id' => 15,
						         'country_id' => 1,
						         'name' => 'کندهار',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:22:17',
					         ],
				         15 =>
					         [
						         'id' => 16,
						         'country_id' => 1,
						         'name' => 'کاپیسا',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:22:26',
					         ],
				         16 =>
					         [
						         'id' => 17,
						         'country_id' => 1,
						         'name' => 'خوست',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:22:31',
					         ],
				         17 =>
					         [
						         'id' => 18,
						         'country_id' => 1,
						         'name' => 'کنر',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:22:35',
					         ],
				         18 =>
					         [
						         'id' => 19,
						         'country_id' => 1,
						         'name' => 'کندز',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:22:41',
					         ],
				         19 =>
					         [
						         'id' => 20,
						         'country_id' => 1,
						         'name' => 'لغمان',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:22:48',
					         ],
				         20 =>
					         [
						         'id' => 21,
						         'country_id' => 1,
						         'name' => 'لوگر',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:23:25',
					         ],
				         21 =>
					         [
						         'id' => 22,
						         'country_id' => 1,
						         'name' => 'ننگرهار',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:23:34',
					         ],
				         22 =>
					         [
						         'id' => 23,
						         'country_id' => 1,
						         'name' => 'نیمروز',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:23:39',
					         ],
				         23 =>
					         [
						         'id' => 24,
						         'country_id' => 1,
						         'name' => 'نورستان',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:23:48',
					         ],
				         24 =>
					         [
						         'id' => 25,
						         'country_id' => 1,
						         'name' => 'پکتیا',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:23:54',
					         ],
				         25 =>
					         [
						         'id' => 26,
						         'country_id' => 1,
						         'name' => 'پکتیکا',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:24:11',
					         ],
				         26 =>
					         [
						         'id' => 27,
						         'country_id' => 1,
						         'name' => 'پنجشیر',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:24:17',
					         ],
				         27 =>
					         [
						         'id' => 28,
						         'country_id' => 1,
						         'name' => 'پروان',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:24:23',
					         ],
				         28 =>
					         [
						         'id' => 29,
						         'country_id' => 1,
						         'name' => 'سمنگان',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:24:34',
					         ],
				         29 =>
					         [
						         'id' => 30,
						         'country_id' => 1,
						         'name' => 'سرپل',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:24:40',
					         ],
				         30 =>
					         [
						         'id' => 31,
						         'country_id' => 1,
						         'name' => 'تخار',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:24:44',
					         ],
				         31 =>
					         [
						         'id' => 32,
						         'country_id' => 1,
						         'name' => 'ارزگان',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:24:51',
					         ],
				         32 =>
					         [
						         'id' => 33,
						         'country_id' => 1,
						         'name' => 'زابل',
						         'created_at' => '2022-05-07 07:01:00',
						         'updated_at' => '2022-05-07 10:24:55',
					         ],
				         33 =>
					         [
						         'id' => 34,
						         'country_id' => 2,
						         'name' => 'تهران',
						         'created_at' => '2022-05-07 07:01:37',
						         'updated_at' => '2022-05-07 10:25:01',
					         ],
				         34 =>
					         [
						         'id' => 35,
						         'country_id' => 2,
						         'name' => 'گیلان',
						         'created_at' => '2022-05-07 07:18:57',
						         'updated_at' => '2022-05-07 10:25:09',
					         ],
			         ]);
		
		
	}
}