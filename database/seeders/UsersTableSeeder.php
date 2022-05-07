<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {
	
	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run () {
		
		
		\DB::table('users')
			->delete();
		
		\DB::table('users')
			->insert([
				         0 =>
					         [
						         'id' => 1,
						         'name' => 'Ali',
						         'email' => 'admin@leelam.af',
						         'email_verified_at' => NULL,
						         'password' => Hash::make('superDoper'),
						         'remember_token' => NULL,
						         'created_at' => '2022-05-07 07:01:13',
						         'updated_at' => '2022-05-07 07:01:13',
					         ],
			         ]);
		
		
	}
}