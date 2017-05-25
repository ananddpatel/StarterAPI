<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = [];

    public function blogs()
    {
    	return $this->hasMany(Blog::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
