<?php

namespace App\Http\Controllers;

use App\PersianDefinition;
use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;
use App\Like;

class PersianDefinitionController extends Controller
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
        $definition = new PersianDefinition();
        return view('frontend.persian-definition.create' , compact('definition', 'word'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Word $word)
    {
        $persianDefinition = new PersianDefinition();
        $persianDefinition->category_id = Purifier::clean($request['category_id']);
        $persianDefinition->persianDefinition = Purifier::clean($request['persianDefinition']);
        $persianDefinition->word_id = $word->id;
        $persianDefinition->user_id = Auth::id();
        $persianDefinition->save();

        return redirect("/word/{$word->id}")->with('message' , 'Persian Definition Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersianDefinition  $persianDefinition
     * @return \Illuminate\Http\Response
     */
    public function show(PersianDefinition $persianDefinition)
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
        return view('frontend.persian-definition.edit' , compact('definition', 'word'));
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
        $request['persianDefinition'] = $request['persianDefinition'];

        $persianDefinition = PersianDefinition::findOrFail($id);
        // update the word with id
        $persianDefinition->update($request->all());

         // Redirect to show view with a message
         return redirect("/word/{$word->id}")->with('message' , 'Persian Definition Updated Successfully');
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
        return redirect("/word/{$word->id}")->with('message' , 'Persian Definition Removed Successfully');
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
            $persianDefinition = PersianDefinition::where('id', $id)->first();

            // Check if the record already has a dislike
            // if yes then return 'already_disliked'
            $already_disliked = Like::withTrashed()->wherePersianId($persianDefinition->id)
                                ->whereUserId(Auth::id())->where('like' , 0)->first();


            if(!is_null($already_disliked) && is_null($already_disliked->deleted_at))
            {
                return 'already_disliked';
            }

            // find out if the record has already been liked or not.
            $existing_like =Like::withTrashed()->wherePersianId($persianDefinition->id)->whereUserId(Auth::id())->where('like' , 1)->first();

            // if the like field of the record is null then like it and increment like count and save
            if (is_null($existing_like))
            {
                Like::create([
                    'persian_id' => $persianDefinition->id,
                    'user_id' => Auth::id(),
                    // like == 1 means a like
                    'like' => 1
                ]);
                $persianDefinition->like_count++;
                $persianDefinition->save();
                return $persianDefinition->like_count;
            }
            // if the like field of the record is not null
            else
            {
                // if record already has a like decrement like count
                if (is_null($existing_like->deleted_at))
                {
                    $existing_like->delete();
                    $persianDefinition->like_count--;
                    $persianDefinition->save();
                    return $persianDefinition->like_count;
                }
                // if record doesn't have a like
                else
                {
                    $existing_like->restore();
                    $persianDefinition->like_count++;
                    $persianDefinition->save();
                    return $persianDefinition->like_count;
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
            $persianDefinition = PersianDefinition::where('id', $id)->first();

            $already_liked =Like::withTrashed()->wherePersianId($persianDefinition->id)->whereUserId(Auth::id())->where('like' , 1)->first();
            if(!is_null($already_liked) && is_null($already_liked->deleted_at))
            {
                return 'already_liked';
            }

            $existing_dislike = Like::withTrashed()->wherePersianId($persianDefinition->id)
                                ->whereUserId(Auth::id())->where('like' , 0)->first();

            if (is_null($existing_dislike))
            {
                Like::create([
                    'persian_id' => $persianDefinition->id,
                    'user_id' => Auth::id(),
                    // like == 0 means a dislike
                    'like' => 0
                ]);
                $persianDefinition->dislike_count++;
                $persianDefinition->save();
                return $persianDefinition->dislike_count;
            }
            else
            {
                if (is_null($existing_dislike->deleted_at))
                {
                    $existing_dislike->delete();
                    $persianDefinition->dislike_count--;
                    $persianDefinition->save();
                    return $persianDefinition->dislike_count;
                }
                else
                {
                    $existing_dislike->restore();
                    $persianDefinition->dislike_count++;
                    $persianDefinition->save();
                    return $persianDefinition->dislike_count;
                }
            }

        }
        else
        {
            return 'undefined';
        }
    }
}
