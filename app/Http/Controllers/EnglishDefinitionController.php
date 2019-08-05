<?php

namespace App\Http\Controllers;

use App\EnglishDefinition;
use Illuminate\Http\Request;
use App\Word;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;
use App\Like;

class EnglishDefinitionController extends Controller
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
        $definition = new EnglishDefinition();
        return view('frontend.english-definition.create' , compact('definition', 'word'));
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
        $englishDefinition->englishDefinition = Purifier::clean($request['englishDefinition']);
        $englishDefinition->word_id = $word->id;
        $englishDefinition->user_id = Auth::id();
        $englishDefinition->save();

        return redirect("/word/{$word->id}")->with('message' , 'English Definition Created Successfully');
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
        return view('frontend.english-definition.edit' , compact('definition', 'word'));
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
        $definition->update(Purifier::clean($request->all()));

        // Redirect to show view with a message
        return redirect("/word/{$word->id}")->with('message' , 'English Definition Updated Successfully');
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
        return redirect("/word/{$word->id}")->with('message' , 'English Definition Removed Successfully');
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
            $englishDefinition = EnglishDefinition::where('id', $id)->first();

            // Check if the record already has a dislike
            // if yes then return 'already_disliked'
            $already_disliked = Like::withTrashed()->whereEnglishId($englishDefinition->id)
                                ->whereUserId(Auth::id())->where('like' , 0)->first();


            if(!is_null($already_disliked) && is_null($already_disliked->deleted_at))
            {
                return 'already_disliked';
            }

            // find out if the record has already been liked or not.
            $existing_like =Like::withTrashed()->whereEnglishId($englishDefinition->id)->whereUserId(Auth::id())->where('like' , 1)->first();

            // if the like field of the record is null then like it and increment like count and save
            if (is_null($existing_like))
            {
                Like::create([
                    'english_id' => $englishDefinition->id,
                    'user_id' => Auth::id(),
                    // like == 1 means a like
                    'like' => 1
                ]);
                $englishDefinition->like_count++;
                $englishDefinition->save();
                return $englishDefinition->like_count;
            }
            // if the like field of the record is not null
            else
            {
                // if record already has a like decrement like count
                if (is_null($existing_like->deleted_at))
                {
                    $existing_like->delete();
                    $englishDefinition->like_count--;
                    $englishDefinition->save();
                    return $englishDefinition->like_count;
                }
                // if record doesn't have a like
                else
                {
                    $existing_like->restore();
                    $englishDefinition->like_count++;
                    $englishDefinition->save();
                    return $englishDefinition->like_count;
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
            $englishDefinition = EnglishDefinition::where('id', $id)->first();

            $already_liked =Like::withTrashed()->whereEnglishId($englishDefinition->id)->whereUserId(Auth::id())->where('like' , 1)->first();
            if(!is_null($already_liked) && is_null($already_liked->deleted_at))
            {
                return 'already_liked';
            }

            $existing_dislike = Like::withTrashed()->whereEnglishId($englishDefinition->id)
                                ->whereUserId(Auth::id())->where('like' , 0)->first();

            if (is_null($existing_dislike))
            {
                Like::create([
                    'english_id' => $englishDefinition->id,
                    'user_id' => Auth::id(),
                    // like == 0 means a dislike
                    'like' => 0
                ]);
                $englishDefinition->dislike_count++;
                $englishDefinition->save();
                return $englishDefinition->dislike_count;
            }
            else
            {
                if (is_null($existing_dislike->deleted_at))
                {
                    $existing_dislike->delete();
                    $englishDefinition->dislike_count--;
                    $englishDefinition->save();
                    return $englishDefinition->dislike_count;
                }
                else
                {
                    $existing_dislike->restore();
                    $englishDefinition->dislike_count++;
                    $englishDefinition->save();
                    return $englishDefinition->dislike_count;
                }
            }

        }
        else
        {
            return 'undefined';
        }
    }
}
