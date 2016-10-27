<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        User::create(array(
            'name' => $faker->name,
            'password' => bcrypt('secret'),
            'email' => $faker->unique()->safeEmail,
        ));
    }
}
