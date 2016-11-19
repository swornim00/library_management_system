<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned();
            $table->integer('borrower_id')->unsigned();
            $table->boolean('lost');
            $table->boolean('cleared');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('borrower_id')->references('id')->on('borrowers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
    }
}
