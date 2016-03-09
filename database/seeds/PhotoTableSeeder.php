<?php

use Illuminate\Database\Seeder;
use App\Photo;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::unguard();

        \DB::table('photos')->delete();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Photo::create(array(
                'project_id' => $faker->numberBetween(1,50),
                'photoUrl' => $faker->imageUrl(150, 150, 'city')
            ));
        }
    }
}
