<?php

use Illuminate\Database\Seeder;
use App\Message;
use Faker\Generator as Faker;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 40; $i++) { 
            $newMessage = new Message;
            $newMessage->flat_id = rand(1, 20); 
            $newMessage->email = $faker->email();
            $newMessage->title = $faker->word();
            $newMessage->message = $faker->text(155);
            $newMessage->save();
        }
    }
}
