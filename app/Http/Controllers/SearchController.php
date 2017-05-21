<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function searchBooks(Request $request){
        $output = "";


        $books = \App\Books::where('name',$request->name)->get();

        if($books){
            foreach($books as $key => $book){

            $output = '<tr>'.
                        '<td>'.$book->id.'</td>'.
                        '<td><a href="'.url('/').'/book/'.$book->id.'">'.$book->name.'</a></td>'.
                        '<td>'.$book->author.'</td>'.
                    '</tr>';
        }
        return $output;
    }else{
        return 'Nothing found';
    }
    }
}
