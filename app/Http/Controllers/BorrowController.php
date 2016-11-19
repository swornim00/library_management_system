<?php

namespace App\Http\Controllers;

use App\Borrows;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrows::paginate(10);

        return \View::make('borrows.index')
      ->with('borrows', $borrows);
    }
}
