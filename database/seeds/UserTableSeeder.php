<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    const courses = [
        'javascript',
        'php',
        'java enterpise',
        'java android'
    ];
    const gender = [
        'male',
        'female'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::unguard();

        \DB::table('users')->delete();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            User::create(array(
                'password' => \Hash::make($faker->name . $faker->year),
                'name' => $faker->name,
                'email' => $faker->email,
                'gender' => self::gender[$faker->numberBetween(0, 1)],
                'dateOfBirth' => date($format = 'Y-m-d'),
                'photoUrl' => $faker->imageUrl(150, 150, 'cats'),
                'course' => self::courses[$faker->numberBetween(0, 3)],
                'season' => $faker->numberBetween(0, 6)
        ));
        }
    }
}
