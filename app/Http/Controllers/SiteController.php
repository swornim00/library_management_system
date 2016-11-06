<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.home');
    }

    public function profile()
    {
        return view('site.profile');
    }

    public function settings()
    {
        $site = \DB::table('libraries')->get()->first();
        return \View::make('site.settings')->with('site',$site);
    }
}
