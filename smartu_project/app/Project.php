<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Project extends Model
{
    protected $with = ['comments', 'areas'];

    protected $fillable = [
        'name', 'description', 'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class)->orderBy('id', 'desc');
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
    }
}
