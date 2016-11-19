<?php

use Illuminate\Database\Seeder;
use \App\Borrows;

class BorrowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach (range(0, 100) as $x) {
            Borrows::create(array(
                'book_id' => rand(1, 10),
                'lost' => false,
                'cleared' => false,
                'borrower_id' => rand(1, 14),
            ));
        }
    }
}
