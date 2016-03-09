<?php

/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 8.3.2016 г.
 * Time: 23:07 ч.
 */
use Illuminate\Database\Seeder;

class UserProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::unguard();

        \DB::table('user_project')->delete();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 150; $i++) {
            \DB::table('user_project')->insert([
                'project_id' => $faker->randomNumber(1,50),
                'user_id' => $faker->unique()->randomNumber(1, 50)
            ]);
        }
    }
}