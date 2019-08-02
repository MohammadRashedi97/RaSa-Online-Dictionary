<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Word;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\EnglishDefinition;
use App\PersianDefinition;
use App\Example;
use Mews\Purifier\Facades\Purifier;

class WordController extends Controller
{

    // Constructor for the WordController
    public function __construct()
    {
        // Passing only some view through "auth" middleware
        $this->middleware('auth', ['only' => ['create','store', 'edit', 'update', 'destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // picking two random words and their persian definitions from the database

        $randomWord1 = Word::inRandomOrder()->first();
        $persianDefinition1 = $randomWord1->getPersianDefinitions($randomWord1)->random();
        $persianDefinition1 = $persianDefinition1->persianDefinition;

        $randomWord2 = Word::inRandomOrder()->first();
        $persianDefinition2 = $randomWord2->getPersianDefinitions($randomWord2)->random();
        $persianDefinition2 = $persianDefinition2->persianDefinition;

        // return index view with random words
        return view('frontend.word.index', compact('randomWord1', 'persianDefinition1', 'randomWord2', 'persianDefinition2'));
    }


    /**
     * Fetch autocomplete results from the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        // Get the input
        $search = $request->search;

        // find 12 words
        if($search == '')
        {
            $words = Word::distinct()->select('word')->take(12)->get();
        }
        else
        {
            $words = Word::distinct()->select('word')->where('word', 'like', "{$search}%")->take(12)->get();
        }

        // fill response with words
        $response = array();
        foreach($words as $word){
            $response[] = array("value"=>$word->word);
        }

        // Json Encode response
        echo json_encode($response);
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $word = new Word();
        return view('frontend.word.create' , compact('word'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\WordCreateRequest $request)
    {
        $word = new Word();
        $word->word = Purifier::clean($request['word']);
        $word->save();

        $persianDefinition = new PersianDefinition();
        $persianDefinition->persianDefinition = Purifier::clean($request['persianDefinition']);
        $persianDefinition->word_id = $word->id;
        $persianDefinition->user_id = Auth::user()->id;
        $persianDefinition->category_id = Purifier::clean($request['category_id']);
        $persianDefinition->save();

        return redirect('/')->with('message' , 'Word Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        $englishDefinitions = EnglishDefinition::where('word_id', $word->id)->get();
        $persianDefinitions = PersianDefinition::where('word_id', $word->id)->orderBy('category_id')->get();
        $examples = Example::where('word_id', $word->id)->get();
        $categories = PersianDefinition::getCategories($persianDefinitions);

        return view('frontend.word.show', compact('word', 'categories', 'persianDefinitions', 'englishDefinitions', 'examples'));
    }

    /**
     * Search the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Get the value from search input
        $term = Purifier::clean($request->get('term'));
        // Trim the input value
        $term = trim($term);

        //Translation Mode
        $translationOption = $request->get('translation-options');

        // if value is not empty
        if($term != '')
        {
            if($translationOption == 'english-persian')
            {
                $word = Word::where('word', $term)->first();

                if($word == null)
                {
                    return view('frontend.word.not-found');
                }
                else
                {
                    $englishDefinitions = EnglishDefinition::where('word_id', $word->id)->get();
                    $persianDefinitions = PersianDefinition::where('word_id', $word->id)->orderBy('category_id')->get();
                    $examples = Example::where('word_id', $word->id)->get();
                    $categories = PersianDefinition::getCategories($persianDefinitions);

                    return view('frontend.word.show', compact('word', 'categories', 'persianDefinitions', 'englishDefinitions', 'examples'));
                }
            }
            else if($translationOption == 'persian-english')
            {
                $definitions = PersianDefinition::select('word_id', 'persianDefinition')
                                                ->where('persianDefinition', 'LIKE', "%{$term}%")->get();
                $wordIds = [];
                foreach ($definitions as $definition)
                {
                    array_push($wordIds, $definition->word_id);
                }

                $words = [];
                foreach ($wordIds as $wordId )
                {
                    $word = Word::where('id', $wordId)->first();
                    array_push($words, $word);
                }

                if($words == null)
                {
                    return view('frontend.word.not-found');
                }

                return view('frontend.word.show-persian', compact('term', 'words'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     * Route Model Binding
     * We type hint the word class and laravel automatically finds it
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        return view('frontend.word.edit' , compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\WordUpdateRequest $request, Word $word)
    {
        // update the word with id
        $word->update(Purifier::clean($request->all()));

        // Redirect to show view with a message
        return redirect("/word/{$word->id}")->with('message', 'Word Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        $word->likes()->forceDelete();
        $word->englishDefinitions()->delete();
        $word->examples()->delete();

        $word->delete();
        return redirect('/')->with('message', 'Word Removed Successfully');
    }
}
