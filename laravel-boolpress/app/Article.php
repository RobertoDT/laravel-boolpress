<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tag;
use App\Comment;

class Article extends Model
{
    public function user()
    {
      return $this->belongsTo("App\User");
    }

    public function comments()
    {
      return $this->hasMany("App\Comment");
    }

    public function tags()
    {
      return $this->belongsToMany("App\Tag");
    }
}
