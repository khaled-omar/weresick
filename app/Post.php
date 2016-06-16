<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'content',
		'journal_id'
	];

    public function tags()
    {
    	return $this->hasMany('App\Tag');
    }
}
