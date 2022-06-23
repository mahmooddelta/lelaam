<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function now;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
                                        0 =>
                                            [
                                                'id' => 1,
                                                'name' => 'Ali',
                                                'email' => 'admin@leelam.af',
                                                'email_verified_at' => now()->toDateTimeString(),
                                                'phone' => '0730347000',
                                                'phone_verified_at' => now()->toDateTimeString(),
                                                'state_id' => 14,
                                                'password' => Hash::make('superDoper'),
                                                'two_factor_secret' => null,
                                                'two_factor_recovery_codes' => null,
                                                'two_factor_confirmed_at' => null,
                                                'remember_token' => null,
                                                'current_team_id' => null,
                                                'profile_photo_path' => null,
                                                'created_at' => now()->toDateTimeString(),
                                                'updated_at' => now()->toDateTimeString(),
                                            ],
                                        1 =>
                                            [
                                                'id' => 2,
                                                'name' => 'Shaheen',
                                                'email' => 'shaheen@leelam.af',
                                                'email_verified_at' => now()->toDateTimeString(),
                                                'phone' => '0744003258',
                                                'phone_verified_at' => now()->toDateTimeString(),
                                                'state_id' => 14,
                                                'password' => Hash::make('superDoper'),
                                                'two_factor_secret' => null,
                                                'two_factor_recovery_codes' => null,
                                                'two_factor_confirmed_at' => null,
                                                'remember_token' => null,
                                                'current_team_id' => null,
                                                'profile_photo_path' => null,
                                                'created_at' => now()->toDateTimeString(),
                                                'updated_at' => now()->toDateTimeString(),
                                            ],
                                    ]);
    }
}
