<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Http\Request;
use App\Word;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;
use App\Like;

class ExampleController extends Controller
{

    public function __construct()
    {
        // Passing only some view through "auth" middleware
        $this->middleware('auth');
    }


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
        return view('frontend.example.create' , compact('example', 'word'));
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
        $example->example = Purifier::clean($request['example']);
        $example->meaning = Purifier::clean($request['meaning']);
        $example->word_id = $word->id;
        $example->user_id = Auth::id();
        $example->save();

        return redirect("/word/{$word->id}")->with('message' , 'Example Created Successfully');
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
        return view('frontend.example.edit' , compact('example', 'word'));
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
            'meaning' => 'max:255'
        ]);

        $example = Example::findOrFail($id);

        // update the word with id
        $example->update(Purifier::clean($request->all()));

        // Redirect to show view with a message
        return redirect("/word/{$word->id}")->with('message' , 'Example Updated Successfully');
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
        return redirect("/word/{$word->id}")->with('message' , 'Example Removed Successfully');
    }

    /**
     * handle the liking of a record
     * We use soft deletion for like model
     */
    public function like(Request $request)
    {
        // only logged users can like
        if(Auth::check())
        {
            // Get the word id from AJAX request
            $id = $request->get('id');
            // find the word
            $example = Example::where('id', $id)->first();

            // Check if the record already has a dislike
            // if yes then return 'already_disliked'
            $already_disliked = Like::withTrashed()->whereExampleId($example->id)
                                ->whereUserId(Auth::id())->where('like' , 0)->first();


            if(!is_null($already_disliked) && is_null($already_disliked->deleted_at))
            {
                return 'already_disliked';
            }

            // find out if the record has already been liked or not.
            $existing_like =Like::withTrashed()->whereExampleId($example->id)->whereUserId(Auth::id())->where('like' , 1)->first();

            // if the like field of the record is null then like it and increment like count and save
            if (is_null($existing_like))
            {
                Like::create([
                    'example_id' => $example->id,
                    'user_id' => Auth::id(),
                    // like == 1 means a like
                    'like' => 1
                ]);
                $example->like_count++;
                $example->save();
                return $example->like_count;
            }
            // if the like field of the record is not null
            else
            {
                // if record already has a like decrement like count
                if (is_null($existing_like->deleted_at))
                {
                    $existing_like->delete();
                    $example->like_count--;
                    $example->save();
                    return $example->like_count;
                }
                // if record doesn't have a like
                else
                {
                    $existing_like->restore();
                    $example->like_count++;
                    $example->save();
                    return $example->like_count;
                }
            }

        }
        // if the user is not logged, return 'undefined'
        else
        {
            return 'undefined';
        }
    }

    public function dislike(Request $request)
    {
        if(Auth::check())
        {
            $id = $request->get('id');
            $example = Example::where('id', $id)->first();

            $already_liked =Like::withTrashed()->whereExampleId($example->id)->whereUserId(Auth::id())->where('like' , 1)->first();
            if(!is_null($already_liked) && is_null($already_liked->deleted_at))
            {
                return 'already_liked';
            }

            $existing_dislike = Like::withTrashed()->whereExampleId($example->id)
                                ->whereUserId(Auth::id())->where('like' , 0)->first();

            if (is_null($existing_dislike))
            {
                Like::create([
                    'example_id' => $example->id,
                    'user_id' => Auth::id(),
                    // like == 0 means a dislike
                    'like' => 0
                ]);
                $example->dislike_count++;
                $example->save();
                return $example->dislike_count;
            }
            else
            {
                if (is_null($existing_dislike->deleted_at))
                {
                    $existing_dislike->delete();
                    $example->dislike_count--;
                    $example->save();
                    return $example->dislike_count;
                }
                else
                {
                    $existing_dislike->restore();
                    $example->dislike_count++;
                    $example->save();
                    return $example->dislike_count;
                }
            }

        }
        else
        {
            return 'undefined';
        }
    }
}
