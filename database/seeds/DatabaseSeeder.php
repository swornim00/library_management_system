<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(BorrowersTableSeeder::class);
        $this->call(BorrowsTableSeeder::class);
        $this->call(LibraryTableSeeder::class);
    }
}
