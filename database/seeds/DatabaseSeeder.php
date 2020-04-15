<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(UserInfosTableSeeder::class);
        $this->call(FlatsTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
    }
}
