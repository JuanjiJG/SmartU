<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $with = ['user'];

    protected $fillable = [
        'name', 'description', 'image'
    ];

    // Defining relationships for this model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
