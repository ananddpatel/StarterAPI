<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $guarded = [];

	public function person()
	{
		return $this->belongsTo(Person::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
