<?php

use Illuminate\Database\Seeder;
use \App\Borrowers;
use Faker\Factory as Faker;

class BorrowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(0, 25) as $x) {
            Borrowers::create(array(
                'name' => $faker->name,
                'contact_number' => '9813'.rand(111111, 999999),
                'address' => $faker->address,
                'fine' => 0,

            ));
        }
    }
}
