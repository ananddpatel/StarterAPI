<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function blog()
    {
    	return $this->belongsTo(Blog::class);
    }

    public function person()
    {
    	return $this->belongsTo(Person::class);
    }
}
