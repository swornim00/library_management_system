<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Borrows;
class BorrowController extends Controller
{
    public function index(){
      $borrows = Borrows::paginate(10);

      return \View::make('borrows.index')
      ->with('borrows',$borrows);

    }
}
