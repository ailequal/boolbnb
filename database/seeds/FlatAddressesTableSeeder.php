<?php

use Illuminate\Database\Seeder;
use App\Flat_address;
use Faker\Generator as Faker;

class FlatAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=1; $i <= 20; $i++) { 
            $newAddress = new Flat_address;
            $newAddress->flat_id = $i;
            $newAddress->street = $faker->streetName();
            $newAddress->street_number = $faker->buildingNumber();
            $newAddress->zip_code = rand(10000, 99999);
            $newAddress->city = $faker->city();
            $newAddress->save();
        }
    }
}
