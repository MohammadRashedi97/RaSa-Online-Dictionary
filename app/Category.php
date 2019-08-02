<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PersianDefinition;

class Category extends Model
{
    protected $fillable = ['name'];

    // One-to-many relationship with Word model
    public function persianDefinitions()
    {
        return $this->hasMany(PersianDefinition::class);
    }
}
