<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


class WordController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function create()
    {
        return view('front.words.create');
    }    
}
