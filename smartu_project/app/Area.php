<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
