<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrows;
use App\Borrowers;
use App\Books;

class BorrowController extends Controller
{
    public function index(Request $request)
    {
        $mode = $request->mode;

        if($mode == "lost")
        {
            $borrows = Borrows::OrderBy('id', 'desc')->where('lost',1)->paginate(10);

        }elseif($mode == 'cleared'){
            $borrows = Borrows::OrderBy('id', 'desc')->where('cleared',1)->paginate(10);

        }else{

            $borrows = Borrows::OrderBy('id', 'desc')->paginate(10);

        }

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

    public function clear($id)
    {
        Borrows::where('id',$id)->update(array('cleared' => 1));
    }

    public function unclear($id)
    {
        Borrows::where('id',$id)->update(array('cleared' => 0));
    }

    public function lost($id)
    {
        Borrows::where('id',$id)->update(array('lost' => 1));
    }

    public function rev_loss($id)
    {
        Borrows::where('id',$id)->update(array('lost' => 0));
    }
}
