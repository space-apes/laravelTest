<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(){

        return Request::input('name');
        //BELOW 2 ARE THE SAME
        //return view('welcome');
        //return View::make('welcome');
    }
}
