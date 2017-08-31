<?php

namespace SmartU;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  public function user()
  {
    return $this->belongsTo('SmartU\User');
  }

  public function comments()
  {
    return $this->hasMany('SmartU\Comment');
  }
}
