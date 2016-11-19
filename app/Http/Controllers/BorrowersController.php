<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrowers;

class BorrowersController extends Controller
{
    public function index()
    {
        $borrowers = Borrowers::OrderBy('id', 'desc')->paginate(10);

        return \View::make('borrowers.index')
      ->with('borrowers', $borrowers);
    }

    public function add(Request $request)
    {
        $this->validate($request, array(
        'name' => 'required|min:2',
        'contact_number' => 'required|numeric|min:8',
        'address' => 'required|min:8',
      ));

        $borrower = new Borrowers();
        $borrower->name = $request->name;
        $borrower->contact_number = $request->contact_number;
        $borrower->address = $request->address;
        $borrower->fine = 0;
        $borrower->save();

        return \Redirect::to(url('borrowers'));
    }
}
