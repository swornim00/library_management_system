<?php

use Illuminate\Database\Seeder;

use \App\Library;
use Faker\Factory as Faker;

class LibraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Library::create(array(
            'name' => $faker->name,
            'address' => $faker->address,
            'issue_interval' => rand(6,10),
            'fine_amount' => rand(20,150),
            'admin_email' => $faker->unique()->safeEmail,
        ));
    }
}
