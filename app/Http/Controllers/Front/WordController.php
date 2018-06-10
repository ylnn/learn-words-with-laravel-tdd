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

    public function delete(Request $request, $id)
    {
       $word = $request->user()->words()->where('id', $id)->first();

       if(!$word) {
            return back()->withErrors(['delete_error' => 'you cant delete.']);
       }

       $word->delete();
       session()->flash('status' , 'Successfully deleted.');
       return redirect()->route('home');
    }
}
