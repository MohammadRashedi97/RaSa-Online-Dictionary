<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Word;
use App\User;

class EnglishDefinition extends Model
{
    protected $fillable = ['englishDefinition'];

    // Get the like and dislike difference of a record
    public function getLikeDifferenceAttribute()
    {
        return $this->like_count - $this->dislike_count;
    }

    // One-to-many relationship with Word model
    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    // One-to-many relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
