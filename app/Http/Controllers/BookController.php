<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Books;

class BookController extends Controller
{

    public function index()
    {
        $books = Books::orderBy('id','desc')->paginate(7);
        return \View::make('books.index')->with('books',$books);
    }

    public function add(Request $request){
        $this->validate($request, array(
            'book_name' => 'required|unique:books,name',
            'author_name' => 'required',
            'book_price' => 'required|integer',
            'number_of_copies' => 'required|integer|',
        ));

        $book = new Books;
        $book->name = $request->book_name;
        $book->author = $request->author_name;
        $book->price = $request->book_price;
        $book->borrows = 0 ;
        $book->number_of_copies = $request->number_of_copies;
        $book->save();

        return \Redirect::to(route('books'));

    }
}
