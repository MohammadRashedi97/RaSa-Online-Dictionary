<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Word;
use Illuminate\Support\Facades\Auth;

class DictionaryController extends BackendController
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user= Auth::user();
            if(!$user->hasRole(['admin', 'editor']))
            {
                abort(403, "forbidden Access!");
            }
            return $next($request);
        });
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::orderBy('word')->paginate(20);
        return view('backend.dictionary.index', compact('words'));
    }

    /**
     * Alphabetical Links
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AlphabetNavigation($char)
    {
        $user = Auth::user();
        if($user->hasRole(['admin', 'editor']))
        {
            $words = Word::where('word', 'LIKE', "$char%")->orderBy('word')->paginate(20);
            return view('backend.dictionary.index', compact('words'));
        }
        else
        {
            abort(403, "forbidden Access!");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $word = new Word();
        return view('backend.dictionary.create' , compact('word'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $word = Word::create($request->all());
        $word->user_id = Auth::id();
        $word->save();

        return redirect('/backend/dictionary')->with('message' , 'Word Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($englishEntry)
    {
        $word = Word::where('englishEntry', $englishEntry)->first();
        $returned_values = $word->getWords($word->englishEntry);
        $words = $returned_values['words'];
        $categories = $returned_values['categories'];

        return view('frontend.show', compact('words', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $word = Word::find($id);
        return view('backend.dictionary.edit' , compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $word = Word::findOrFail($id);
        $word->update($request->all());

        return redirect('/backend/dictionary')->with('message' , 'Word Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if($user->hasRole(['admin', 'editor']))
        {
            $word = Word::find($id);
            $word->delete();
            return redirect('/backend/dictionary')->with('message', 'Word Removed Successfully');
        }
        else
        {
            abort(403, "forbidden Access!");
        }
    }
}
