<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function contact_us(){
        return \View::make('contact_us');
    }

    public function index()
    {
        return \View::make('home');
    }

    public function profile()
    {
        return \View::make('profile');
    }
}
