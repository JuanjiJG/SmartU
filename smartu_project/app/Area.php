<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    // Defining relationships for this model
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
