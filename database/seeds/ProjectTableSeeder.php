<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::unguard();

        \DB::table('projects')->delete();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Project::create(array(
                'name' => $faker->name,
                'githubUrl' => $faker->url,
                'password' => \Hash::make($faker->name . $faker->year),
                'description' => $faker->text(100)
            ));
        }
    }
}
