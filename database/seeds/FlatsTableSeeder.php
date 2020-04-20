<?php

use Illuminate\Database\Seeder;
use App\Flat;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class FlatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $newFlat = new Flat;
            $newFlat->user_id = rand(1, 10);
            $newFlat->address = $faker->address();
            $newFlat->title = $faker->word();
            $newFlat->rooms = rand(1, 20);
            $newFlat->mq = rand(1, 100);
            $newFlat->cover = $faker->imageUrl(640, 480);
            $newFlat->guest = $faker->name;
            $newFlat->description = $faker->text(255);
            $newFlat->price_day = rand(1, 1000);
            $newFlat->beds = rand(1, 6);
            $newFlat->bathrooms = rand(1, 3);
            $newFlat->lat = 37.36729;
            $newFlat->long = -121.91595;
            $newFlat->hidden = $faker->boolean();
            $newFlat->slug = Str::finish(Str::slug($newFlat->title), rand(1, 1000));
            $newFlat->save();
        }
    }
}
