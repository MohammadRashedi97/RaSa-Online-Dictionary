<?php

namespace App;
use App\Word;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;
    protected $fillable = ['persian_id', 'english_id', 'example_id', 'user_id', 'like'];

    // One-to-many relationship with Word model
    public function words()
    {
        return $this->belongsTo(Word::class);
    }

    // One-to-many relationship with Word model
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
