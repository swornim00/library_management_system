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
}
