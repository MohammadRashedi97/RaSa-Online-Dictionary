<?php

namespace App\Http\Controllers\Backend;

use App\Example;
use Illuminate\Http\Request;
use App\Word;
use Illuminate\Support\Facades\Auth;

class ExampleController extends BackendController
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
        $example = new Example();
        return view('backend.dictionary.example.create' , compact('example', 'word'));
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
            'example' => 'required|string|max:255',
            'meaning' => 'max:255'
        ]);

        $example = new Example();
        $example->example = $request['example'];
        $example->meaning = $request['meaning'];
        $example->word_id = $word->id;
        $example->user_id = Auth::id();
        $example->save();

        return redirect("/backend/dictionary/{$word->id}")->with('message' , 'Example Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function show(Example $example)
    {
        abort(404, "Not Found!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word, $id)
    {
        $example = Example::findOrFail($id);
        return view('backend.dictionary.example.edit' , compact('example', 'word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word, $id)
    {
        $request->validate([
            'example' => 'required|string|max:255',
            'meaning' => 'nullable|string|max:255'
        ]);

        $example = Example::findOrFail($id);

        // update the word with id
        $example->update($request->all());

        // Redirect to show view with a message
        return redirect("/backend/dictionary/{$word->id}")->with('message' , 'Example Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word, $id)
    {
        $example = Example::findOrFail($id);
        $example->delete();
        return redirect("/backend/dictionary/{$word->id}")->with('message' , 'Example Removed Successfully');
    }
}
