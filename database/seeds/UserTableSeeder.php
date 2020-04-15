<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // default user per test
        $newUser = new User;
        $newUser->name = 'Pippo';
        $newUser->email = 'pippo@gmail.com';
        $newUser->password = Hash::make('password');
        $newUser->save();

        // random users
        for ($i=0; $i < 9; $i++) {
            $newUser = new User;
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make($faker->password());
            $newUser->save();
          }
    }
}
