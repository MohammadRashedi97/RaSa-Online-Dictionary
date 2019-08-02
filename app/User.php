<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Word;
use App\Like;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // One-to-many relationship with Word model
    public function words()
    {
        return $this->hasMany(Word::class);
    }

    // One-to-many relationship with Word model
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // One-to-many relationship with EnglishDefinition model
    public function englishDefinitions()
    {
        return $this->hasMany(EnglishDefinition::class);
    }

    // One-to-many relationship with Example model
    public function examples()
    {
        return $this->hasMany(Example::class);
    }
}
