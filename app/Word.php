<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\PersianDefinition;
use App\EnglishDefinition;
use App\Example;

class Word extends Model
{
    // columns allowed for mass assignment
    protected $fillable = ['word'];

    // One-to-many relationship with EnglishDefinition model
    public function englishDefinitions()
    {
        return $this->hasMany(EnglishDefinition::class);
    }

    public function persianDefinitions()
    {
        return $this->hasMany(PersianDefinition::class);
    }

    // One-to-many relationship with Example model
    public function examples()
    {
        return $this->hasMany(Example::class);
    }

    public function getPersianDefinitions($word)
    {
        $persianDefinitions = PersianDefinition::where('word_id', $word->id)->get()->sortByDesc('likeDifference');
        if($persianDefinitions != null)
            return $persianDefinitions;
        else
            return null;
    }

    public function getEnglishDefinitions($word)
    {
        $englishDefinitions = EnglishDefinition::where('word_id', $word->id)->get()->sortByDesc('likeDifference');
        if($englishDefinitions != null)
            return $englishDefinitions;
        else
            return null;
    }

    public function getExamples($word)
    {
        $examples = Example::where('word_id', $word->id)->get()->sortByDesc('likeDifference');
        if($examples != null)
            return $examples;
        else
            return null;
    }
}
