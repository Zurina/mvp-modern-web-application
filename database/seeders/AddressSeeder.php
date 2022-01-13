<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 100; $i++) {
            Address::create([
                'user_id' => $faker->numberBetween(1, 10),
                'country_id' => $faker->numberBetween(1, 244),
                'current_address' => false,
            ]);
        }
    }
}