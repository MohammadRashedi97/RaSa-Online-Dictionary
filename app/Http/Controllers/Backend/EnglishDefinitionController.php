<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\EnglishDefinition;
use App\Word;
use Illuminate\Support\Facades\Auth;

class EnglishDefinitionController extends BackendController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404, "Not Found!");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Word $word)
    {
        $definition = new EnglishDefinition();
        return view('backend.dictionary.english-definition.create' , compact('definition', 'word'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Word $word)
    {
        $request->validate([
            'englishDefinition' => 'required|string|max:255'
        ]);

        $englishDefinition = new EnglishDefinition();
        $englishDefinition->englishDefinition = $request['englishDefinition'];
        $englishDefinition->word_id = $word->id;
        $englishDefinition->user_id = Auth::id();
        $englishDefinition->save();

        return redirect("/backend/dictionary/{$word->id}")->with('message' , 'English Definition Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EnglishDefinition  $englishDefinition
     * @return \Illuminate\Http\Response
     */
    public function show(EnglishDefinition $englishDefinition)
    {
        abort(404, "Not Found!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EnglishDefinition  $englishDefinition
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word, $id)
    {
        $definition = EnglishDefinition::findOrFail($id);
        return view('backend.dictionary.english-definition.edit' , compact('definition', 'word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EnglishDefinition  $englishDefinition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word, $id)
    {
        $request->validate([
            'englishDefinition' => 'required|string|max:255'
        ]);

        $definition = EnglishDefinition::findOrFail($id);

        // update the word with id
        $definition->update($request->all());

        // Redirect to show view with a message
        return redirect("/backend/dictionary/{$word->id}")->with('message' , 'English Definition Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EnglishDefinition  $englishDefinition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word, $id)
    {
        $definition = EnglishDefinition::findOrFail($id);
        $definition->delete();
        return redirect("/backend/dictionary/{$word->id}")->with('message' , 'English Definition Removed Successfully');
    }
}
