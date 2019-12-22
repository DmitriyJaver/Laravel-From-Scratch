<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function about(){
        return view('about')->with([
            'tasks' => [
                'Go to the store',
                'Go to the market',
                'Go to work',
                'Go to the home'
            ],
            'foo' => request('title', 'foobar')
        ]);
    }

    function contact (){
        return view('contact');
    }
    //
}
