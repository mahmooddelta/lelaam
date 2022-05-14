<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Currency;
use App\Models\District;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    public function run()
    {
        Ad::factory()
            ->count(100)
            ->state(new Sequence(
                        fn($sequence) => ['user_id' => User::select('id')->get()->random()],
                    ))
            ->state(new Sequence(
                        fn($sequence) => ['category_id' => Category::select('id')->get()->random()],
                    ))
            ->state(new Sequence(
                        fn($sequence) => ['currency_id' => Currency::select('id')->get()->random()],
                    ))
            ->state(new Sequence(
                        fn($sequence) => ['district_id' => District::select('id')->get()->random()],
                    ))
            ->create();
    }

}
