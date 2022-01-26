<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

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

        for ($i = 1; $i < 101; $i++) {
            Address::create([
                'user_id'         => $i,
                'country_id'      => $faker->numberBetween(1, 244),
                'current_address' => true,
            ]);
        }
    }
}
