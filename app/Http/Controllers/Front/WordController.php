<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Word;


class WordController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function create()
    {
        return view('front.word.create');
    }    

    public function store(Request $request)
    {

        $this->validate($request, [
            'word' => 'required|string',
            'mean' => 'required|string',
        ]);

        $user = $request->user();

        $word = $user->words()->create(
            [ 'word' => $request->word, 'mean' => $request->mean ]
        );

        if(!$word){
            return back()->withInput()->withErrors();
        }

        session()->flash('status' , 'Successfully saved.');
        return redirect()->route('home');
    }
}
