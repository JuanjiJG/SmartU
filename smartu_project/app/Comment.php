<?php

namespace SmartU;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function project()
  {
    return $this->belongsTo('SmartU\Project');
  }

  public function user()
  {
    return $this->belongsTo('SmartU\User');
  }
}
