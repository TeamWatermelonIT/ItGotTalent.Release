<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(PhotoTableSeeder::class);

        \Eloquent::unguard();

        //\DB::table('user_project')->delete();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 150; $i++) {
            \DB::table('user_project')->insert([
                'project_id' => $faker->numberBetween(1,50),
                'user_id' => $faker->numberBetween(1, 50)
            ]);
        }
    }
}
