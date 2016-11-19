<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrows;
use App\Borrowers;
use App\Books;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrows::OrderBy('id', 'desc')->paginate(10);

        return \View::make('borrows.index')
        ->with('borrows', $borrows);
    }

    public function lendView()
    {
        $borrowers = Borrowers::all();
        $books = Books::all();

        return \View::make('borrows.lend')
      ->with('books', $books)
      ->with('borrowers', $borrowers);
    }

    public function lend(Request $request)
    {
        $this->validate($request, array(
        'book_id' => 'required|numeric|exists:books,id',
        'borrower_id' => 'required|numeric|exists:borrowers,id',
      ));

        $borrow = new Borrows();
        $borrow->book_id = $request->book_id;
        $borrow->borrower_id = $request->borrower_id;
        $borrow->lost = false;
        $borrow->cleared = false;
        $borrow->save();

        return \Redirect::to('borrows');
    }
}
