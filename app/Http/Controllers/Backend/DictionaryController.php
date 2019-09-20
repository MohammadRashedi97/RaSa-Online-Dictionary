<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Word;
use Illuminate\Support\Facades\Auth;
use App\EnglishDefinition;
use App\PersianDefinition;
use App\Example;

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
        $charLower = strtolower($char);
        $user = Auth::user();
        if($user->hasRole(['admin', 'editor']))
        {
            $words = Word::where('word', 'LIKE', "$char%")->orWhere('word', 'LIKE', "$charLower%")->orderBy('word')->paginate(20);
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
        $request->validate([
            'word' => 'required|unique:words,word|max:255|alpha_num|string',
            'category_id' => 'required_with:persianDefinition|nullable|numeric',
            'persianDefinition' => 'required_with:category_id|nullable|string|max:255',
            'englishDefinition' => 'nullable|string|max:255',
            'example' => 'required_with:meaning|nullable|string|max:255',
            'meaning' => 'nullable|string|max:255'
        ]);

        $word = new Word();
        $word->word = $request['word'];
        $word->save();

        if($request['category_id'] !== null)
        {
            $persianDefinition = new PersianDefinition();
            $persianDefinition->category_id = $request['category_id'];
            $persianDefinition->persianDefinition = $request['persianDefinition'];
            $persianDefinition->word_id = $word->id;
            $persianDefinition->user_id = Auth::user()->id;
            $persianDefinition->save();
        }

        if($request['englishDefinition'] !== null)
        {
            $englishDefinition = new EnglishDefinition();
            $englishDefinition->englishDefinition = $request['englishDefinition'];
            $englishDefinition->word_id = $word->id;
            $englishDefinition->user_id = Auth::user()->id;
            $englishDefinition->save();
        }

        if($request['example'] !== null)
        {
            $example = new Example();
            $example->example = $request['example'];
            $example->meaning = $request['meaning'];
            $example->word_id = $word->id;
            $example->user_id = Auth::id();
            $example->save();
        }

        return redirect('/backend/dictionary')->with('message' , 'Word Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        $persianDefinitions = $word->getPersianDefinitions($word);
        $englishDefinitions = $word->getEnglishDefinitions($word);
        $examples = $word->getExamples($word);

        return view('backend.dictionary.show', compact('word', 'persianDefinitions', 'englishDefinitions', 'examples'));
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
