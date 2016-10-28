<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Books;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(0, 15) as $i) {
            Books::create(array(

            'name' => $faker->firstNameFemale,
            'author' => $faker->name,
            'borrows' => rand(0, 10),
            'price' => rand(150, 1000),
            'number_of_copies' => rand(0,20),
        ));
        }
    }
}
