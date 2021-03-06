<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['title', 'body', 'slug'];
     public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
