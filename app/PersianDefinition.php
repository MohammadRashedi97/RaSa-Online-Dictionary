<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class PersianDefinition extends Model
{
    protected $fillable = ['persianDefinition', 'category_id'];

    // Get the like and dislike difference of a record
    public function getLikeDifferenceAttribute()
    {
        return $this->like_count - $this->dislike_count;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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

    public static function getCategories($persianDefinitions)
    {
        $categories = array();
        foreach ($persianDefinitions as $definition) {
            array_push($categories,$definition->category);
        }
        return $categories;
    }
}
