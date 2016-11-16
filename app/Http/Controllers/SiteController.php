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

    public function delete($db, $id)
    {
      \Session::flash('did', $id);
      \Session::flash('ddb', $db);

      return \View::make('site.delete');
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

    public function settings_update(Request $request){
      $this->validate($request, array(
        'name' => 'required',
        'address' => 'required',
        'issue_interval' => 'numeric|required',
        'admin_email' => 'required|email',
      ));

      \App\Library::where('id',1)->update(array(
        'name' => $request->name,
        'address' => $request->address,
        'issue_interval' => $request->issue_interval,
        'admin_email' => $request->admin_email,
      ));
      return \Redirect::back();
    }

    public function deleteDo(Request $request)
    {
        if ($did = \Session::get('did') && $ddb = \Session::get('ddb')) {
            $did = \Session::get('did'); // I don't know but the value of $did is 1 always when I use the $did variable from if condition above

        if ($ddb == 'books') {
            $redir_url = route('books');
            \DB::delete('DELETE FROM `borrows` WHERE `book_id`= '.$did);
        }elseif($ddb == 'borrowers'){
          \DB::delete('DELETE FROM `borrows` WHERE `borrower_id`= '.$did);
        }

            \DB::delete('DELETE FROM `'.$ddb.'` WHERE `id` = '.$did);

            return \Redirect::to($redir_url);
        } else {
            return \Redirect::back();
        }
    }
}
