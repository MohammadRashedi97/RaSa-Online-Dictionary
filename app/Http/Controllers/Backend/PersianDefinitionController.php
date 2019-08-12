<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Word;
use App\PersianDefinition;
use Illuminate\Support\Facades\Auth;

class PersianDefinitionController extends BackendController
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
        $definition = new PersianDefinition();
        return view('backend.dictionary.persian-definition.create' , compact('definition', 'word'));
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
            'category_id' => 'required',
            'persianDefinition' => 'required|string|max:255'
        ]);

        $persianDefinition = new PersianDefinition();
        $persianDefinition->category_id = $request['category_id'];
        $persianDefinition->persianDefinition = $request['persianDefinition'];
        $persianDefinition->word_id = $word->id;
        $persianDefinition->user_id = Auth::id();
        $persianDefinition->save();

        return redirect("/backend/dictionary/{$word->id}")->with('message' , 'Persian Definition Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404, "Not Found!");
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersianDefinition  $persianDefinition
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word, $id)
    {
        $definition = PersianDefinition::findOrFail($id);
        return view('backend.dictionary.persian-definition.edit' , compact('definition', 'word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersianDefinition  $persianDefinition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'persianDefinition' => 'required|string|max:255'
        ]);

        $persianDefinition = PersianDefinition::findOrFail($id);
        // update the word with id
        $persianDefinition->update($request->all());

         // Redirect to show view with a message
         return redirect("/backend/dictionary/{$word->id}")->with('message' , 'Persian Definition Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersianDefinition  $persianDefinition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word, $id)
    {
        $definition = PersianDefinition::findOrFail($id);
        $definition->delete();
        return redirect("/backend/dictionary/{$word->id}")->with('message' , 'Persian Definition Removed Successfully');
    }
}
