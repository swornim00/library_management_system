<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function contact_us(){
        return \View::make('site.contact_us');
    }

    public function index()
    {
        return \View::make('site.home');
    }

    public function profile()
    {
        return \View::make('site.profile');
    }

    public function settings()
    {
        $site = \DB::table('libraries')->get()->first();
        return \View::make('site.settings')->with('site',$site);
    }


    public function reset_all(Request $request){
      $this->validate($request,array(
        'password' => 'required',
      ));

      if(\Hash::check($request->password,\Auth::user()->password)){
        \DB::statement("SET foreign_key_checks = 0");
        \DB::table('borrows')->truncate();
        \DB::table('books')->truncate();
        \DB::table('borrowers')->truncate();
        return \Redirect::back()->withErrors(array("Everything Cleared!"));

      }else{
        return \Redirect::back()->withErrors(array("Wrong Password!"));
      }
    }
}
