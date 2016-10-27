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
                'booksBorrowed' => rand(0, 20),
                'booksReturned' => rand(0, 19),
                'fine' => 0,

            ));
        }
    }
}
