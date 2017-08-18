<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * Get the artciles associated with the given tag.
	 */
    public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }
}
