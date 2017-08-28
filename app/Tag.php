<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	
	/**
	 * Fillable fields for a tag.
	 */
	/**
	 * protected $fillable = [ 'name' ] ES IGUAL QUE protected $guarded = [];
	 * @var array
	 */
	protected $fillable = [
		'name'			
	];
	
	/**
	 * Get the artciles associated with the given tag.
	 */
	
    public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }
}
