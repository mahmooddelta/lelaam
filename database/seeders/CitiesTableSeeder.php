<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder {
	
	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run () {
		
		
		\DB::table('cities')
			->delete();
		
		\DB::table('cities')
			->insert([
				         0 =>
					         [
						         'id' => 1,
						         'country_id' => 1,
						         'state_id' => 1,
						         'name' => 'Ashkāsham',
					         ],
				         1 =>
					         [
						         'id' => 2,
						         'country_id' => 1,
						         'state_id' => 1,
						         'name' => 'Fayzabad',
					         ],
				         2 =>
					         [
						         'id' => 3,
						         'country_id' => 1,
						         'state_id' => 1,
						         'name' => 'Jurm',
					         ],
				         3 =>
					         [
						         'id' => 4,
						         'country_id' => 1,
						         'state_id' => 1,
						         'name' => 'Khandūd',
					         ],
				         4 =>
					         [
						         'id' => 5,
						         'country_id' => 1,
						         'state_id' => 1,
						         'name' => 'Rāghistān',
					         ],
				         5 =>
					         [
						         'id' => 6,
						         'country_id' => 1,
						         'state_id' => 1,
						         'name' => 'Wākhān',
					         ],
				         6 =>
					         [
						         'id' => 7,
						         'country_id' => 1,
						         'state_id' => 2,
						         'name' => 'Ghormach',
					         ],
				         7 =>
					         [
						         'id' => 8,
						         'country_id' => 1,
						         'state_id' => 2,
						         'name' => 'Qala i Naw',
					         ],
				         8 =>
					         [
						         'id' => 9,
						         'country_id' => 1,
						         'state_id' => 3,
						         'name' => 'Baghlān',
					         ],
				         9 =>
					         [
						         'id' => 10,
						         'country_id' => 1,
						         'state_id' => 3,
						         'name' => 'Ḩukūmatī Dahanah-ye Ghōrī',
					         ],
				         10 =>
					         [
						         'id' => 11,
						         'country_id' => 1,
						         'state_id' => 3,
						         'name' => 'Nahrīn',
					         ],
				         11 =>
					         [
						         'id' => 12,
						         'country_id' => 1,
						         'state_id' => 3,
						         'name' => 'Pul-e Khumrī',
					         ],
				         12 =>
					         [
						         'id' => 13,
						         'country_id' => 1,
						         'state_id' => 4,
						         'name' => 'Balkh',
					         ],
				         13 =>
					         [
						         'id' => 14,
						         'country_id' => 1,
						         'state_id' => 4,
						         'name' => 'Dowlatābād',
					         ],
				         14 =>
					         [
						         'id' => 15,
						         'country_id' => 1,
						         'state_id' => 4,
						         'name' => 'Khulm',
					         ],
				         15 =>
					         [
						         'id' => 16,
						         'country_id' => 1,
						         'state_id' => 4,
						         'name' => 'Lab-Sar',
					         ],
				         16 =>
					         [
						         'id' => 17,
						         'country_id' => 1,
						         'state_id' => 4,
						         'name' => 'Mazār-e Sharīf',
					         ],
				         17 =>
					         [
						         'id' => 18,
						         'country_id' => 1,
						         'state_id' => 4,
						         'name' => 'Qarchī Gak',
					         ],
				         18 =>
					         [
						         'id' => 19,
						         'country_id' => 1,
						         'state_id' => 5,
						         'name' => 'Bāmyān',
					         ],
				         19 =>
					         [
						         'id' => 20,
						         'country_id' => 1,
						         'state_id' => 5,
						         'name' => 'Panjāb',
					         ],
				         20 =>
					         [
						         'id' => 21,
						         'country_id' => 1,
						         'state_id' => 6,
						         'name' => 'Nīlī',
					         ],
				         21 =>
					         [
						         'id' => 22,
						         'country_id' => 1,
						         'state_id' => 7,
						         'name' => 'Farah',
					         ],
				         22 =>
					         [
						         'id' => 23,
						         'country_id' => 1,
						         'state_id' => 8,
						         'name' => 'Andkhoy',
					         ],
				         23 =>
					         [
						         'id' => 24,
						         'country_id' => 1,
						         'state_id' => 8,
						         'name' => 'Maymana',
					         ],
				         24 =>
					         [
						         'id' => 25,
						         'country_id' => 1,
						         'state_id' => 9,
						         'name' => 'Ghazni',
					         ],
				         25 =>
					         [
						         'id' => 26,
						         'country_id' => 1,
						         'state_id' => 10,
						         'name' => 'Fayrōz Kōh',
					         ],
				         26 =>
					         [
						         'id' => 27,
						         'country_id' => 1,
						         'state_id' => 10,
						         'name' => 'Shahrak',
					         ],
				         27 =>
					         [
						         'id' => 28,
						         'country_id' => 1,
						         'state_id' => 11,
						         'name' => '‘Alāqahdārī Dīshū',
					         ],
				         28 =>
					         [
						         'id' => 29,
						         'country_id' => 1,
						         'state_id' => 11,
						         'name' => 'Gereshk',
					         ],
				         29 =>
					         [
						         'id' => 30,
						         'country_id' => 1,
						         'state_id' => 11,
						         'name' => 'Lashkar Gāh',
					         ],
				         30 =>
					         [
						         'id' => 31,
						         'country_id' => 1,
						         'state_id' => 11,
						         'name' => 'Markaz-e Ḩukūmat-e Darwēshān',
					         ],
				         31 =>
					         [
						         'id' => 32,
						         'country_id' => 1,
						         'state_id' => 11,
						         'name' => 'Sangīn',
					         ],
				         32 =>
					         [
						         'id' => 33,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Chahār Burj',
					         ],
				         33 =>
					         [
						         'id' => 34,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Ghōriyān',
					         ],
				         34 =>
					         [
						         'id' => 35,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Herāt',
					         ],
				         35 =>
					         [
						         'id' => 36,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Kafir Qala',
					         ],
				         36 =>
					         [
						         'id' => 37,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Karukh',
					         ],
				         37 =>
					         [
						         'id' => 38,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Kuhsān',
					         ],
				         38 =>
					         [
						         'id' => 39,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Kushk',
					         ],
				         39 =>
					         [
						         'id' => 40,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Qarah Bāgh',
					         ],
				         40 =>
					         [
						         'id' => 41,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Shīnḏanḏ',
					         ],
				         41 =>
					         [
						         'id' => 42,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Tīr Pul',
					         ],
				         42 =>
					         [
						         'id' => 43,
						         'country_id' => 1,
						         'state_id' => 12,
						         'name' => 'Zindah Jān',
					         ],
				         43 =>
					         [
						         'id' => 44,
						         'country_id' => 1,
						         'state_id' => 13,
						         'name' => 'Āqchah',
					         ],
				         44 =>
					         [
						         'id' => 45,
						         'country_id' => 1,
						         'state_id' => 13,
						         'name' => 'Darzāb',
					         ],
				         45 =>
					         [
						         'id' => 46,
						         'country_id' => 1,
						         'state_id' => 13,
						         'name' => 'Qarqīn',
					         ],
				         46 =>
					         [
						         'id' => 47,
						         'country_id' => 1,
						         'state_id' => 13,
						         'name' => 'Shibirghān',
					         ],
				         47 =>
					         [
						         'id' => 48,
						         'country_id' => 1,
						         'state_id' => 14,
						         'name' => 'Kabul',
					         ],
				         48 =>
					         [
						         'id' => 49,
						         'country_id' => 1,
						         'state_id' => 14,
						         'name' => 'Mīr Bachah Kōṯ',
					         ],
				         49 =>
					         [
						         'id' => 50,
						         'country_id' => 1,
						         'state_id' => 14,
						         'name' => 'Paghmān',
					         ],
				         50 =>
					         [
						         'id' => 51,
						         'country_id' => 1,
						         'state_id' => 15,
						         'name' => 'Kandahār',
					         ],
				         51 =>
					         [
						         'id' => 52,
						         'country_id' => 1,
						         'state_id' => 16,
						         'name' => 'Sidqābād',
					         ],
				         52 =>
					         [
						         'id' => 53,
						         'country_id' => 1,
						         'state_id' => 17,
						         'name' => 'Khōst',
					         ],
				         53 =>
					         [
						         'id' => 54,
						         'country_id' => 1,
						         'state_id' => 18,
						         'name' => 'Asadabad',
					         ],
				         54 =>
					         [
						         'id' => 55,
						         'country_id' => 1,
						         'state_id' => 18,
						         'name' => 'Āsmār',
					         ],
				         55 =>
					         [
						         'id' => 56,
						         'country_id' => 1,
						         'state_id' => 19,
						         'name' => 'Dasht-e Archī',
					         ],
				         56 =>
					         [
						         'id' => 57,
						         'country_id' => 1,
						         'state_id' => 19,
						         'name' => 'Imām Şāḩib',
					         ],
				         57 =>
					         [
						         'id' => 58,
						         'country_id' => 1,
						         'state_id' => 19,
						         'name' => 'Khanabad',
					         ],
				         58 =>
					         [
						         'id' => 59,
						         'country_id' => 1,
						         'state_id' => 19,
						         'name' => 'Kunduz',
					         ],
				         59 =>
					         [
						         'id' => 60,
						         'country_id' => 1,
						         'state_id' => 19,
						         'name' => 'Qarāwul',
					         ],
				         60 =>
					         [
						         'id' => 61,
						         'country_id' => 1,
						         'state_id' => 20,
						         'name' => 'Mehtar Lām',
					         ],
				         61 =>
					         [
						         'id' => 62,
						         'country_id' => 1,
						         'state_id' => 21,
						         'name' => 'Baraki Barak',
					         ],
				         62 =>
					         [
						         'id' => 63,
						         'country_id' => 1,
						         'state_id' => 21,
						         'name' => 'Ḩukūmatī Azrah',
					         ],
				         63 =>
					         [
						         'id' => 64,
						         'country_id' => 1,
						         'state_id' => 21,
						         'name' => 'Pul-e ‘Alam',
					         ],
				         64 =>
					         [
						         'id' => 65,
						         'country_id' => 1,
						         'state_id' => 22,
						         'name' => 'Bāsawul',
					         ],
				         65 =>
					         [
						         'id' => 66,
						         'country_id' => 1,
						         'state_id' => 22,
						         'name' => 'Jalālābād',
					         ],
				         66 =>
					         [
						         'id' => 67,
						         'country_id' => 1,
						         'state_id' => 22,
						         'name' => 'Markaz-e Woluswalī-ye Āchīn',
					         ],
				         67 =>
					         [
						         'id' => 68,
						         'country_id' => 1,
						         'state_id' => 23,
						         'name' => 'Khāsh',
					         ],
				         68 =>
					         [
						         'id' => 69,
						         'country_id' => 1,
						         'state_id' => 23,
						         'name' => 'Mīrābād',
					         ],
				         69 =>
					         [
						         'id' => 70,
						         'country_id' => 1,
						         'state_id' => 23,
						         'name' => 'Rūdbār',
					         ],
				         70 =>
					         [
						         'id' => 71,
						         'country_id' => 1,
						         'state_id' => 23,
						         'name' => 'Zaranj',
					         ],
				         71 =>
					         [
						         'id' => 72,
						         'country_id' => 1,
						         'state_id' => 24,
						         'name' => 'Pārūn',
					         ],
				         72 =>
					         [
						         'id' => 73,
						         'country_id' => 1,
						         'state_id' => 25,
						         'name' => 'Gardez',
					         ],
				         73 =>
					         [
						         'id' => 74,
						         'country_id' => 1,
						         'state_id' => 26,
						         'name' => 'Saṟōbī',
					         ],
				         74 =>
					         [
						         'id' => 75,
						         'country_id' => 1,
						         'state_id' => 26,
						         'name' => 'Zaṟah Sharan',
					         ],
				         75 =>
					         [
						         'id' => 76,
						         'country_id' => 1,
						         'state_id' => 26,
						         'name' => 'Zarghūn Shahr',
					         ],
				         76 =>
					         [
						         'id' => 77,
						         'country_id' => 1,
						         'state_id' => 27,
						         'name' => 'Bāzārak',
					         ],
				         77 =>
					         [
						         'id' => 78,
						         'country_id' => 1,
						         'state_id' => 28,
						         'name' => 'Charikar',
					         ],
				         78 =>
					         [
						         'id' => 79,
						         'country_id' => 1,
						         'state_id' => 28,
						         'name' => 'Jabal os Saraj',
					         ],
				         79 =>
					         [
						         'id' => 80,
						         'country_id' => 1,
						         'state_id' => 29,
						         'name' => 'Aībak',
					         ],
				         80 =>
					         [
						         'id' => 81,
						         'country_id' => 1,
						         'state_id' => 30,
						         'name' => 'Chīras',
					         ],
				         81 =>
					         [
						         'id' => 82,
						         'country_id' => 1,
						         'state_id' => 30,
						         'name' => 'Larkird',
					         ],
				         82 =>
					         [
						         'id' => 83,
						         'country_id' => 1,
						         'state_id' => 30,
						         'name' => 'Qal‘ah-ye Shahr',
					         ],
				         83 =>
					         [
						         'id' => 84,
						         'country_id' => 1,
						         'state_id' => 30,
						         'name' => 'Sang-e Chārak',
					         ],
				         84 =>
					         [
						         'id' => 85,
						         'country_id' => 1,
						         'state_id' => 30,
						         'name' => 'Sar-e Pul',
					         ],
				         85 =>
					         [
						         'id' => 86,
						         'country_id' => 1,
						         'state_id' => 30,
						         'name' => 'Tagāw-Bāy',
					         ],
				         86 =>
					         [
						         'id' => 87,
						         'country_id' => 1,
						         'state_id' => 30,
						         'name' => 'Tukzār',
					         ],
				         87 =>
					         [
						         'id' => 88,
						         'country_id' => 1,
						         'state_id' => 31,
						         'name' => 'Ārt Khwājah',
					         ],
				         88 =>
					         [
						         'id' => 89,
						         'country_id' => 1,
						         'state_id' => 31,
						         'name' => 'Taloqan',
					         ],
				         89 =>
					         [
						         'id' => 90,
						         'country_id' => 1,
						         'state_id' => 32,
						         'name' => 'Tarinkot',
					         ],
				         90 =>
					         [
						         'id' => 91,
						         'country_id' => 1,
						         'state_id' => 32,
						         'name' => 'Uruzgān',
					         ],
				         91 =>
					         [
						         'id' => 92,
						         'country_id' => 1,
						         'state_id' => 33,
						         'name' => 'Qalāt',
					         ],
			         ]);
		
		
	}
}