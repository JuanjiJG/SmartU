<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $with = ['comments'];

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
}
